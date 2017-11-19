<?php 

$host = getenv('IP');
$user = getenv('C9_USER');
$password = "";
$database = "cheapomail";
$dbport = 3306;


session_start();

$db = new PDO("mysql:host=$host;dbname=$database", $user,$password);


if ($_SERVER[REQUEST_METHOD] == "POST"){
    
    if(isset($_POST["username"]) and isset($_POST["pass"])){
        //Sanitizationof user input
        $username  =  strip_tags($_POST["username"]);
        $username  =  stripslashes($username);
        $password  =  strip_tags($_POST["pass"]);
        $password  =  stripslashes($password);
        
        //Vaidation of login data
        $Query     = "SELECT * FROM users WHERE username = '{$username}';";
        $statement = $db->prepare($Query);
        $statement->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
        $statement->execute();
        $user      = $statement->fetch(PDO::FETCH_ASSOC);
        
        //Handling of server response
        if ($statement->rowCount()==1){
            if(password_verify($password,$user['password']) and $username = 'admin'){
                $_SESSION['logged_in'] = true;
                $_SESSION['user']      = $username;
                $_SESSION['id']        = $user['id'];
                header("Location: adminpage.html");
                }
            //username is not admin
            }
        else {
             header("Location: index.html");
            }
        }
    }
    
/*
header("Location: adminpage.html");
//header('Content-Type: text/html; charset=ISO-8859-15');   //needed to process strings with accents

    session_start();
    include_once("connect.php");    // connection setup

    $_SESSION["logged_in"] = False;
    $users = addslashes($_POST["usersname"]);
    $raw_pass = $_POST["pass"];
    
    $result = $db->query("SELECT * FROM users WHERE usersname='$users' AND password = '$raw_pass'");

    if($result->num_rows == 0){
        print_r(json_encode(array("result"=>"not_found")));     
        exit;
    }
    
    $users_search = $result->fetch_assoc();

    $users_id = $users_search["id"];
    $pass_query = hash_hmac(HASH_PASS, $raw_pass, $users_id);

    $real_pass = $users_search["password"];

    if(strcmp($pass_query, $real_pass) == 0){
        // determine users type
        if($users_id == ADMIN_ID)
            $type = "admin";
        else
            $type = "users";

        $success = array("result"=>"success", "id"=>$users_id, "type"=>$type, "fname"=>$users_search["firstname"], "lname"=>$users_search["lastname"], "usersname"=>$users);
        print_r(json_encode($success)); // print json object with success result and users info (excluding password)

        $_SESSION["logged_in"] = True;
        $_SESSION["users"] = $success;
    } else {
        print_r(json_encode(array("result"=>"password_mismatch"))); // print json object with appropriate 'result'
    }
    */
    