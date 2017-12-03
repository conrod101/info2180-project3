<?php

session_start();

if(!$_SESSION['logginSuccess']){
	header('Location: index.php');
}

?>

<!DOCTYPE html> 
<html>
   <head>
        <meta charset="utf-8">
        <title>Cheapo Mail</title>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/tab.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link href="index.css" type="text/css" rel="stylesheet">


    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="user_page.js"></script>

    <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
       
      
        
	</head>

	<body data-gr-c-s-loaded="true" style="" onload = "">
		
    <div class="container">
		<a href="logout.php"><button id="logout">Logout</button></a>
        <div class="header">
            <h1>Cheapo Mail</h1>
     
        </div>

	    <div class="page admin">
		    <p class="greeting">MESSAGES  <span id="name"></span></p>
	   <!-- E-mail Client - START -->

        <div class="container pb-mail-template1">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <nav class="navbar navbar-default pb-mail-navbar">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ik" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                                    <a class="navbar-brand" id="brand" href="#">Hello, <u><?php echo $_SESSION['user']?></u></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-2" id="column-resize">
                            <div class="collapse navbar-collapse" id="ik">
                                <button id="btn_email" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            New E-mail
                        </button>
                                <div id="treeview">
                                </div>
                                <br>
                                
                            </div>
                            <div class="collapse navbar-collapse" id="ik">
                              <button id="inbox" >
                            Inbox
                        </button>
                                <div id="treeview">
                                </div>
                            </div>
                            <br>
                            
                            <div class="collapse navbar-collapse" id="ik">
                                
                                <div id="treeview">
                                </div>
                            </div>
                            <br>
                            
                            <div class="collapse navbar-collapse" id="ik">
                             
                                <div id="treeview">
                                </div>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <div class="col-md-10">
                            <div class="row" id="row_style">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4 col-md-4">
                                                <p id="inbox_parag">INBOX</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            
                                            
                                        </div>
                                        <hr>
                                        
                                        <div id="grid">
                                            <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!--<div class="divTable blueTable" id = "table">-->
<!--<div class="divTableBody" id="messagesDisplay">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="blueTable outerTableFooter">-->
<!--<div class="tableFootStyle">-->
<!--<div class="links"><a href="#">«</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">»</a></div>-->
<!--</div>-->
<!--</div>-->

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal view -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>New message</h4>
                                        </div>
                                        <div class="col-md-8">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <p>To: </p>
                                            </div>
                                            <div class="col-md-9">
                                                <input id="to" type="text" name="search" placeholder="Recipient" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <p>Subject: </p>
                                            </div>
                                            <div class="col-md-9">
                                                <input id="subjectinput" type="text" name="search" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <p>Message: </p>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea id="message" class="form-control" rows="10" required></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    
                                    <button type="button" id="close_btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id="send" type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of modal -->
                </div>
            </div>
        </div>
        <!-- E-mail Client - END -->
    </div>

</div></body></html>