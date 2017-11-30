<?php

header("Cache-Control: no-cache, must-revalidate");

$host     = getenv('IP');
$user     = getenv('C9_USER');
$dbpassword = "";
$database = "cheapomail";
$dbport   = 3306;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Create array to record all validation errors
    $_SESSION['errors'] = array();
    
    //Extract data from AJAX requst
    
    $firstname = $_POST['firstname']; 
    $lastname  = $_POST['lastname'];
    $username  = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    
    //Sanitize data from user input before using
    $firstname = strip_tags($firstname);
    $firstname = stripslashes($firstname);
    $lastname  = strip_tags($lastname);
    $lastname  = stripslashes($lastname);
    $username  = strip_tags($username);
    $username  = stripslashes($username);
    $password1 = strip_tags($password1);
    $password1 = stripslashes($password1);
    $password2 = strip_tags($password2);
    $password2 = stripslashes($password2);
   
   //Create database connection
    $db = new PDO("mysql:host=$host;dbname=$database", $user,$dbpassword);
    
    //Prepare and execute query
    $Query     = "SELECT * FROM users WHERE username = '{$username}';";
    $statement = $db->prepare($Query);
    $statement->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $statement->execute();
    $user      = $statement->fetch(PDO::FETCH_ASSOC);
    
    //Validation Checks
    if($statement->rowCount()>0){
        $_SESSION['errors']['username_available'] = false;
    }
    else{
        $_SESSION['errors']['username_available'] = true;
    }
    
    if(strcmp($password1,$password2)==0){
        $_SESSION['errors']['password_match'] = true;
    }
    else{
        $_SESSION['errors']['password_match'] = false;
    }
    
    if($_SESSION['errors']['password_match'] and  $_SESSION['errors']['username_available']){
        $_SESSION['errors']['no_errors'] = true;
    }
    
    //Server Response
    echo json_encode($_SESSION['errors']);
    
    //Execute insert statement
    if ($_SESSION[errors]['no_errors']){

    $password = password_hash($password1,PASSWORD_DEFAULT);
    $stmt     = "INSERT INTO users (firstname,lastname,username,password) VALUES ('{$firstname}','{$lastname}','{$username}','{$password}');";
    $result   = $db->prepare($stmt);
    $result   ->execute();
    
    }
}