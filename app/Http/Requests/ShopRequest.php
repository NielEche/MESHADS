<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'title' => 'required',
					'price' => 'required|numeric',
					'file' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4|max:8000', //8MB
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required',
					'price' => 'required|integer',
					'file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4|max:8000', //8MB
                ];
            }            
            default:
                break;
        }
    }

}
