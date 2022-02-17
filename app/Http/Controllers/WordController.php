<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Word;
use App\models\Selectedword;


class WordController extends Controller
{
    public function create()
	{
		return response(['word' => 'hi']);
	}

	public function insert(Request $request)
	{
		
		$validatedData = $request->validate([
			'word' => 'required|unique:selectedwords|min:5|max:5',
			'date' => 'required|after:today|unique:selectedday',
		]);

		$word = request()->get('word');
		$date = request()->get('date');

		if( Word::where('title' ,$word)->count()<1)
		{
				return response(['error' => 'there is no this word sorry!']);
		}
		
		$new_word->save();
		return "saved";
		return response (["word" => $validatedData]);
	}

	public function update(Request $request , $id)
	{
		$validatedData = $request->validate([
			'word' => 'required|unique:selectedwords|min:5|max:5',
			'date' => 'required|after:today|unique:selectedday',
		]);
	  	$change_word = Selectedword::find($id);
	  	$change_word->word = $request->word;
	  	$change_word->save();
	  	return response (['updated_word'=>$change_word]);
	}

}
