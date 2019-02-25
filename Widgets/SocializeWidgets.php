<?php namespace Modules\Socialize\Widgets;

use Vinkla\Instagram\Instagram;
use Cache;

class SocializeWidgets
{
    public function instagram($account='', $cachePeriod = 3600)
    {
        try {
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

                $publicPath = public_path('assets/socialize');

                if(!\File::isDirectory($publicPath)) {
                    \File::makeDirectory($publicPath);
                }

                foreach ($posts as $post) {
                    $url      = $post->images->standard_resolution->url;
                    $file     = parse_url(basename($url));
                    $filepath = public_path('assets/socialize/'.$file['path']);
                    if(!\File::exists($filepath)) {
                        \File::copy($url, $filepath);
                    }
                    $post->image = url('assets/socialize/'.$file['path']);
                }

                return view('socialize::widgets.instagram', compact('posts'));
            }
        }
        catch (\Exception $exception) {
            \Log::critical('Critical: '.$exception->getMessage());
        }
    }
}
