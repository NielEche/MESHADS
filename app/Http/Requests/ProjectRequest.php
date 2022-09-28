<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
					'category' => 'required|numeric',
					'project_brief' => 'required',
					'client_name' => 'required',
					'cover_image' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4|max:8000', //8MB
					'alternative_cover_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4|max:8000', //8MB
					'project_video_url' => 'nullable|string',
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required',
					'category_id' => 'required|numeric',
					'project_brief' => 'required',
					'client_name' => 'required',
					'cover_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4|max:8000', //8MB
					'alternative_cover_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4|max:8000', //8MB
					'project_video_url' => 'nullable|string',
                ];
            }            
            default:
                break;
        }
    }
}
