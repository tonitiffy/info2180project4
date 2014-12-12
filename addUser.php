<?php
	try {
		$db = new PDO("mysql:dbname=cheapomail;host=localhost", "root", "");
	}
	catch(PDOException $e){
		exit("Unable to access database. Goodbye!");
	} 
	$firstname = $_REQUEST["firstname"];
    $lastname = $_REQUEST["lastname"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    //echo("hello");
    $re = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$/";
    if (preg_match($re, $password)){
        $stmt = $db->prepare("INSERT INTO User(firstname, lastname, password, username) VALUES (:firstname, :lastname , :password, :username)");
        $stmt->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname,':password'=>$password, ':username'=>$username)); 
        $query = $db->prepare("SELECT * FROM user");
        $query->execute();
        $results = $query->fetchAll();
        foreach($results as $row){
        ?>
        <li><?php echo($row["firstname"]." "); echo($row["lastname"]);?> &nbsp; <?php echo($row["username"]);?> &nbsp; <?php echo($row["password"]); ?></li>
        <?php
        }
    }else{
        echo("Password needs to contain at least 1 Capital letter, 1 number and be at least 8 characters long");
        //header("Location: adduser.html");
        echo file_get_contents("adduser.html");
    }
?>