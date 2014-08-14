<?php namespace App\Services;

use App\Services\Contracts\TwitterUserDataSource;
use App\Services\TwitterUser;
use Symfony\Component\DomCrawler\Crawler;

class TwitterUserScraper implements TwitterUserDataSource {

    public static $baseUrl = 'https://twitter.com/';

    public $num_of_tweets = 5;

    public function __construct(\Goutte\Client $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setNumberOfTweets($num=5)
    {
        $this->num_of_tweets = $num;
    }

    public function getBaseUserData($html)
    {
        $data = array();
        $matches = array();

        $html = preg_replace('/(<!DOCTYPE html>.*<\/html>)/s', '', $html);
        preg_match("/value=\"(.*?)\"/s", $html, $matches);

        if (isset($matches[1])) {
            $jsonArr = json_decode(html_entity_decode($matches[1]), true);
            
            $data['num_of_tweets'] = $jsonArr['profile_user']['statuses_count'];
            $data['num_of_followers'] = $jsonArr['profile_user']['followers_count'];
            $data['num_user_is_following'] = $jsonArr['profile_user']['friends_count'];
        }

        return $data;
    }

    public function getTweets($crawler, $numOfTweets)
    {
        $tweets = $crawler->filter('p.ProfileTweet-text')->each(function($node){
            return $node->text();
        });
        return array_slice($tweets, 0, $this->num_of_tweets);
    }

    public function getUser($username)
    {
        $crawler = $this->getClient()->request('GET', self::$baseUrl . $username);
        $html = $this->getClient()->getResponse()->getContent();
        $html = (string) $html;
        $data = array('username' => $username);
        // if user page is found, do some scraping
        if ($this->getClient()->getResponse()->getStatus() == 200) {

            $data['tweets'] = $this->getTweets($crawler, $this->num_of_tweets);
            $data = array_merge($data, $this->getBaseUserData($html));
        }

        $user = new TwitterUser($data);

        return $user;
    }

}