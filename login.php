<?php
	try {
		$db = new PDO("mysql:dbname=cheapomail;host=localhost", "root", "");
		
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 

    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    
    /*$stmt = $db->prepare($sql);
    $stmt->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname,':password'=>$password, ':username'=>$username)); */
    
    $query = $db->prepare("SELECT * FROM User WHERE username=:username");
    $query->execute(array(':username'=>$username));
    $results = $query->fetchAll();
    //echo ($results[0][0]);
    //echo ($results[0][1]);
    //echo ($results[0][2]);
    //echo ($results[0][3]);
    //echo ($results[0][4]);

    if ($results[0][3]===$password){
        //echo("Correct password");
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["firstname"] = $results[0][1];
        $_SESSION["lastname"] = $results[0][2];
        $_SESSION["id"] = $results[0][0];
        
        fopen("home.html","r");
        echo (readfile("home.html"));
    }
    else{
        echo("Password Incorrect! Please Re-enter!");
        fopen("index.html","r");
        echo (readfile("index.html"));
    }
    //echo ($results[0][0]);
?>