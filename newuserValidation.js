function validateData() {
    //
    //alert("hello");
    var firstname = document.getElementById("firstname");
    var lastname = document.getElementById("lastname");
    var password = document.getElementById("password");
    var retypePassword = document.getElementById("retypePassword");
    var username = document.getElementById("username");
    /*alert(password.value);
    var testing = /[A-Z]{2}/.exec("APP");    
    alert(testing);
    alert(/[0-9{1,}A-Z{1,}a-z{1,}]{8,}/.exec("password"));
    */
    
    
    var pattern = new RegExp(/[0-9+A-Z+a-z+]/);
    alert(pattern.test('password'));
    
    /*alert(preg_match("/[0-9{1,}A-Z{1,}a-z{1,}]{8,}/",password.value));*/
    //
    /*if (preg_match([0-9{1,}A-Z{1,}a-z{1,}]{8,},password.value)){
        password.style.backgroundColor = "red";
        return false;
    }
    else{
        password.removeAttribute("style");
    }*/
    /*if (courseTitleEle.value === ""){
        courseTitleEle.style.backgroundColor = "red";
        return false;
    }
    else{
        
        courseTitleEle.removeAttribute("style");
    }
    if (courseDisciplineEle.value === "" || courseDisciplineEle.value.length !== 4 || isNaN(courseDisciplineEle.value,10)!==true){
        courseDisciplineEle.style.backgroundColor = "red";
        return false;
    }
    else{
        courseDisciplineEle.removeAttribute("style");
    }
    if(courseLevelEle.value === "" ){
        courseLevelEle.style.backgroundColor = "red";
        return false;
    }
    else {
        courseLevelEle.removeAttribute("style");
        
    }
    if (courseSemesterEle.value === ""){
        courseSemesterEle.style.backgroundColor = "red";
        return false;
    }
    else{
        courseSemesterEle.removeAttribute("style");
    }
    if (isNaN(parseInt(creditEle.value,10), 10)||creditEle < 0 || creditEle > 8){
        creditEle.style.backgroundColor = "red";
        return false;
    }
    else{
        creditEle.removeAttribute("style");
    }*/
    return true;
}

function resetForm(){
    var textfields = document.getElementsByTagName("input");
    for (var i=0;i< textfields.length;i++){
        textfields[i].removeAttribute("style");
    }
}

