let addRow;
let displayMessage;

let msgs = [{"message_id":"10","sender":"adp100","subject":"Suceess","date_saent":"2017-12-01 19:25:00","body":"Just tried the messaging functionality and it works."},{"message_id":"12","sender":"Abrown","subject":"test","date_sent":"2017-12-01 20:14:08","body":"This be a test "}]

$(document).ready(function (){
    
    let send              = $("#send");
    let url               = "messages.php";
    let closeButton       = $("#close_btn");
    let modalMessageBox   = $("#mymmodal");

    
    setInterval(loadMessages,3000);
    
    //addAllMessages(msgs)
    
    closeButton.on("click", function(){
        $("form")[0].reset();
    })
    
    $("#messagestable tbody").on("click", "tr", function(){
        
        let firstname = $(this).data("additionalData")["firstname"];
        let lastname  = $(this).data("additionalData")["lastname"];
        let body      = $(this).data("additionalData")["body"];
        let subject   = $(this).data("additionalData")["subject"];
        let timestamp = $(this).data("additionalData")["timestamp"];
        var sender        = $(this).data("additionalData")["username"];
        
        $(".fname h3").text(`${firstname} ${lastname}`);
        $(".mmodal-header h4").text(subject);
        $(".dtime h3").text(timestamp);
        $(".mmodal-body p").text(body);
        
        
        
        $(modalMessageBox).show();
    
    })
    
    $("#messagestable").on("click", "tbody tr", function(){
        $(this).css("font-weight","");
        
        let id = $(this).children(".message_id").text();
        
        let readMessageData = {
            "timestamp": getCurrentDate(),
            "message_id": id
        }
        
        //console.log(id);
        
        $.ajax({
            //dataType: "JSON",
            data: readMessageData,
            url: "read_messages.php",
            type:"POST",
            
            success: function(response){
                //console.log("success");
                //console.log(response);
            },
            failure: function(response){
                console.log(response);
            }
        })
    })
    
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
        
        $("form")[0].reset();
        

        $.ajax({
            type: "POST",
            url: url,
            data: messageData,
            
            success: function(response){
                //console.log(response);
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
        let newRow;
        let rows    = $("tbody tr");
        let numRows = rows.length;
        
        if(isUnreadMessage(messageObject)){
            newRow = $(`<tr style="font-weight:bold"></tr>`);
        }
        else{
            newRow = $(`<tr></tr>`);
        }
        
        if(numRows>10){
            $(rows[rows.length - 1]).remove();
        }
        
        $(newRow).data("additionalData",{
            "message_id": messageObject['message_id'],
            "firstname":messageObject['firstname'],
            "lastname":messageObject['lastname'],
            "body":messageObject['body'],
            "timestamp": messageObject["date_sent"],
            "subject": messageObject['subject'],
            "sender": messageObject['username']
        })
        
        
        let message_id      = $(`<td class = 'message_id'>${messageObject['message_id']}<td>`);
        let message_date    = $(`<td>${messageObject['date_sent']}<td>`);
        let message_sender  = $(`<td>${messageObject['sender']}<td>`);
        let message_subject = $(`<td>${messageObject['subject']}<td>`);
        
        newRow.append(message_sender);
        newRow.append(message_subject);
        newRow.append(message_date);
        newRow.append(message_id);
        
        $("tbody").prepend(newRow);
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
    
    var data;

    
    function isUnreadMessage(messageObject){
        $.ajax({
            type: "POST",
            url: "read_messages.php",
            
            success: function(response){
                callBackData(response);
            }
                
        })
        
        function callBackData(Data){
            data = Data;
        }
        
        let result = data.includes(messageObject['message_id']);
        //console.log(!result);
        return !result;
    }
    
})