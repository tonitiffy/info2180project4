function verifyUser(){
    //alert("button clicked");
    var username = $("username").value;
    var password = $("password").value;
    alert(username);
    alert(password);
    
    new Ajax.Request("login.php",
        {
            method: "GET",
            parameters: 'username='+username+'&password='+password,
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
    return false;
}
function composeMsg(){
    new Ajax.Request("composeMsg.php",
        {
            method: "GET",
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
    return false;
}
function sendMsg(){
    var subject = $("subject").value;
    var recipients = $("recipients").value;
    var body = $("body").value;
    new Ajax.Request("sendMsg.php",
        {
            method: "GET",
            parameters: 'subject='+subject+'&recipients='+recipients+'&body='+body,
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
    return false;
}
function logout(){
    new Ajax.Request("logout.php",
        {
            method: "GET",
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    )
    return false;
}
function viewMsg(){
    new Ajax.Request("message.php",
        {
            method: "GET",
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    )
    return false;
}