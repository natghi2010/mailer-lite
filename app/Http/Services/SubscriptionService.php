<?php

namespace App\Http\Services;

use App\Models\Subscriber;

class SubscriptionService
{

    public function listSubscriber()
    {
        return Subscriber::all();
    }

    public function updateSubscriber($id, $data)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->update($data);
        foreach ($data["fields"] as $field) {
            $subscriber->fields()->updateOrCreate(["title"=>$field["title"]],$field);
        }
    }

    public function showSubscriber($id)
    {
        return Subscriber::with('fields')->find($id);
    }

    public function subscribe(array $data)
    {
        \DB::beginTransaction();

        $subscriber = Subscriber::create($data);

        $subscriber->fields()->createMany(

            array_map(function ($field) use ($subscriber) {
                return array_merge($field, ["subscriber_id" => $subscriber->id]);
            }, $data['fields'])
        );

        \DB::commit();
    }

    public function removeSubscriber($id)
    {
        return Subscriber::destroy($id);
    }
}
