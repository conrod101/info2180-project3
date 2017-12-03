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


//$_SESSION['read_messages'] = array();
//echo json_encode($_SESSION['read_messages']);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!in_array($_POST['message_id'],$_SESSION['read_messages'])){
    
        $message_id = $_POST['message_id'];
        $reader_id  = $_SESSION['id'];
        $date_read  = $_POST['timestamp'];
        
        array_push($_SESSION['read_messages'],$message_id);
        //var_dump($_SESSION['read_messages']);
        
        $stmt   =  "INSERT INTO messages_read (message_id,reader_id,date_read) VALUES ('{$message_id}','{$reader_id}','{$date_read}');";
        $result =  $db->prepare($stmt);
        $result -> execute();
        
     //array_map('utf8_encode', $row);
    }
    echo json_encode($_SESSION['read_messages']);
}
