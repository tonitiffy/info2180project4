<?php
	try {
		$db = new PDO("mysql:dbname=CourseMgmtDB;host=localhost", "comp2190SA", "2014Sem1");
		
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 
	$firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
	$sql = "INSERT INTO User(firstname, lastname, password, username) VALUES (:firstname, :lastname , :password, :username)";
    
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname,':password'=>$password, ':username'=>$username)); 
    
    $query = $db->prepare("SELECT * FROM user");
    $query->execute();
    $results = $query->fetchAll();
?>