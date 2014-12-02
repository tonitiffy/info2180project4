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
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
    //return false;
}
function loadData(){
    //alert("loadData was called");
    new Ajax.Request("home.php",
        {
            method: "GET",
            onSuccess: function testor(ajax){
                //document.open();
                document.body.innerHTML=ajax.responseText;
                //document.body.innerHTML="hello";
                //document.close();
            }
        }
    );
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
    );
}
function returnToHome(){
    new Ajax.Request("returnHome.php",
        {
            method: "GET",
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
}