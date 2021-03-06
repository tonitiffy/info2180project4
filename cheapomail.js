function verifyUser(){
    var username = $("username").value;
    var password = $("password").value;
    new Ajax.Request("login.php",
        {
            method: "GET",
            parameters: 'username='+username+'&password='+password,
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();

            }
        }
    );
}
function loadData(){
    new Ajax.Request("home.php",
        {
            method: "GET",
            onSuccess: function handler(ajax){
                document.body.innerHTML=ajax.responseText;
            }
        }
    );
    
}
function composeMsg(){
    new Ajax.Request("composeMsg.php",
        {
            method: "GET",
            onSuccess: function handler(ajax){
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
            onSuccess: function handler(ajax){
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
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
}
function returnHome(){
    new Ajax.Request("returnHome.php",
        {
            method: "GET",
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
}
function loadUsers(){
    new Ajax.Request("userlist.php",
        {
            method: "GET",
            onSuccess: function handler(ajax){
                $("userlist").innerHTML = ajax.responseText;
            }
        }
    );
}