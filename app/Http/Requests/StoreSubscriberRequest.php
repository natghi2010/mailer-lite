<?php

namespace App\Http\Requests;

use App\Rules\RealEmail;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           "email"=>["bail","required","email","unique:subscribers",new RealEmail()],
           "fields"=>["present","array"],
           "name"=>"required"
        ];
    }


    public function messages(){
        return  [
            'email.required' => __('validation.required', ['attribute' => 'email']),
            'email.email' => __('validation.email', ['attribute' => 'email']),
            'email.unique' => __('validation.unique', ['attribute' => 'email']),
            'name.required' => __('validation.required', ['attribute' => 'name']),
            'name.string' => __('validation.string', ['attribute' => 'name']),
            'fields.required' => __('validation.required_array_type', ['attribute' => 'fields']),
            'fields.array' => __('validation.required_array_type', ['attribute' => 'fields']),
        ];
    }


}
