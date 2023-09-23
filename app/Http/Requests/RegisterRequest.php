<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'username'              => 'required|alpha|min:6|max:15|unique:users,username',
			'email'                 => 'required|email|unique:users,email',
			'password'              => 'required|alpha_num|min:8|max:20|confirmed',
			'password_confirmation' => 'required',
		];
	}
}
