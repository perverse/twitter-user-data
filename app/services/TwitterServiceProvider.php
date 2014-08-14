<?php namespace App\Services;

use Illuminate\Support\ServiceProvider;
use Thujohn\Twitter\Twitter as TwitterConnector;
use Config;

class TwitterServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('TwitterAPIConnector', function(){
            $config = Config::get('services.twitter');
            return new TwitterConnector($config);
        });

        $config = Config::get('services.twitter');

        foreach ($config as $key => $val) {
            if (empty($val)) unset($config[$key]);
        }

        if (isset($config['consumer_key']) && isset($config['consumer_secret']) && isset($config['token']) && isset($config['secret'])) {
            $this->app->bind('App\Services\Contracts\TwitterUserDataSource', 'App\Services\TwitterUserAPI');
        } else {
            $this->app->bind('App\Services\Contracts\TwitterUserDataSource', 'App\Services\TwitterUserScraper');
        }
    }

}