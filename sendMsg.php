<?php
    try {
		$db = new PDO("mysql:dbname=cheapomail;host=localhost", "root", "");
		
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 
    session_start();

    $subject = $_REQUEST["subject"];
    $recipients = $_REQUEST["recipients"];
    $body = $_REQUEST["body"];

    //echo($_SESSION["id"]);

    /*$stmt = $db->prepare("INSERT INTO Message(body,subject,user_id,recipient_ids) VALUES(:body,:subject,:user_id,:recipient_ids)");
    $stmt->execute(array('body'=>$body,'subject'=> $subject, ':user_id'=>$_SESSION["id"],':recipients'=> $recipients));*/
    fopen("home.html","r");
    echo readfile("home.html");

?>