function validateData() {
    //
    //alert("hello");
    var firstname = $("firstname").value;
    var lastname = $("lastname").value;
    var password = $("password").value;
    var retypePassword = $("retypePassword").value;
    var username = $("username").value;
   
//alert(firstname+lastname+password+retypePassword+username);
    var re = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$/; 
    //alert(re.exec(password));
    if (firstname===""){
        $("firstname").style.backgroundColor="red";
    }else{
        $("firstname").removeAttribute("style");
    }
    if(lastname===""){
        $("lastname").style.backgroundColor="red";
    }
    else{
        $("lastname").removeAttribute("style");
    }
    if(username===""){
        $("username").style.backgroundColor="red";
    }else{
        $("username").removeAttribute("style");
    }
    if(password.length < 8|| re.exec(password)===null){
        $("password").style.backgroundColor="red";
    }else{
        $("password").removeAttribute("style");
    }
    if(retypePassword==="" || retypePassword!==password){
        $("retypePassword").style.backgroundColor="red";
    }else{
        $("retypePassword").removeAttribute("style");
    }
    if(firstname!==""&&lastname!==""&&username!==""&&password.length>7&&re.exec(password)!==null&&retypePassword!==""&&retypePassword===password){
        //alert("everything is ok");
        new Ajax.Request("addUser.php",
            {
                method: "GET",
                parameters: 'firstname='+firstname+'&lastname='+lastname+'&username='+username+'&password='+password,
                onSuccess: function testor(ajax){
                    //alert("hello from success");
                    document.open();
                    document.write(ajax.responseText);
                    document.close;
                }
            }
        );
    }
}

function resetForm(){
    var textfields = document.getElementsByTagName("input");
    for (var i=0;i< textfields.length;i++){
        textfields[i].removeAttribute("style");
    }
}

