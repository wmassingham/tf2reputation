<?php
	// $apikey = "F88585185B492CE2140464101ED7574C";

	// $response = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$apikey&steamids=76561197987981459");

	// var_dump(json_decode($response));

require('simpleCache.php');

class SteamAPI {

	public $cache;
	public $steamid;

	private $apikey = "F88585185B492CE2140464101ED7574C";

	public function __construct($steamid) {
		$this->cache = new SimpleCache("steam");
		$this->steamid = $steamid;
	}

	public function getUserData() {
		$userdata = json_decode($this->cache->get_data("$this->steamid", "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$this->apikey&steamids=$this->steamid"));
		return $userdata;
		/*
		$cachedir = sys_get_temp_dir() . "/userdatacache";
		$file = $cachedir . "/$steamid.json";
		$current_time = time();
        $expire_time = 60 * 60; // 1 hour
        $file_time = @filemtime($file);

        if ( file_exists($file) && ($current_time - $expire_time < $file_time) ) {
        	$content = file_get_contents($file);
        	return json_decode($content, true);
        } else {
        	$content = @file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $apikey . '&steamids=' . $steamid . '&format=json');
        	$json = @json_decode($content, true);

        	if ( $content && count($json['response']['players']) > 0 ) {
        		if (!file_exists($cachedir)) {
        			mkdir($cachedir, 0777, true);
        		}
        		file_put_contents($file, $content);
        		return $json;
        	} else {
        		return NULL;
        	}
        }
        */

    }


}
?>
