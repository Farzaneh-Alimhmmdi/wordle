<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Word;
use App\models\Selectedword;
use App\models\Game;
use App\Http\Requests\GameRequest;
use Carbon\Carbon;
// use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;

class GameController extends Controller
{

    // /play:
    // post:
    //   summary: "play new game today "
    //   description: ""
    //   operationId: "play"
    //   consumes:
    //   - "application/json"

    //   parameters:
    //   - in: "body"
    //     name: "body"
    //     description: "storing inserted wordes "
    //     required: true
    //     schema:
    //       $ref: "#/definitions/game"
    //   responses:
    //     "201":
    //       description: "successful true or you should try again "
    //       schema:
    //         type: "array"
    //         items:
    //           $ref: "#/definitions/gameResponse"
    //         minItems: 5
    //         maxItems: 5
    //     "200":
    //       description: "successful failed you cant try anymore "
    //       schema:
    //         type: "array"
    //         example: ["F","F", "U" ,"T" ,"T"]
    //         items:
    //           $ref: "#/definitions/gameResponse"
    //         minItems: 5
    //         maxItems: 5

    /**
     * @OA\post(
     *     path="/play",
     *     description="user finds the correct word can guess 6 times and each quess will be stored in db ",
     *     operationId="play",
     *
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Order"),
     *         @OA\MediaType(
     *             mediaType="application/xml",
     *             @OA\Schema(ref="#/components/schemas/Order")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order not found"
     *     )
     * )
     */

    public function play(GameRequest $request)
	{
		$g_word = $request->word;
		$g_id = $request->id;

		$today_word = Selectedword::where ('selectedday' , Carbon::today())->first();
		$alpha_word = str_split($today_word->word);
		$report = array();

		if (Game::where ('user_id' , $g_id)->where('guess_time' , Carbon::today())->count()<5)
		{

			$game = new Game;
			$game->user_id =  $g_id;
			$game->guess_word = $g_word;
			$game->guess_time = Carbon::today();
			$game->save();
			$result = Selectedword::where('word' , $g_word)->count();
			if($result)
			{
				// $res = ["T" , "T" , "T" , "T" ,"T"]
				return response()->json(['success' => true ,'data'=> new GameResource($game) , 'msg' => 'you successfully completed the game'] , 201);
			}
			else{

				$g_word = str_split($g_word);

				for ($i = 0 ; $i<5 ; $i++)
				{
					$report[$i] = "F";
					for ($j=0 ; $j<5 ; $j++)
					{
						if($g_word[$i] == $alpha_word[$j])
						{
							if ($i == $j)
							{
								$report[$i] = "T";
							}
							else
							{
								$report[$i] = "U";
							}

						}
					}

				}

				// return response(['res' => $report]);
				return response()->json(['success' => false ,'res' => $report ,  'msg' => 'you can try again'],201);
			}
		}
		return response()->json(['success' => false ,'data' => ['word' => $g_word , 'id' =>$g_id ] ,  'msg' => 'sorry you cant guess anymore '],200);
	}
}
