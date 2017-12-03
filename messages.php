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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Extract and sanitize message Data
    $recipients = explode(",",filter_var($_POST['recipients'],FILTER_SANITIZE_STRING));
    $subject    = filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
    $message    = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
    $timestamp  = $_POST['timestamp'];
    $senderID   = $_SESSION['id'];
    
    $validRecipients = array();
    
    foreach($recipients as $recipient){
        
        //Prepare and execute query
        $Query     = "SELECT * FROM users WHERE username = '{$recipient}';";
        $statement = $db->prepare($Query);
        $statement->bindParam(':recipient', $recipient, PDO::PARAM_STR);
        $statement->execute();
        $user      = $statement->fetch(PDO::FETCH_ASSOC);
    
        if($statement->rowCount()==1){
            
            array_push($validRecipients, $user['username']);
            $stmt   =  "INSERT INTO messages (recipient_ids,user_id,subject,body,date_sent) VALUES ('{$user['id']}','{$senderID}','{$subject}','{$message}','{$timestamp}');";
            $result =  $db->prepare($stmt);
            $result -> execute();
        }
    }
    echo json_encode($validRecipients);
}
