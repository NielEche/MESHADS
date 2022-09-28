<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $post = \App\Models\Post::whereId($this->route('post'))->first('id');

        switch ($this->method()) {
            case 'POST':
            {
                 return [
                    'title' => 'required|unique:posts',
                    'top_content' => 'required',
					'file' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => ['required', Rule::unique('posts')->ignore($post->id)],
                    'top_content' => 'required',
					'file' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
                ];
            }            
            default:
                break;
        }
    }
}
