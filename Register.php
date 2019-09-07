<?php
	include_once("../conn.php");
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{	$Email = $_POST['email'];
			$Pass  = $_POST['passWord'];
			$c_pass= $_POST['Con_passWord'];
		if( $_POST['email'] == "" || $_POST['passWord'] == "")
		{
			$_SESSION['login_Empty'] = true;
			header("Location: registe.php");
		}
		else if($_POST['passWord'] != $_POST['Con_passWord'])
		{
			$_SESSION['pass_wrong'] = true;
			header("Location: registe.php");
		}
		//checking email it already taken
		else
		{
			//creating database table connection
			$login_user = "INSERT INTO `user_login`(`User_Email`, `User_Password`) VALUES ('$Email','$Pass')";
			$result = mysqli_query($conn,$login_user);
			if($result){
				$_SESSION['success'] = true;
				header("Location: registe.php");
			}
		}
	}

?>
