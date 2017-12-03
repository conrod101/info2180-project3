let addRow;
let displayMessage;

let msgs = [{"message_id":"10","sender":"3","subject":"Suceess","date_sent":"2017-12-01 19:25:00","body":"Just tried the messaging functionality and it works."},{"message_id":"12","sender":"2","subject":"test","date_sent":"2017-12-01 20:14:08","body":"This be a test "}]

$(document).ready(function (){
    
    let send              = $("#send");
    let url               = "messages.php";
    
    setInterval(loadMessages,5000);
    
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
         
        let messageArea       = $("#messagesDisplay");
        let messagesOnDisplay = messageArea.children().length; 
         
         
        $.ajax({
            dataType : "JSON",
            type: "POST",
            data:{},
            url:"loadMessages.php",
            
            success: function(response){
                //console.log(response);
                addAllMessages(response);
            },
            
            failure: function(response){
                console.log('ERROR: ' + response);
            }
        })
        
     }
    
    function displayMessage(messageObject){
        let newRow = $(`<tr></tr>`)
        
        let message_id      = $(`<td class = 'message_id'>${messageObject['message_id']}<td>`);
        let message_date    = $(`<td>${messageObject['date_sent']}<td>`);
        let message_sender  = $(`<td>${messageObject['sender']}<td>`);
        let message_subject = $(`<td>${messageObject['subject']}<td>`);
        let message_body    = $(`<td>${messageObject['body']}<td>`);
        
        newRow.append(message_sender);
        newRow.append(message_subject);
        newRow.append(message_date);
        newRow.append(message_id);
        //newRow.append(message_body);
        
        newRow.insertBefore($("tbody"));
    }
    
   
   function isNewMessage(messageObject){
       let i;
       let messagesIdDt = $(".message_id");
       let existingMessages = [];
       
       if (messagesIdDt.length === 0){
           return true;
       }
       for(i = 0;i<messagesIdDt.length;i++){
           existingMessages.push(messagesIdDt[i].innerText);
           //console.log(existingMessages);
       }
       return !existingMessages.includes(messageObject['message_id']);
    }
    
    function addNewMessage(messageObject){
        if(isNewMessage(messageObject)){
            displayMessage(messageObject);
        }
    }
    
    function addAllMessages(arrayOfMessageObjects){
        let i;
        for(i = 0;i<arrayOfMessageObjects.length;i++){
            addNewMessage(arrayOfMessageObjects[i]);
        }
    }
})