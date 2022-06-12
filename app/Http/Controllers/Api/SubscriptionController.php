<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Http\Resources\SubscribersResource;
use App\Http\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $SubscriptionService;

    public function __construct(SubscriptionService $SubscriptionService)
    {
        $this->SubscriptionService = $SubscriptionService;
    }

    /**
     * list subscriber.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $subscribers = SubscriberResource::collection($this->SubscriptionService->listSubscriber());

            return response()->success($subscribers, 200);

        } catch (\Throwable $th) {

            return response()->error($th->getMessage(), 500);

        }
    }

    /**
     * show subscriber.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $subscribers = new SubscriberResource($this->SubscriptionService->showSubscriber($id));

            return response()->success($subscribers, 200);

        } catch (\Throwable $th) {

            return response()->error($th->getMessage(), 500);
        }
    }

    /**
     * Store a newly created subscriber.
     *
     * @param  \Illuminate\Http\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request)
    {
        try {

            $subscriber = $this->SubscriptionService->subscribe($request->all());

            return response()->success(null, 200);

        } catch (\Throwable $th) {

            return response()->error($th->getMessage(), 500);
        }
    }

    /**
     * Update the specified subscriber.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        try {

            $subscriber = $this->SubscriptionService->updateSubscriber($id, $request->all());

            return response()->success(null, 200);

        } catch (\Throwable $th) {

            return response()->error($th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified subscriber.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $this->SubscriptionService->removeSubscriber($id);

            return response()->success(null, 204);

        } catch (\Throwable $th) {

            return response()->error($th->getMessage(), 500);
        }
    }
}
