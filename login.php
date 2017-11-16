<?php header("Location: adminpage.html");
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
    
?>