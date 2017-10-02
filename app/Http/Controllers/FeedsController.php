<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Post;
use App\User;

class FeedsController extends Controller
{
    public function feed()
    {
        $friends = Auth::user()->friends();
        $feed = array();

        foreach($friends as $friend):
            foreach($friend->posts as $post):
                array_push($feed, $post);
            endforeach;
        endforeach;

        return $feed;
    }
}
