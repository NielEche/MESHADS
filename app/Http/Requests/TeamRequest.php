<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                    'name' => 'required',
					'job_title' => 'required',
					'bio' => 'required',
					'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required',
					'job_title' => 'required',
					'bio' => 'required',
					'file' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
                ];
            }            
            default:
                break;
        }
    }

}
