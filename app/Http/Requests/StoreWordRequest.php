<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\models\Word;
use App\models\Selectedword;
use Carbon\Carbon;

class StoreWordRequest extends FormRequest
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
		// sharte inke emrooz nabashe bayad ezafe beshe 
        return [
			'word' => 'required|unique:Selectedwords,word|min:5|max:5',
			'date' => 'required|unique:Selectedwords,selectedday',
        ];
    }

	// public function withValidator($validator)
	// {
	// 	$validator->after(function ($validator) {
	// 		if ($this->somethingElseIsInvalid()) {
	// 			$validator->errors()->add('field', 'Something is wrong with this field!');
	// 		}
	// 	});
	// }
}
