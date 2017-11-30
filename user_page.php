<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <title>Cheapo Mail</title>
        
        <!-- you can modify this as needed or to your preference -->
        <link href="index.css" type="text/css" rel="stylesheet" />
        
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        
        <!-- you write this -->
        
	</head>

	<body>
    <div class="container">
		<a href = "logout.php"><button id="logout">Logout</button></a>
        <div class="header">
            <h1>Cheapo Mail</h1>
     
        </div>

	    <div class="page admin">
		    <p class="greeting">MESSAGES  <span id="name"></span></p>
	   
	    </div>
	    <div class="menu">
	        <p id="compose">COMPOSE </p>
	        <p id="inbox">Inbox  </p>
	        <p id="drafts">Drafts  </p>
	        <p id="sentbox">Sent  </p>
	        <p id="trash">Deleted  </p>
	    </div>
	    <div class="viewer">
	        <p id="messagelist">messages </p>

	        
	    </div>
	    <div class="open">

   	    </div>
    </div>
</body>
</html>