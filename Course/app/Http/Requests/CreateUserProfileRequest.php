<?php namespace Course\Http\Requests;

use Course\Http\Requests\Request;

class CreateUserProfileRequest extends Request {

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
            'bio'       => 'string',
            'birthdate' => 'required|date_format:Y-m-d',
            'twitter'   => 'string',
            'website'   => 'string',
            'user_id'   => 'required|integer'
		];
	}
}
