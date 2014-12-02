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
    //echo($_SESSION["id"]);
    $query->execute(array(':reader_id'=>$_SESSION["id"]));
    $results = $query->fetchAll();
    $query2 = $db->prepare("SELECT firstname,lastname,id, username FROM User ORDER BY id");
    $query2-> execute();
    $results2 = $query2-> fetchAll();
?>
    
        <div class='menubar'>
            <input id="home" type="button" value="Home" onclick="returnToHome()"/>
            <input id="compose" type="button" value="Compose" onclick="composeMsg()"/>
            <input id="logout" type="button" value="Logout" onclick="logout()"/>
        </div>
        <div class="homelayout">
        <div class="userslist">
            CheapoMail Users
            <ul>
                <?php
                foreach($results2 as $row){
                ?>
                <li><?php echo($row["id"]); ?> &nbsp;<?php echo($row["firstname"]." "); echo($row["lastname"]);?> &nbsp; <?php echo($row["username"]);?></li>
                <?php
                }
                ?>
            </ul>
            
        </div>
        <div class="messagedisplay">
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
            <div>
                From: <?php echo($senderFirstname." ".$senderLastname);?> &nbsp;
                Date: <?php echo($results[$i][8]);?>
                <br />
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
            <div>
                From: &nbsp;&nbsp; <?php echo($senderFirstname." ".$senderLastname);?> &nbsp;
                Date: <?php echo($results[$i][8]);?>
                <br />
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
