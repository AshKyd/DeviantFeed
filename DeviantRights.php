<?php

class DeviantRights {
	public $name = '';
	public $avatar = '';
	public $rights = '';
	public $attributionUri = false;
	public $rightsUri = false;
	
	function setAlias($name,$avatar){
		$this->name = (String)$name;
		$this->avatar = (String)$avatar;
	}
	function setRightsString($rights){
		$this->rights = (String)$rights;
	}
	function setAttributionUri($uri){
		if(isset($uri[0])) {
			$uri = $uri[0];
		}
		$this->uri = (String)$uri;
	}
	function setRightsUri($uri){
		$this->rightsUri = (String)$uri;
	}
}
