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
<link rel="stylesheet" type="text/css" href="test.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">


    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="test.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="user_page.js"></script>
    <link href="index.css" type="text/css" rel="stylesheet">
    <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
       
      
        
	</head>

	<body data-gr-c-s-loaded="true" style="">
		
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
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                                    <a class="navbar-brand" id="brand" href="#">Hello, <u>Abrown</u></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-2" id="column-resize">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <button id="btn_email" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            New E-mail
                        </button>
                                <div id="treeview">
                                </div>
                                <br>
                                
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <button id="btn_inbox">
                            Inbox
                        </button>
                                <div id="treeview">
                                </div>
                            </div>
                            <br>
                            
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <button id="btn_sent">
                            Sentbox
                        </button>
                                <div id="treeview">
                                </div>
                            </div>
                            <br>
                            
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <button id="btn_contacts">
                            Contacts
                        </button>
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
                                                <input id="to" type="text" name="search" placeholder="Enter e-mail" class="form-control">
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
                                                <textarea id="message" class="form-control" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id="send" type="button" class="btn btn-primary">Send</button>
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