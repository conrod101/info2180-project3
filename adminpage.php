<?php


session_start();

if(!$_SESSION['logginSuccess']){
	header('Location: index.php');
}


?>

<html class="gr__testpro-conrod101_c9users_io">

<head>
    <meta charset="utf-8">
    <title>Cheapo Mail</title>

    <!-- you can modify this as needed or to your preference -->
    <link href="index.css" type="text/css" rel="stylesheet">
    <script src="jquery-3.1.1.min.js" type = "text/javascript"></script>
    <script src="adminpage.js" type="text/javascript"></script>
    <!-- you write this -->
</head>
<body>
<div class="container">
		<a href = "logout.php"><button id="logout">Logout</button></a>
    <div class="header">
        <h1>Cheapo Mail</h1>
    
    </div>

	<div class="page admin">
		<p class="greeting">Welcome Admin  <span id="name"></span></p>

		<div class="instructions">
			<p class="instruction">To add user complete and submit the form.</p>
			<p class="instruction"><strong>Note:</strong> Password must be at least 8 characters long and must contain a mixture of lower case and upper case letters, and numbers.</p>
		</div>
	    <form id="registrationForm" action="" method="post">
	    	<label>Name</label><br>
	    	<input id="firstname" placeholder="First" type="text" name="firstname" required>
	    	<input id="lastname" placeholder="Last" type="text" name="lastname" required><br>
	        <label>Create a username</label><br>
	        <input id="username" type="text" name="username" required><br>
	        <label>Choose a password</label><br>
	        <input id="pass" type="password" name="pass" pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[a-z])[a-zA-Z\d]{8,}$" title="Password must be at least 8 characters long and must contain at least one lower case letter, upper case letter and number" required><br>
	        <label>Confirm password</label><br>
	        <input id="cpass" type="password" name="cpass" required><br>
	        <button id = 'submit' type="submit">Register</button>
	        <div id="error"></div>
	    </form> 
	</div>
</div>
</body>
</html>
