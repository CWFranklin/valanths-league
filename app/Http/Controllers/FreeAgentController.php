<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FreeAgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $freeAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $freeAgent)
    {
        if (Auth::id() !== $freeAgent->id) {
            return redirect('/');
        }

        return view('freeAgents.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $freeAgent)
    {
        if (Auth::id() !== $freeAgent->id) {
            return redirect('/');
        }

        $request->validate([
            'league_account' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'free_agent' => ['nullable', 'boolean'],
            'peak_rank' => ['required_if:free_agent,1', 'string'],
            'preferred_position_1' => ['required_if:free_agent,1', 'integer'],
            'preferred_position_2' => ['nullable', 'integer'],
            'preferred_position_3' => ['nullable', 'integer'],
            'preferred_position_4' => ['nullable', 'integer'],
            'preferred_position_5' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
        ]);

        $freeAgent->update($request->all());

        if ($request->password) {
            $freeAgent->password = Hash::make($request->password);
        }

        return redirect('/')->with('status', 'Successfully updated profile!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $freeAgent)
    {
        //
    }
}

// DM user: https://discordapp.com/channels/@me/ + provider_id