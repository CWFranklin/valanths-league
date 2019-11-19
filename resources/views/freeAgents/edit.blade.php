@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('/free-agents/' . Auth::id()) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nickname">Nickname</label>
                            <input id="nickname" class="form-control" type="text" value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input id="email" class="form-control" type="email" value="{{ Auth::user()->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="league_account">League Username</label>
                            <input id="league_account" class="form-control @error('league_account') is-invalid @enderror" type="text" name="league_account" value="{{ old('league_account', Auth::user()->league_account) }}" required>

                            @error('league_account')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <hr>

                        <h4>Password</h4>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input class="form-control" type="password_confirmation" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <hr>

                        <h4>Free Agent</h4>

                        <div class="form-group">
                            <div class="form-check">
                                <input id="free_agent" class="form-check-input" type="checkbox" name="free_agent" value="1" @if(old('free_agent', Auth::user()->free_agent)) checked @endif>
                                <label class="form-check-label" for="free_agent">
                                    Enable
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="peak_rank">Peak Rank</label>
                            <select class="form-control @error('peak_rank') is-invalid @enderror" name="peak_rank">
                                <option value="" selected disabled>Please Select</option>
                                @foreach ($ranks as $rank)
                                    <option value="{{ $rank->id }}" @if($rank->id === Auth::user()->peak_rank) selected @endif>{{ $rank->name }}</option>
                                @endforeach
                            </select>

                            @error('peak_rank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <h6>Preferred Positions</h6>

                        @php
                            $positions = [ 'N/A', 'Top', 'Jungle', 'Mid', 'ADC', 'Support'];
                        @endphp

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="preferred_position_1">#1</label>
                            <div class="col-sm-10">
                                <select id="preferred_position_1" class="form-control @error('preferred_position_1') is-invalid @enderror" name="preferred_position_1">
                                    <option value="" selected disabled>Please Select</option>
                                    @foreach ($positions as $key => $pos)
                                        <option value="{{ $key }}" @if(old('preferred_position_1', Auth::user()->preferred_position_1) === $key) selected @endif>{{ $pos }}</option>
                                    @endforeach
                                </select>

                                @error('preferred_position_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="preferred_position_2">#2</label>
                            <div class="col-sm-10">
                                <select id="preferred_position_2" class="form-control" name="preferred_position_2">
                                    <option value="" selected disabled>Please Select</option>
                                    @foreach ($positions as $key => $pos)
                                        <option value="{{ $key }}" @if(old('preferred_position_2', Auth::user()->preferred_position_2) === $key) selected @endif>{{ $pos }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="preferred_position_3">#3</label>
                            <div class="col-sm-10">
                                <select id="preferred_position_3" class="form-control" name="preferred_position_3">
                                    <option value="" selected disabled>Please Select</option>
                                    @foreach ($positions as $key => $pos)
                                        <option value="{{ $key }}" @if(old('preferred_position_3', Auth::user()->preferred_position_3) === $key) selected @endif>{{ $pos }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="preferred_position_4">#4</label>
                            <div class="col-sm-10">
                                <select id="preferred_position_4" class="form-control" name="preferred_position_4">
                                    <option value="" selected disabled>Please Select</option>
                                    @foreach ($positions as $key => $pos)
                                        <option value="{{ $key }}" @if(old('preferred_position_4', Auth::user()->preferred_position_4) === $key) selected @endif>{{ $pos }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="preferred_position_5">#5</label>
                            <div class="col-sm-10">
                                <select id="preferred_position_5" class="form-control" name="preferred_position_5">
                                    <option value="" selected disabled>Please Select</option>
                                    @foreach ($positions as $key => $pos)
                                        <option value="{{ $key }}" @if(old('preferred_position_5', Auth::user()->preferred_position_5) === $key) selected @endif>{{ $pos }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Comments</label>
                            <textarea id="description" class="form-control" name="description">{{ old('description', Auth::user()->description) }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
