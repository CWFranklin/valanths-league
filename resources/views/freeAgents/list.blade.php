@extends('layouts.app')

@section('content')
@php
    $positions = ['N/A', 'Top', 'Jungle', 'Mid', 'ADC', 'Support'];
@endphp
<div class="container">
    <div class="row bg-light border border-round mb-4 py-2">
        <div class="col-md-6">
            <!--<form class="form-inline">
                <select id="position" class="form-control" name="position">
                    <option value="">Position</option>
                </select>

                <select id="rank" class="form-control mr-3" name="rank">
                    <option value="">Rank</option>
                </select>
            </form>-->
        </div>

        <div class="col-md-6">
            <input id="search" class="form-control" type="search" placeholder="Search" aria-label="Search">
        </div>
    </div>

    <div id="agents" class="row">
        @foreach ($freeAgents as $fAgent)
            @php
                $posPref = [];
                for ($i = 1; $i <= 5; $i++) {
                    if ($fAgent->{'preferred_position_'.$i} ?? 0 > 0) {
                        $pos = $fAgent->{'preferred_position_'.$i};
                        $posPref[] = $positions[$pos];
                    }
                }
            @endphp
            <div class="agent col-sm-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $fAgent->league_account }}</h4>
                        <p class="card-text">
                            <strong>Peak Rank:</strong> <span class="rank">{{ $fAgent->rank->name }}</span><br>
                            <strong>Positions:</strong> <span class="positions">{{ implode($posPref, ' / ') }}</span><br>
                            @if(!empty($fAgent->description)) <strong>Comments:</strong> {{ $fAgent->description }} @endif
                        </p>

                        @if ($fAgent->provider_id)
                            <a class="btn btn-discord" href="https://discordapp.com/channels/@me/{{ $fAgent->provider_id }}" target="_blank">Discord DM</a>
                        @endif
                        <a class="btn btn-info" href="https://euw.op.gg/summoner/userName={{ $fAgent->league_account }}" target="_blank">OP.GG</a>
                        <a class="btn btn-info" href="https://www.leagueofgraphs.com/summoner/euw/{{ $fAgent->league_account }}" target="_blank">LoG</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var val = $(this).val().toLowerCase()
            $('#agents .agent').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1)
            })
        })
    })
</script>
@endsection
