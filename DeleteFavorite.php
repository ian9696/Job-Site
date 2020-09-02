<?php

	session_start();

	require("accessDB.php");

	if(isset($_SESSION['login_as']) && $_SESSION['login_as']=="user" && isset($_POST['jobID']))
	{
		$db = connectToDB();
		$sql= "DELETE FROM favorite WHERE user_id=? AND recruit_id=?";
		$sth = $db->prepare($sql);
		$sth->execute(array($_SESSION['id'], $_POST['jobID']));

		header('Location: FavoriteList.php');
	}
	
	echo "invalid access!<br>";
	
	echo '<a href="HomePage.php"><input type="button" value="Back to Home Page" /></a><br>';
?>