<?php

class DeviantItem {
	
	public $title = '';
	public $link = '#';
	public $pubDate = '';
	public $description = '';
	public $category = Array();
	public $keywords = Array();
	public $rating = 'nonadult';
	public $rights = false;
	public $files = Array();
	public $descriptionRegex = '/(<br \/><div><img[^?]*><\/div>\s+)$/';
	
	function __construct($params){
		if(gettype($params) == 'object'){
			$this->loadFromSimpleXml($params);
			return $this;
		}
	}
	
	function indexFiles($content){
		foreach($content as $file){
			$file = new DeviantFile($file);
			$this->files[$file->getId()] = $file;
		}
	}
	
	function setDescription($description){
		$description = preg_replace($this->descriptionRegex,'',(String)$description);
		$this->description = $description;
		
	}
	
	function loadFromSimpleXml($xml){
		// Load the standard fields
		$this->title = (String)$xml->title;
		$this->link = (String)$xml->link;
		$this->pubdate = (String)$xml->pubDate;
		$this->setDescription($xml->description);
		
		// Load the various namespaces.
		$media = $xml->children('media',true);
		$creativeCommons = $xml->children('creativeCommons',true);
		$this->rating = (String)$media->rating;
		$this->category = explode('/',$media->category);
		$this->rights = new DeviantRights();
		$this->rights->setAlias($media->credit[0], $media->credit[1]);
		$this->rights->setRightsString($media->copyright);
		$this->rights->setRightsUri($creativeCommons->license);
		$this->rights->setAttributionUri($media->copyright->attributes());
		
		$this->indexFiles($media->content);
		$this->indexFiles($media->thumbnail);
			
	}
	
}
