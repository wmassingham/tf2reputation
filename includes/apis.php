<?php

require('simpleCache.php');

class BptfAPI {

	public $cache;
	public $steamid;
	public $data;

	public function __construct($steamid) {
		$this->cache = new SimpleCache("bptf");
		$this->steamid = $steamid;
		$this->data = json_decode($this->cache->get_data("$this->steamid", "http://backpack.tf/api/IGetUsers/v2/?steamids=$this->steamid&format=json"));
	}
	
}

class Tf2opAPI {

	public $cache;
	public $steamid;
	public $data;
	
	public function __construct($steamid) {
		$this->cache = new SimpleCache("tf2op");
		$this->steamid = $steamid;
		$this->data = $this->getUserData($this->steamid);
	}

	private function getUserData($steamid) {
		// courtesy http://stackoverflow.com/a/6366390/217374
		$ret = json_decode($this->cache->get_cache($steamid));
		if(!$ret) {
			$dom = new DomDocument();
			libxml_use_internal_errors(true);
			$dom->loadHTML($this->cache->do_curl("http://www.tf2outpost.com/user/$steamid"));
			$finder = new DomXPath($dom);
			$classname = "value";
			$nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
			$ret = array();
			foreach ($nodes as $node) { $ret[] = $node->nodeValue; }
			$this->cache->set_cache($steamid, json_encode($ret));
		}
		return $ret;
	}

}

class SrAPI {

	public $cache;
	public $steamid;
	public $data;

	public function __construct($steamid) {
		$this->cache = new SimpleCache("steamrep");
		$this->steamid = $steamid;
		$this->data = json_decode($this->cache->get_data("$this->steamid", "http://steamrep.com/api/beta/reputation/$this->steamid?json=1"));
	}

}

class SteamAPI {

	public $cache;
	public $steamid;
	public $data;
	public $onlineState = "offline";
	public $username = "";
	private $apikey = "F88585185B492CE2140464101ED7574C";

	public function __construct($steamid) {
		$this->cache = new SimpleCache("steam");
		$this->steamid = $steamid;
		$this->data = json_decode($this->cache->get_data("$this->steamid", "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$this->apikey&steamids=$this->steamid"));
		
		if (!isset($this->data->response->players[0]->steamid)) {
			die('no players found');
		}

		$this->username = htmlspecialchars($this->data->response->players[0]->personaname);

		if (isset($this->data->response->players[0]->gameid)) {
			$this->onlineState = "ingame";
		} else if ($this->data->response->players[0]->personastate == 1) {
			$this->onlineState = "online";
		} else {
			$this->onlineState = "offline";
		}
	}

}

?>
