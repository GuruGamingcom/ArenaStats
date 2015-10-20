<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TopListController extends Controller
{

    /**
     * Display the top list for the specified server
     *
     * @param $serverId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function server($serverId)
    {
        $topList = Player::whereRaw('wins + losses >= 200')->where('serverID', $serverId)->orderBy('rating', 'DESC')->paginate(15);
        return view('toplist.server', compact('topList'));
    }

    /**
     * Displays the top list for all servers
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $topListAll = Player::whereRaw('wins + losses >= 200')->orderBy('rating', 'DESC')->paginate(15);
        return view('toplist.all', compact('topListAll'));
    }
}
