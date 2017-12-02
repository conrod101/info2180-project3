
$(document).ready(function (){

    let send = $("#send");
    let url  = "messages.php";
    
    setInterval(loadMessages(),1000);
    
    send.on("click",function(element){
        
        let recipients = $("#to").val();
        let message    = $("#message").val();
        let subject    = $("#subjectinput").val();
        
        let messageData = {
            "recipients": recipients,
            "message": message,
            "subject": subject,
            "timestamp":getCurrentDate()
        };
        
        console.log(messageData);
        
        $.ajax({
            type: "POST",
            url: url,
            data: messageData,
            
            success: function(response){
                console.log(response);
            },
            failure: function(response){
                console.log(response);
            }
        });
    });
    
    function getCurrentDate(){
        let now         = new Date();
        let dayOfMonth  = now.getDate();
        let monthInYear = now.getMonth()+1;
        let year        = now.getFullYear();
        let hours       = ('0'+ now.getHours()).slice(-2);
        let minutes     = ('0'+ now.getMinutes()).slice(-2);
        let seconds     = ('0'+ now.getSeconds()).slice(-2);
        let dateString  = `${year}-${monthInYear}-${dayOfMonth} ${hours}:${minutes}:${seconds}`;
        
        return dateString;
    }
    
     function loadMessages(){
        console.log("here");
        $.ajax({
            type: "POST",
            data:{},
            url:"loadMessages.php",
            
            success: function(response){
                console.log(response);
            },
            failure: function(response){
                consloe.log('ERROR: ' + response);
            }
        })
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
})