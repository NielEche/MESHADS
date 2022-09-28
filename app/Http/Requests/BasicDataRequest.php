<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicDataRequest extends FormRequest
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
            'short_name' => 'required',
			'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
			'logo_white' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
			'brochure' => 'nullable|mimes:pdf,doc|max:8000', //8MB
        ];
    }
}
