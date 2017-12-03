let x;
$(document).ready(function(){
    let errorData;
    let formData  = {};
    let form      = $('form');
    let errorBox  = $('#error');
    let url       = 'createUsers.php';


    $(form).submit(function(e){
        e.preventDefault();
        
        formData['firstname'] = $('#firstname').val();
        formData['lastname']  = $('#lastname').val();
        formData['username']  = $('#username').val();
        formData['password1'] = $('#pass').val();
        formData['password2'] = $('#cpass').val();
        
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            cache: false,
            
            success: function(response){
                errorData = JSON.parse(response);
                x = errorData;
                dispalyErrorMessages(errorData);
            },
            failure: function(){
                console.log('ERROR');
            }
        })
    })
    
    function dispalyErrorMessages(errorData){
        errorBox.empty();
        if(!errorData.password_match){
            $(errorBox).append('<p>The passwords do not match<p>');
        }
        if(!errorData.username_available){
            $(errorBox).append('<p>This username is unavailable<p>');
        }
        if (errorData.no_errors){
            alert('Successful Submission');
            $(form).trigger('reset');
            errorBox.empty();
        }
    }
})
   