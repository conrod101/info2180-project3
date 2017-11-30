<?php

$host     = getenv('IP');
$user     = getenv('C9_USER');
$password = "";
$database = "cheapomail";
$dbport   = 3306;


session_start();

$db = new PDO("mysql:host=$host;dbname=$database", $user,$password);

$_SESSION['userType']      = 'ORDINARY';
$_SESSION['user']          = '';
$_SESSION['id']            = '';
$_SESSION['logginSuccess'] = false;

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Sanitizationof user input
    $username  =  strip_tags($_POST["username"]);
    $username  =  stripslashes($username);
    $password  =  strip_tags($_POST["password"]);
    $password  =  stripslashes($password);
    
    //Vaidation of login data
    $Query     = "SELECT * FROM users WHERE username = '{$username}';";
    $statement = $db->prepare($Query);
    $statement->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $statement->execute();
    $user      = $statement->fetch(PDO::FETCH_ASSOC);
    
    //Processing Query Results
    if ($statement->rowCount()==1){
        if(password_verify($password,$user['password'])){
            $_SESSION["user"]          = $username;
            $_SESSION["id"]            = $user['id'];
            $_SESSION["logginSuccess"] = true;
            
            if ($username == 'admin'){
                $_SESSION['userType']  = 'ADMIN';
            }
            echo json_encode($_SESSION);
        }
    }
    else{
        echo json_encode($_SESSION);
    }
}
    