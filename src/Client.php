<?php

namespace LinearApi;

use LinearApi\AuthMethod;
use LinearApi\Api\Issue;
use LinearApi\Api\Comment;
use LinearApi\Api\Team;
use LinearApi\Api\Project;
use LinearApi\Api\IssueLabel;
use LinearApi\Api\View;
use LinearApi\Api\Reaction;
use LinearApi\Api\Favorite;
use LinearApi\Api\ApiKey;
use LinearApi\Api\Emoji;
use LinearApi\Api\UserSettings;
use LinearApi\Api\User;
use LinearApi\Api\Cycle;
use LinearApi\Api\Document;

class Client
{

    const API_URL = 'https://api.linear.app/graphql';

    const AUTH_METHOD = AuthMethod::API_KEY;

    const API_KEY = null;

    public function __construct($api_key, $auth_method = self::AUTH_METHOD)
    {
        if ($api_key) {
            $this->access = $api_key;
        }

        if ($auth_method) {
            $this->auth_method = $auth_method;
        }

        // check auth method
        AuthMethod::check($this->auth_method);

        $this->issues = new Issue($this);
        $this->comments = new Comment($this);
        $this->teams = new Team($this);
        $this->projects = new Project($this);
        $this->issue_labels = new IssueLabel($this);
        $this->views = new View($this);
        $this->reactions = new Reaction($this);
        $this->favorites = new Favorite($this);
        $this->api_keys = new ApiKey($this);
        $this->emojis = new Emoji($this);
        $this->user_settings = new UserSettings($this);
        $this->users = new User($this);
        $this->cycles = new Cycle($this);
        $this->documents = new Document($this);
    }
    

    public function get_access()
    {
        return $this->access;
    }

    public function get_auth_method()
    {
        return $this->auth_method;
    }
}
