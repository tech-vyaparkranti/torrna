<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TestimonialsRequest extends FormRequest
{
    use ResponseAPI;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (isset(Auth::user()->id)?true:false);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "id"=>"bail|required_if:action,update,enable,disable|nullable|exists:testimonials,id",
            "client_name"=>"bail|required_if:action,update,insert|string|max:500",
            "client_email"=>"bail|nullable|email",
            "client_image"=>"bail|file|required_if:action,insert|image|max:2048",
            "approval_status"=>"bail|required_if:action,update,insert|in:under_review,approved,discarded,something else",
            "item_priority"=>"bail|integer|nullable|gt:0",
            "review_text"=>"required_if:action,update,insert|string",
            "action"=>"bail|required|in:insert,update,enable,disable"
        ];
    }

    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->getMessageBag()->first(),200));
    }
}
