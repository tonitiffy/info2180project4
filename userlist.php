<?php
    session_start();
    try {
		$db = new PDO("mysql:dbname=cheapomail;host=localhost", "root", "");
		
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 
    $query = $db->prepare("SELECT firstname,lastname,id, username FROM User ORDER BY id");
    $query-> execute();
    $results = $query-> fetchAll();
    $counter=1;
?>
    <div class="header">Users</div>
<?php
        foreach($results as $row){
            if(fmod($counter + 1,2)== 0){     
                $rownum = 'u1';
            }else{
                $rownum = 'u2';
            }
            $counter = $counter + 1; 
?>
            <div class=<?php echo($rownum)?>><?php echo($row["id"]); ?> &nbsp;<?php echo($row["firstname"]." "); echo($row["lastname"]);?> &nbsp; <?php echo($row["username"]);?></div>
<?php
        }
?>
