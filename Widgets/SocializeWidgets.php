<?php namespace Modules\Socialize\Widgets;

use Vinkla\Instagram\Instagram;
use Cache;

class SocializeWidgets
{
    public function instagram($account='', $cachePeriod = 3600)
    {
        $token = setting('socialize::instagram-token');
        if(isset($account) && $token) {
            if(Cache::has('instagram.posts')) {
                $posts = Cache::get('instagram.posts');
            } else {
                $instagram = new Instagram($token);
                $posts = $instagram->get();
                Cache::put('instagram.posts', $posts, $cachePeriod);
            }
            $posts = collect($posts)->take(9);
            return view('socialize::widgets.instagram', compact('posts'));
        }
        return null;
    }
}