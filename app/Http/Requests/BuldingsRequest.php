<?php

namespace App\Http\Requests;


use App\Http\Requests\Request;

class BuldingsRequest extends Request
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
            'name' => 'required|min:6|max:100',
            'price' => 'required',
            'rooms' => 'required|integer',
            'rent' => 'required|integer',
            'square' => 'required|numeric',
            'type' => 'required|integer',
            'small_dis' => 'required|min:70|max:160',
            'meta' => 'required',
            'langtude' => 'required',
            'latitude' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'larg_dis' => 'required|min:6',
            'status' => 'required|numeric',
            'place_id' => 'required',
        ];
    }
}
