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

    $stmt = $db->prepare("INSERT INTO Message(body,subject,user_id,recipient_ids) VALUES(:body,:subject,:user_id,:recipient_ids)");
    $stmt->execute(array(':body'=>$body,':subject'=> $subject, ':user_id'=>$_SESSION["id"],':recipient_ids'=> $recipients));

    $stmt = $db->prepare("SELECT last_insert_id() FROM Message;");
    $stmt->execute();
    $results=$stmt->fetchAll();
    $message_id=$results[0][0];
    
    $recipientsArray=explode(",",$recipients);
    $date = new DateTime();
    echo $date->format('Y-m-d H:i:sP');
    foreach($recipientsArray as $recipient){
        //echo($recipient);
        $stmt = $db->prepare("INSERT INTO Message_read(message_id,reader_id,date) VALUES(:message_id,:reader_id,NOW());");
    $stmt->execute(array(':message_id'=>$message_id,':reader_id'=> $recipient));
    }
        
    /*$stmt = $db->prepare("INSERT INTO Message_read(message_id,reader_id,date) VALUES(:message_id,:reader_id, :date,);");
    $stmt->execute(array(':message_id'=>$,':reader_id'=> $, ':date'=>$));
    */
    header("location: home.php");

?>