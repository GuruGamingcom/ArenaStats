<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class RedirectController extends Controller
{
    /**
     * Redirects a request to the front page where the Top stats are
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function redirectTop($serverId)
    {
        $url = URL::to(route('top-server', array('serverId' => $serverId)));
        return view('redirect', compact('url'));
    }


    /**
     * Redirects a request to the stats page for the player making the request
     *
     * @param $accountID
     * @param $serverId
     * @return \Illuminate\View\View
     */
    public function redirectStats($accountID, $serverId)
    {
        $url = URL::to(route('view-player', array('id' => $accountID, 'serverId' => $serverId)));
        return view('redirect', compact('url'));
    }
}
