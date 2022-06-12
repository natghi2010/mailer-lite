<?php

namespace App\Http\Services;

use App\Models\Field;

class FieldService
{

    public function getFieldsBySubscriber($id)
    {
        return Field::whereSubscriberId($id)->get();
    }

    public function listFields()
    {
        return Field::with("subscriber")->get();
    }

    public function storeField($data)
    {
        Field::create($data);
    }

    public function updateField(int $id, array $data)
    {
        Field::find($id)->update($data);
    }

    public function deleteField(int $id)
    {
        return Field::find($id)->delete($id);
    }
}
