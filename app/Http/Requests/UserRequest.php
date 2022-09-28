<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
		$user = \App\User::whereId($this->route('user'))->first('id');

        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => ['required', 'string', 'max:255'],
					'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
					'password' => ['required', 'string', 'min:8', 'confirmed'],
					'file' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => ['required', 'string', 'max:255'],
					'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
					'file' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:8000', //8MB
                ];
            }            
            default:
                break;
        }
    }
}
