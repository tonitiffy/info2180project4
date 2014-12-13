<?php
    session_start();
    try {
		$db = new PDO("mysql:dbname=cheapomail;host=localhost", "root", "");
		
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 

    $query = $db->prepare("SELECT * FROM Message JOIN Message_read ON message.id = Message_read.message_id WHERE message_read.reader_id = :reader_id ORDER BY date DESC;");
    $query->execute(array(':reader_id'=>$_SESSION["id"]));
    $results = $query->fetchAll();
?>
    
        <div class='menubar'>
            <input id="home" type="button" value="Home" onclick="returnHome()"/>
            <input id="compose" type="button" value="Compose" onclick="composeMsg()"/>
            <input id="logout" type="button" value="Logout" onclick="logout()"/>
        </div>
        <div>
        <div>
            <div class="header">
                Recent Messages
            </div>
<?php   
        $i=0;
        if (count($results) < 10){
            
            while ($i < count($results)){
                $query2 = $db->prepare("SELECT * FROM user WHERE id = :user_id;");
                $query2->execute(array(':user_id'=>$results[$i][3]));
                $sender = $query2->fetchAll();
                $senderFirstname = $sender[0][1];
                $senderLastname = $sender[0][2];
?>
            <div id="<?php echo $i;?>" class="message" onclick="openMsg()">
                From: <?php echo($senderFirstname." ".$senderLastname);?> &nbsp;
                Date: <?php echo($results[$i][8]);?>
                <br/>
                Subject: &nbsp; <?php echo($results[$i][2]);?>
                <br/>
                <?php echo($results[$i][1]);?>
            </div>
            <br/>
<?php
                $i++;
            }
        }
        else{
            while ($i < 10){
                $query2 = $db->prepare("SELECT * FROM user WHERE id = :user_id;");
                $query2->execute(array(':user_id'=>$results[$i][3]));
                $sender = $query2->fetchAll();
                $senderFirstname = $sender[0][1];
                $senderLastname = $sender[0][2];
?>
            <div id="<?php echo $i;?>" class="message" onclick="openMsg()">
                From: &nbsp;&nbsp; <?php echo($senderFirstname." ".$senderLastname);?> &nbsp;
                Date: <?php echo($results[$i][8]);?>
                <br/>
                Subject: &nbsp; <?php echo($results[$i][2]);?>
                <br/>
                <?php echo($results[$i][1]);?>
            </div>
            <br>
<?php
                $i++;
            }
        }
?>
        </div>
        </div>
</html>
