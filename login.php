<?php
	try {
		$db = new PDO("mysql:dbname=cheapomail;host=localhost", "root", "");
		
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 
    
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $query = $db->prepare("SELECT * FROM User WHERE username=:username");
    $query->execute(array(':username'=>$username));
    $results = $query->fetchAll();
    
    if (count($results)===0){
        echo("User does not exist!");
        echo file_get_contents("index.html");
    }
    elseif ($results[0][3]===$password){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["firstname"] = $results[0][1];
        $_SESSION["lastname"] = $results[0][2];
        $_SESSION["id"] = $results[0][0];
        //header("Location: home.html");
        echo file_get_contents("home.html");
    }
    else{
        echo("Password Incorrect! Please Re-enter!");
        //header("Location: index.html");
        echo file_get_contents("index.html");
    }
    
?>