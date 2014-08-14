<?php namespace App\Services;

use App\Services\Contracts\TwitterUserDataSource;
use App\Services\TwitterUser;
use Config,
    App;

class TwitterUserAPI implements TwitterUserDataSource {

    private $api;

    public function __construct()
    {
        $this->api = App::make('TwitterAPIConnector');
    }

    public function getUser($username)
    {
        $numOfTweets = (Config::get('services.twitter.num_tweets')) ? Config::get('services.twitter.num_tweets') : 5;
        $user = new TwitterUser();
        $ret = false;

        $user->setUsername($username);

        $response = $this->api->getUserTimeline(array(
            'screen_name' => $username,
            'count' => $numOfTweets,
            'format' => 'array'
        ));

        if (count($response)) {

            foreach ($response as $tweetData) {
                $user->addTweet($tweetData['text']);
                if (!isset($userArr)) $userArr = $tweetData['user'];
            }

            $ret = $user
                ->setNumberOfTweets($userArr['statuses_count'])
                ->setNumberOfFollowers($userArr['followers_count'])
                ->setNumberUserIsFollowing($userArr['friends_count']);

        }

        return $ret;
    }

}