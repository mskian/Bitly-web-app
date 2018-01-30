<?php

// Bitly Generic access token & username
$username = 'YOUR BITLY USERNAME';
$key = 'YOUR GENERIC ACCESS TOKEN';
$api = new BitlyAPI($username, $key);

class BitlyAPI
{
    var $apiURL = 'https://api-ssl.bitly.com/v3/';
    var $apiStr = '';
  
    function __construct($username, $apiKey){
        $this->apiStr = 'login=' . $username;
        $this->apiStr .= '&access_token=' . $apiKey;
        $this->apiStr .= '&format=json';
    } 
    /* Shorten Long URL */
    function shorten($uri){
        $this->apiStr .= '&longUrl=' . urlencode($uri);
        $query = $this->apiURL . 'shorten?' . $this->apiStr;
        $data = $this->curl($query);
         
        $json = json_decode($data);
        return isset($json->data->url) ? $json->data->url : '';
    }
  
    /* Send CURL Request */
    function curl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
         
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}

