<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Search players. If direct match, send to player page. If not, return all results to search results view.
     *
     * @param SearchRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function playerSearch(SearchRequest $request)
    {
        $player = Player::where('name', $request->input('searchTerm'))->first();

        if($player) {
            return redirect(route('view-player', array('id' => $player->accountID)));
        }

        $results = Player::where('name', 'LIKE', '%'.$request->input('searchTerm').'%')->paginate(15);
        return view('search.results', compact('results'));
    }

    public function index() {
        return view('search.results');
    }

}
