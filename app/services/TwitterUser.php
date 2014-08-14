<?php namespace App\Services;

class TwitterUser {

    private $data = array();

    public function __construct($prefill=array())
    {
        $this->data = $prefill;
    }

    public function setUsername($username)
    {
        $this->data['username'] = $username;
        return $this;
    }

    public function addTweet($tweetText)
    {
        if (!isset($this->data['tweets'])) $this->data['tweets'] = array();

        $this->data['tweets'][] = $tweetText;
        return $this;
    }

    public function setNumberOfTweets($numOfTweets)
    {
        $this->data['num_of_tweets'] = $numOfTweets;
        return $this;
    }

    public function setNumberOfFollowers($numOfFollowers)
    {
        $this->data['num_of_followers'] = $numOfFollowers;
        return $this;
    }

    public function setNumberUserIsFollowing($numUserIsFollowing)
    {
        $this->data['num_user_is_following'] = $numUserIsFollowing;
        return $this;
    }

    public function getJsonArray()
    {
        return $this->data;
    }
}