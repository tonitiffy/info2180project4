function verifyUser(){
    //alert("button clicked");
    var username = $("username").value;
    var password = $("password").value;
    //alert(username);
    //alert(password);
    
    new Ajax.Request("login.php",
        {
            method: "GET",
            parameters: 'username='+username+'&password='+password,
            onSuccess: function testor(ajax){
                $("body").innerHTML = ajax.responseText;
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
                $("body").innerHTML = ajax.responseText;
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
                $("body").innerHTML = ajax.responseText;
            }
        }
    );
    return false;
}
function returnToSignIn(){
    new Ajax.Request("signIn.php",
        {
            method: "GET",
            onSuccess: function testor(ajax){
                $("body").innerHTML = ajax.responseText;
            }
        }
    );
    return false;
}