<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToiletRequest extends FormRequest
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
            //
            'name' => 'required|string',
            'street' => 'required|string',
            'house_number' => 'required|integer',
            'postal_code' => 'required|integer',
            'city_name' => 'required|string',
            'main_city_name' => 'required|string',
            'promotional_region' => 'required|string',
            'lat' => 'required',
            'long' => 'required',
            'product_description' => 'required',
            'accessibility_description' => 'required',
        ];
    }
}
