<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateFieldRequest;
use App\Http\Resources\FieldResource;
use App\Http\Services\FieldService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{

    public function __construct(FieldService $FieldService)
    {
        $this->FieldService = $FieldService;
    }

    /**
     * Get Fields by Subscriber id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getFieldsBySubscriber($id)
    {
        try {
            return response()->success(FieldResource::collection($this->FieldService->getFieldsBySubscriber($id)), 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 500);
        }
    }


    /**
     * list the specified field
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->success(FieldResource::collection($this->FieldService->listFields()), 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 500);
        }
    }

    /**
     * store the specified field
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateFieldRequest $request)
    {
        try {
            $this->FieldService->storeField($request->all());
            return response()->success(__("success"), 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 500);
        }
    }

    /**
     * Update the specified field
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateFieldRequest $request)
    {
        try {
            $this->FieldService->updateField($id, $request->all());
            return response()->success(__("success"), 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified field
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $this->FieldService->deleteField($id);
            return response()->success(__("success"), 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 500);
        }
    }
}
