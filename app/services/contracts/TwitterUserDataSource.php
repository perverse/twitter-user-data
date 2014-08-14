<?php namespace App\Services\Contracts;

interface TwitterUserDataSource {
    /**
     * @param string $username Users Twitter handle
     * @return App\Services\TwitterUser;
     */
    public function getUser($username);
}