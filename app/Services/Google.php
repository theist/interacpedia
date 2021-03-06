<?php namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Google {

    protected $client;
    protected $service;
    public $blogId;

    function __construct() {
        /* Get config variables */
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key_file_location = base_path() . Config::get('google.key_file_location');

        $this->client = new \Google_Client();
        $this->client->setApplicationName("interacpedia");
        $this->service = new \Google_Service_Blogger($this->client);
        $this->blogId = "5935318404281787196";

        /* If we have an access token */
        if (Cache::has('service_token')) {
            $this->client->setAccessToken(Cache::get('service_token'));
        }

        $key = file_get_contents($key_file_location);
        /* Add the scopes you need */
        $scopes = array('https://www.googleapis.com/auth/blogger');
        $cred = new \Google_Auth_AssertionCredentials(
            $service_account_name,
            $scopes,
            $key
        );

        $this->client->setAssertionCredentials($cred);
        if ($this->client->getAuth()->isAccessTokenExpired()) {
            $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }
        Cache::forever('service_token', $this->client->getAccessToken());
    }

    public function listPosts($blogid="5935318404281787196",$limit = 0)
    {
        $options = [];
        if($limit>0)$options["maxResults"] = $limit;
        $results = $this->service->posts->listPosts($blogid,$options);
        return $results;
    }

    public function blogUrl( $blogid="5935318404281787196" )
    {
        return $this->service->blogs->get($blogid)->url;
    }
    public function pageViews( $blogid="5935318404281787196" )
    {
        return $this->service->pageViews->get($blogid);
    }

}