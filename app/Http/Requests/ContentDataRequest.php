<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContentDataRequest extends FormRequest
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
        $contentdatas = \App\Models\ContentData::whereId($this->route('id'))->first('id');

        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'url' => 'required|unique:content_data',
                ];
            }
            case 'PUT':
            {
                return [
                    'url' => ['required', Rule::unique('content_data')->ignore($contentdata->id)],
                ];
            }            
            default:
                break;
        }
    }
}
