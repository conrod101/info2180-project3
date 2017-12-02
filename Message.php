<?php

class Message{
     var $message_id;
	 var $sender;
	 var $subject;
	 var $date_sent;
	 var $body;
	
	function __construct($message_id,$sender,$subject,$date_sent,$body){
		$this->message_id = $message_id;
		$this->sender     = $sender;
		$this->subject    = $subject;
		$this->date_sent  = $date_sent;
		$this->body       = $body;
	}
}