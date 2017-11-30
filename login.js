$(document).ready(function(){
    let loginForm = $('#loginForm');
    let loginData = {};
    let url       = 'login.php';
    let errorBox  = $('#error');
    
    let serverResponse;
    
    loginForm.on('submit', function(element){
        
        element.preventDefault();
        
        
        let username = $('#username').val();
        let password = $('#pass').val();
        
        loginData['username'] = username;
        loginData['password'] = password;
        
        //console.log(loginData);
        
        $.ajax({
            dataType: 'JSON',
            type: 'POST',
            url: url,
            data: loginData,
            
            success: function(response){
                console.log(response);
                serverResponse = response;
                
                if(serverResponse.logginSuccess === true){
                    redirectUser(serverResponse.userType);
                }
                else{
                    displayErrorMessages(serverResponse); 
                }

            },
            
            failure: function(){
                alert('SERVER RESPONSE ERROR : PLEASE TRY AGAIN');
            }
        })
    })
    
    function displayErrorMessages(serverResponse){
        errorBox.empty();
        
        if(!serverResponse.logginSuccess){
            errorBox.append('<p>Incorrect Username or Password</p>');
        }
    }
    
    function redirectUser(userType){
        if(userType === 'ORDINARY'){
            window.location.assign('user_page.php');
        }
        else if(userType === 'ADMIN'){
            window.location.assign('adminpage.php');
        }
    }
    
})