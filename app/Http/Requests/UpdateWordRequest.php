<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWordRequest extends FormRequest
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
        return [
			'word' => 'required|min:5|max:5',
			// 'quess_word' => Rule::unique('games')->where(function ($query) {
			// 	return $query->where('user_id', $this->id)->where('quess_word' , $this->word);})
        ];
    }
}
