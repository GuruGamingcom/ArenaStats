<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Support\Facades\Response;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Syntax\SteamApi\Facades\SteamApi;

class PlayerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $serverId)
    {
        $player = Player::where('serverID', $serverId)->where('accountID', $id)->firstOrFail();
        return view('players.view', compact('player'));
    }

    public function getSteamPlayerData($steamId)
    {
        $playerSteamId = SteamApi::convertId($steamId, 'id64');

        if(Request::ajax()) {
            $response = array(
                'playerAvatar' => SteamApi::user($playerSteamId)->getPlayerSummaries()[0]->avatarFullUrl,
                'playerSteamUrl' => SteamApi::user($playerSteamId)->getPlayerSummaries()[0]->profileUrl
            );

        if($response) {
            return Response::json(array(
                'success' => true,
                'data'   => $response
            ));
        }
        }
    }
}
