<?php namespace Course\Http\Requests;

use Course\Http\Requests\Request;

class CreateUserRequest extends Request {

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
            'first_name'            => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|unique:users,email',
            'password'              => 'required|between:7,16|confirmed|alpha_dash',
            'password_confirmation' => 'required|same:password',
            'type'                  => 'required|in:user,admin',
            'gender'                => 'required|in:male,female'
		];
	}

}
