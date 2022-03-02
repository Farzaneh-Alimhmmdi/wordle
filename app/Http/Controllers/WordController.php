<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Word;
use App\models\Selectedword;
use App\Http\Requests\StoreWordRequest;
use App\Http\Resources\AdminResource;


class WordController extends Controller
{

    public function show()
	{
		return response(['word' => 'hi']);
	}

    /**
     * Add a new Word to the Game.
     *
     * @OA\Post(
     *     path="/insert",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     * )
     */

	public function insert(StoreWordRequest $request)
	{

		$word = request()->get('word');
		$date = request()->get('date');

		if( Word::where('title' ,$word)->count()<1)
		{
				return response()->json(['success' => false , 'data' => ['word'=> $word , 'date' => $date] , 'msg' => 'inserting failed'], 422);
		}
		$new_word = new Selectedword;
		$new_word->word = $word;
		$new_word->selectedday = $date;
		$new_word->save();
		return response()->json(['success' => true , 'data' => new AdminResource($new_word) , 'msg' => 'inserting completed' ], 201);

	}


    /**
     * Update an existing pet.
     *
     * @OA\Put(
     *     path="/edit/{id}",
     *     operationId="update",
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pet not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *
     *     },
     *     requestBody={"$ref": "#/components/requestBodies/Pet"}
     * )
     */

	public function update(Request $request , $id)
	{

	  	$change_word = Selectedword::find($id);
	  	$change_word->word = $request->word;
	  	$change_word->save();
		return response()->json(['success' => true , 'data' => new AdminResource($change_word) , 'msg' => "updating completed" ], 201);

	}


}
