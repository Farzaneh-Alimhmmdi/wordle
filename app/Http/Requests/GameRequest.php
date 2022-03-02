<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use App\models\Game;
use Illuminate\Validation\Rule;


class GameRequest extends FormRequest
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
		//note : tarkibe id o kalame hads zade shode bayad unique bashe na kalame b tanhaii 
        return [
			'id'=>'required|integer',
			'word' => Rule::unique('games', 'guess_word')->where(function ($query) {
				return $query->where('user_id', $this->id);})
        ];
    }

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'word.unique' => 'word.unique',
		];
	}
}
