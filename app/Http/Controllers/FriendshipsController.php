<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function check($id)
    {
        if(Auth::user()->is_friends_with($id) === 1)
        {
            return ['status' => 'friends'];
        }

        if(Auth::user()->has_pending_friend_requests_from($id))
        {
            return ['status' => 'pending'];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
            return ['status' => 'waiting'];
        }

        return ['status' => 0 ];
    }

    public function add_friend($id)
    {
        // sending notifications to users
        $resp =  Auth::user()->add_friend($id);
        
        User::find($id)->notify(new \App\Notifications\App\Notifications\NewFriendRequest(Auth::user()));

        return $resp;
    }

    public function accept_friend ($id)
    {
        // sending noty
        return Auth::user()->accept_friend($id);
    }
}
