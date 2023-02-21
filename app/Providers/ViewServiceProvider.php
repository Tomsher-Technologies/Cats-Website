<?php

namespace App\Providers;

use App\Models\Common\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.frontend.*', 'frontend.*'], function ($view) {

            $settings = Cache::rememberForever('settings', function () {
                return Setting::all()->keyBy('name');
            });

            $social_links = $settings->where('group', 'social_media');

            $social_icons = [
                'facebook_url' => 'fa-facebook-f',
                'twitter_url' => 'fa-twitter',
                'youtube_url' => 'fa-youtube',
                'instagram_url' => 'fa-instagram',
                'linkedin_url' => 'fa-linkedin',
            ];

            $view->with([
                'settings' => $settings,
                'social_links' => $social_links,
                'social_icons' => $social_icons,
            ]);
        });
    }
}
