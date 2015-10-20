@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                            <a class="steamUrl" href="#"><h2>{{$player->name}}</h2></a>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <figure style="margin-bottom:20px;">
                                <a class="steamUrl" href="#"><img id="steamAvatar" src="/img/load.gif" alt="" class="img-circle img-responsive"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 divider text-center">
                        <div class="col-xs-12 col-sm-3 emphasis">
                            <h2><strong> {{$player->rating}} </strong></h2>
                            <p><small>Rating</small></p>
                        </div>
                        <div class="col-xs-12 col-sm-3 emphasis">
                            <h2><strong>{{$player->wins}}</strong></h2>
                            <p><small>Wins</small></p>
                        </div>
                        <div class="col-xs-12 col-sm-3 emphasis">
                            <h2><strong>{{$player->losses}}</strong></h2>
                            <p><small>Losses</small></p>
                        </div>
                        <div class="col-xs-12 col-sm-3 emphasis">
                            <h2><strong>{{round(($player->wins / $player->losses), 2)}}</strong></h2>
                            <p><small>W/L Ratio</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-scripts')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <script>
        var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
        $( document ).ready(function() {
            $.ajax({
                url: '{{route('get-steam-data', array('id' => $player->auth))}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    $("#steamAvatar").attr("src", data.data['playerAvatar']);
                    $(".steamUrl").attr("href", data.data['playerSteamUrl']);
                }
            });
        });
    </script>
@stop