<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

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

        $users = User::where('provider_id', $userDiscord->getId())->first();

        if ($users) {
            Auth::login($users);
            return redirect()->route('home');
        }

        $user = User::create([
            'provider' => 'discord',
            'provider_id' => $userDiscord->getId(),
            'name' => $userDiscord->name,
            'nickname' => $userDiscord->nickname,
            'email' => $userDiscord->email,
            'avatar' => $userDiscord->avatar,
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }
}
