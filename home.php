<?php
    session_start();
    try {
		$db = new PDO("mysql:dbname=cheapomail;host=localhost", "root", "");
		
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 
    //echo("hello");

    $query = $db->prepare("SELECT * FROM Message JOIN Message_read ON message.id = Message_read.message_id WHERE message_read.reader_id = :reader_id ORDER BY date DESC;");
    $query->execute(array(':reader_id'=>$_SESSION["id"]));
    $results = $query->fetchAll();


?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Home</title>
        <script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
        <script src="cheapomail.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <button type="button" onclick="return composeMsg();">Compose</button>
            <button type="button" onclick="return logout();">Logout</button>
        </div>
        <br />
        <br />
        <div>
            <table>
                <tr>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Date</th>
                </tr>
<?php
        foreach($results as $row){
            $query2 = $db->prepare("SELECT * FROM user WHERE id = :user_id;");
    $query2->execute(array(':user_id'=>$row["user_id"]));
    $sender = $query2->fetchAll();
            $senderFirstname = $sender[0][1];
            $senderLastname = $sender[0][2];
            
        ?>
        <tr><td><?php echo($senderFirstname." ".$senderLastname);?></td><td><?php echo($row["subject"]);?></td><td><?php echo($row["date"]);?></td></tr>
        <tr><td colspan="3"><?php echo($row["body"]);?></td></tr>
        <?php
        }
?>
            </table>
        </div>
    </body>
</html>
