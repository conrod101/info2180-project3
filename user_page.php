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
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href= "css/tab.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font.css" />
    <link rel="stylesheet" type="text/css" href="css/chat.css" />
    <link rel="stylesheet" type="text/css" href="css/table.css" />


    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="user_page.js"></script>
    <link   href="index.css" type="text/css" rel="stylesheet" />
    <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
       
      
        
	</head>

	<body>
		
    <div class="container">
		<a href = "logout.php"><button id="logout">Logout</button></a>
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
                                    <a class="navbar-brand" id="brand" href="#">Hello, <u><?php echo $_SESSION['user'];?></u></a>
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
                                <br />
                                
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" class="otherbut">
                                <button id="btn_inbox"  >
                            Inbox
                        </button>
                                <div id="treeview">
                                </div>
                            </div>
                            <br />
                            
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" class="otherbut">
                                <button id="btn_sent"  >
                            Sentbox
                        </button>
                                <div id="treeview">
                                </div>
                            </div>
                            <br />
                            
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" class="otherbut">
                                <button id="btn_contacts"  >
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
                                            <div class="col-xs-8 col-md-8">
                                                <div class="input-group">
                                                    <input type="text" name="" placeholder="Seach...." class="form-control">
                                                    <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" tabindex="-1">
                                                    <span class="fa fa-question fa-2x" area-hidden="true"></span>
                                                    </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-9 col-md-10">
                                                <div class="btn-group">
                                                    <a data-toggle="dropdown" href="#" class="btn btn-warning btn-md" aria-expanded="false">All
                        <i class="fa fa-angle-down "></i>
                                            </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">None</a></li>
                                                        <li><a href="#">Read</a></li>
                                                        <li><a href="#">Unread</a></li>
                                                    </ul>
                                                    <a href="#" class="btn btn-warning">
                                                        <i class=" fa fa-refresh fa-lg"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <a data-toggle="dropdown" href="#" class="btn btn-warning btn-md" aria-expanded="false">More
                        <i class="fa fa-angle-down "></i>
                                            </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Mark all as read</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-md-2">

                                                <div class="btn-group pull-right">
                                                    <a data-toggle="dropdown" href="#" class="btn btn-primary" aria-expanded="false">
                                                        <i class="fa fa-cog"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Comfortable</a></li>
                                                        <li><a href="#">Cozy</a></li>
                                                        <li><a href="#">Compact</a></li>
                                                        <hr>
                                                        <li><a href="#">Configure inbox</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div id="grid">
 <div class="divTable blueTable">
<div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell">cell1_1</div>
<div class="divTableCell">cell2_1</div>
<div class="divTableCell">cell3_1</div>
</div>
<div class="divTableRow">
<div class="divTableCell">cell1_2</div>
<div class="divTableCell">cell2_2</div>
<div class="divTableCell">cell3_2</div>
</div>
<div class="divTableRow">
<div class="divTableCell">cell1_3</div>
<div class="divTableCell">cell2_3</div>
<div class="divTableCell">cell3_3</div>
</div>
<div class="divTableRow">
<div class="divTableCell">cell1_4</div>
<div class="divTableCell">cell2_4</div>
<div class="divTableCell">cell3_4</div>
</div>
<div class="divTableRow">
<div class="divTableCell">cell1_5</div>
<div class="divTableCell">cell2_5</div>
<div class="divTableCell">cell3_5</div>
</div>
</div>
</div>
<div class="blueTable outerTableFooter">
<div class="tableFootStyle">
<div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
</div>
</div>

                                        
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
                                        <span aria-hidden="true">&times;</span>
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
                                                <input id = 'to' type="text" name="search" placeholder="Enter e-mail" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <p>Subject: </p>
                                            </div>
                                            <div class="col-md-9">
                                                <input id = 'subjectinput' type="text" name="search" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <p>Message: </p>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea id = 'message' class="form-control" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary pull-left" id="btn_file">
                                <span class="fa fa-paperclip fa-2x"></span>
                                <input type="file" id="file" style="display: none;" />
                            </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id = "send" type="button" class="btn btn-primary">Send</button>
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

</html>