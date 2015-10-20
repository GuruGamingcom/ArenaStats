@extends('layouts.master')
@section('content')
    @include('partials.form-errors')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form" action="{{route('player-search-post')}}" method="post">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" placeholder="Search..." name="searchTerm" aria-describedby="sizing-addon1">
                    <span class="input-group-btn">
                        {!! csrf_field() !!}
                        <button class="btn btn-primary" type="submit">Search!</button>
                    </span>
                </div>
            </form>
            <hr>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                <?php $rank = $topList->firstItem() - 1?>
                @forelse($topList as $player)
                    <tr>
                        <th>{{$rank += 1}}</th>
                        <td><a href="{{route('view-player', array('id' => $player->accountID, 'serverId' => $player->serverID))}}">{{$player->name}}</a></td>
                        <td>{{$player->wins}}</td>
                        <td>{{$player->losses}}</td>
                        <td>{{$player->rating}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No players found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {!! $topList->render() !!}
        </div>
    </div>
@endsection