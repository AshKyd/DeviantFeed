<?php

class DeviantFeed {

	public $items = Array();

	function loadFeed($uri){
		
		// Reset our feed
		$this->items = Array();
		
		try{
			$feedContents = file_get_contents($uri);
			$feedContents = new SimpleXMLElement($feedContents);
		}catch(Exception $e){
			return false;
		}

		for($i=0; $i < count($feedContents->channel->item); $i++){
			
			// Get the standard fields.
			$newItem = new DeviantItem($feedContents->channel->item[$i]);
			if($newItem){
				$this->items[] = $newItem;
			}
		}	
		
		return true;
	}

}
