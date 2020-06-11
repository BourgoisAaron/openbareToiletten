<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'name' => 'required|string|max:25|min:2',
            'review' => 'required|min:3|max:1000',
            'cleanliness' => 'required|integer|max:5|min:1',
            'accessible' => 'required|integer|max:5|min:1',
        ];
    }
}
