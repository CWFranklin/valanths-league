<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

class DiscordController extends Controller
{
    public function redirect()
    {
        return Socialite::with('discord')
            ->setScopes(['identify', 'email', 'guilds'])
            ->redirect();
    }

    public function callback()
    {
        $userDiscord = Socialite::with('discord')->user();
        dd($userDiscord);

        $users = User::where('provider_id', $userDiscord->getId())->first();

        if ($users) {
            Auth::login($users);
            return redirect()->route('home');
        }

        $user = User::create([
            'name' => $userDiscord->name,
            'nickname' => $userDiscord->nickname,
            'email' => $userDiscord->email,
            'avatar' => $userDiscord->avatar,
        ]);

        return redirect()->route('home');
    }
}
