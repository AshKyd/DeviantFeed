<?php
define('DEVIANT_THUMB','thumbnail');
define('DEVIANT_DOWNLOAD','document');
define('DEVIANT_IMAGE','image');

class DeviantFile{
	public $width = 0;
	public $height = 0;
	public $url = '';
	public $medium = DEVIANT_THUMB; // default. Everything else overrides this.
	
	function __construct($params){
		foreach($params->attributes() as $name => $value){
			$this->$name = (String)$value;
		}
	}
	
	function getId(){
		if($this->medium == DEVIANT_THUMB){
			return DEVIANT_THUMB.'-'.$this->width;
		}
		return $this->medium; // Assumes mediums in feed don't overlap.
	}
}
