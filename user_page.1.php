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
                                            <table  class="table table-hover" id = "messagestable">

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal Message content-->
      <div class="modal-content">
        <div class="modal-header">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Modal Header</h4>
          
        </div>
        <div class="fname" style="float: left;"> sender Div</div>
<div class="dtime" style="float: right;">Date Div</div>
<br>
        <div class="modal-body">
          <p class="message_area">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. 

Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. 

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. Sed lectus. Integer euismod lacus luctus magna. 

Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem, at interdum magna augue eget diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. Sed non quam. In vel mi sit amet augue congue elementum. Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec, blandit vel, egestas et, augue. Vestibulum tincidunt malesuada tellus. Ut ultrices ultrices enim. Curabitur sit amet mauris. Morbi in dui quis est pulvinar ullamcorper. Nulla facilisi. Integer lacinia sollicitudin massa. 

Cras metus. Sed aliquet risus a tortor. Integer id quam. Morbi mi. Quisque nisl felis, venenatis tristique, dignissim in, ultrices sit amet, augue. Proin sodales libero eget ante. Nulla quam. Aenean laoreet. Vestibulum nisi lectus, commodo ac, facilisis ac, ultricies eu, pede. Ut orci risus, accumsan porttitor, cursus quis, aliquet eget, justo. Sed pretium blandit orci. Ut eu diam at pede suscipit sodales. Aenean lectus elit, fermentum non, convallis id, sagittis at, neque. 

</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>

   
    
</table>
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