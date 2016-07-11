<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;
use Twitter;
use Facebook;

class Apicontroller extends Controller
{
    public function index()
    {

        

        $ac = "699650015.c69d2f3.930883ba707a42d9be2f693ae2eb1f15"; 
        $inss =  "https://api.instagram.com/v1/users/self/media/recent/?access_token=$ac&count=5";
        Cache:flush();
        $instagramFeed = Cache::remember('instagram', 5, function() use ($inss) {
            $instaa = file_get_contents($inss);
            return json_decode($instaa,true);
        });

        $twitterFeed   =  Cache::remember('twitter', 5, function() {
            $feed = Twitter::getUserTimeline(['screen_name' => 'Zabecnet', 'count' => 5, 'format' => 'json']);
            return json_decode($feed);
        });
    
        $fbFeed = Cache::remember('facebook', 5, function() {
            $accessToken = env('FACEBOOK_APP_ID') . '|' . env('FACEBOOK_APP_SECRET');
            $response = Facebook::get('/zabec.net/feed?limit=5', $accessToken);
            return $facebookFeed = $response->getGraphEdge();
        });

        $facebookFeed = [];
        foreach($fbFeed as $feed) {
            $facebookFeed[] = $feed->asArray();
        }
      

        return view('api')->with(compact('instagramFeed', 'twitterFeed', 'facebookFeed')); 
    }

   
}
