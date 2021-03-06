<?php

$host     = getenv('IP');
$user     = getenv('C9_USER');
$password = "";
$database = "cheapomail";
$dbport   = 3306;

session_start();

//Include class to construct the messages
include('Message.php');

//Variable to colllect messages
$allMessages = array();

// Create connection
$db = new PDO("mysql:host=$host;dbname=$database", $user,$password);
$db -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$Query     = "select messages.* ,users.firstname,users.lastname,users.username from messages join users on users.id = messages.user_id where recipient_ids = '{$_SESSION['id']}';";
$statement = $db->prepare($Query);
$statement->bindParam(':recipient', $recipient, PDO::PARAM_STR);
$statement->execute();
$messages  = $statement->fetchAll(PDO::FETCH_ASSOC);


if ($statement->rowCount()>0){
    //Processing Query Results
    foreach($messages as $message){
        $messageObject = new Message($message['id'], $message['firstname'],$message['lastname'],$message['username'],$message['subject'],$message['date_sent'],$message['body']);
        array_push($allMessages,$messageObject);
    }
    echo json_encode($allMessages);
}





