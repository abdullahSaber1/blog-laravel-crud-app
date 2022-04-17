<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostrequest extends FormRequest
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
            'title'=>'required |min:5| max:255|unique:posts,title,'.$this->postId,
            'description'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            "user_id" => 'required',
        ];
    }
}
