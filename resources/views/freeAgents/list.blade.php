@extends('layouts.app')

@section('content')
@php
    $positions = ['N/A', 'Top', 'Jungle', 'Mid', 'ADC', 'Support'];
@endphp
<div class="container">
    <div class="row bg-light border border-round mb-4 py-2">
        <div class="col-lg-3">
            <form>
                <label for="rank" style="margin-bottom: 0.5rem;">Max Rank (Points)</label>
                <select id="rank" class="form-control mr-3" name="rank">
                    <option value="">Rank (Points)</option>
                    @foreach ($ranks as $rank)
                        <option value="{{ $rank->order }}">{{ $rank->name }} @if($rank->points) ({{ $rank->points }}) @endif</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="col-lg-4">
            <form class="form-inline">
                <p>Positions</p>&nbsp;&nbsp;&nbsp;

                <div id="positions" class="form-group">
                    <div class="form-check form-check-inline">
                        <input id="topCheck" class="form-check-input" type="checkbox" name="topCheck" value="Top">
                        <label for="topCheck">Top</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="jungleCheck" class="form-check-input" type="checkbox" name="jugleCheck" value="Jungle">
                        <label for="jungleCheck">Jungle</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="midCheck" class="form-check-input" type="checkbox" name="midCheck" value="Mid">
                        <label for="midCheck">Mid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="adcCheck" class="form-check-input" type="checkbox" name="adcCheck" value="ADC">
                        <label for="adcCheck">ADC</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="supportCheck" class="form-check-input" type="checkbox" name="supportCheck" value="Support">
                        <label for="supportCheck">Support</label>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-5">
            <label for="search">Search</label>
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
            <div class="agent col-md-4 mb-4" data-points="{{ $fAgent->rank->points }}" data-rank="{{ $fAgent->rank->order }}" data-pos="{{ implode($posPref, '|') }}">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            @if(Auth::user()->avatar)
                                <img class="border border-primary rounded-circle" src="{{ Auth::user()->avatar }}" alt="" width="35" height="35">&nbsp;
                            @endif
                            {{ $fAgent->league_account }}
                        </h4>
                        <p class="card-text">
                            <strong>Peak Rank:</strong> <span class="rank">{{ $fAgent->rank->name }}</span><br>
                            <strong>Positions:</strong> <span class="positions">{{ implode($posPref, ' / ') }}</span><br>
                            @if(!empty($fAgent->description)) <strong>Comments:</strong> {{ $fAgent->description }} @endif
                        </p>

                        @if ($fAgent->provider_id)
                            <a class="btn btn-discord mb-2" href="https://discordapp.com/channels/@me/{{ $fAgent->provider_id }}" target="_blank">Discord DM</a>
                        @endif
                        <a class="btn btn-info mb-2" href="https://euw.op.gg/summoner/userName={{ $fAgent->league_account }}" target="_blank">OP.GG</a>
                        <a class="btn btn-info mb-2" href="https://www.leagueofgraphs.com/summoner/euw/{{ $fAgent->league_account }}" target="_blank">LoG</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#positions input').each(function(i, e) {
            $(e).prop('checked', true)
        })

        function checkPositions(selectedPositions, currentAgent) {
            var result = false

            selectedPositions.forEach(function(e) {
                if (currentAgent.indexOf(e) !== -1) {
                    result = true
                }
            })

            return result
        }

        function triggerFilter() {
            var search = $('#search').val().toLowerCase()
            var rank = parseInt($('#rank').val())
            var positions = []

            $('#positions input:checked').each(function(i, e) {
                positions.push($(e).val())
            })

            $('#agents .agent').filter(function() {
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(search) > -1 &&
                    (rank > -1) ? (parseInt($(this).attr('data-rank')) <= rank) : true &&
                    checkPositions(positions, $(this).attr('data-pos'))
                )
            })
        }

        $('#search').on('keyup', function() {
            triggerFilter()
        })

        $('#rank').on('change', function() {
            triggerFilter()
        })

        $('#positions input').on('change', function() {
            triggerFilter()
        })
    })
</script>
@endsection
