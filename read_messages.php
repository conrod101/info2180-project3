<?php

$host = getenv('IP');
$user = getenv('C9_USER');
$password = "";
$database = "cheapomail";
$dbport = 3306;

session_start();



// Create connection
$db = new PDO("mysql:host=$host;dbname=$database", $user,$password);
$db -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

//echo json_encode($_SESSION['read_messages'])


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $Query       = "SELECT message_id FROM messages_read WHERE reader_id = '{$_SESSION['id']}';";
    $statement   = $db->prepare($Query);
    $statement  -> bindParam(':recipient', $recipient, PDO::PARAM_STR);
    $statement  -> execute();
    $message_ids = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    $_SESSION['read_messages'] = array($message_ids);
    
    if(!isset($_SESSION['read_messages'])){
        $_SESSION['read_messages'] = array();
    }

    if(!in_array($_POST['message_id'],$_SESSION['read_messages'])){
    
        $message_id = $_POST['message_id'];
        $reader_id  = $_SESSION['id'];
        $date_read  = $_POST['timestamp'];
        
        array_push($_SESSION['read_messages'],$message_id);
        //var_dump($_SESSION['read_messages']);
        
        $stmt   =  "INSERT INTO messages_read (message_id,reader_id,date_read) VALUES ('{$message_id}','{$reader_id}','{$date_read}');";
        $result =  $db->prepare($stmt);
        $result -> execute();
        
    }
    
    echo json_encode(removeNullValues(($_SESSION['read_messages'])));
}

function removeNullValues($array){
	$goodValues = array();
	
	foreach($array as $element){
		if(!$element == null){
			array_push($goodValues,$element);
		}
	}
	return $goodValues;
}
    

