<html class="gr__testpro-conrod101_c9users_io">
<head>
    <meta charset="utf-8">
    <title>Cheapo Mail</title>

    <!-- you can modify this as needed or to your preference -->
    
    <link href="index.css" type="text/css" rel="stylesheet">
    <script src="jquery-3.1.1.min.js" type = "text/javascript"></script>
	<script src="login.js" type="text/javascript"></script>
    <!-- you write this -->
    
</head>

<body data-gr-c-s-loaded="true">
    <div class="container">
        <div class="header">
            <h1>&#9993; Cheapo Mail &#9993;</h1>
            
        </div>
        <div class="page login">
            <p class="greeting">Welcome to Cheapo Mail - a simple messaging system that only sends mail to other Cheapo Users.</p>
            <form id="loginForm" action="" method="post">
                <p class="instruction">Sign In</p>
                <input id="username" placeholder="Username" type="text" name="username" required="" autofocus=""><br>
                <input id="pass" placeholder="Password" type="password" name="pass" required=""><br>
                <button type="submit" id = "loginbutton">Sign In</button><br>
            </form>
            <p id="error"></p>
        </div>
    </div>
</body>

</html>