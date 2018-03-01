<?php
	$uname='kxg2';
	$pass='lucdlNiqZ';
	$hostname='sql1.njit.edu';

	$dsn="mysql:host=$hostname;dbname=$uname";
	try
	{
		$db=new PDO($dsn,$uname,$pass);
	}

	catch(PDOException $err)
	{
		echo '<h3>DB ERROR</h3>';
		echo $err->getMessage();
		exit();
	}
	catch(Exception $err)
	{
		echo 'Generic Error: ' . $err->getMessage();
		exit();
	}

	$query='SELECT * FROM accounts WHERE id<6';
	$st=$db->prepare($query);
	//$st->bindValue(':ownerid',2);
	$st->execute();
	$rows=$st->fetchAll();
	$st->closeCursor();

	echo '<br><h3 style=text-align:center>Connected Successfully</h3><br>';
	
	echo '<h3>Now showing '.count($rows).' items from query</h3><br>';
	//print_r($rows)	
	echo '<table><tr><th>ID</th><th>fname</th><th>lname</th></tr>';
	foreach($rows as $user)
	{
		echo '<tr><td>'.$user['id'].'</td><td>'.$user['fname'].'</td><td>'.$user['lname'].'</td></tr>';
	}
	echo '</table>';
?>
