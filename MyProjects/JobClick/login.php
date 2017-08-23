
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Sniglet">
	<link rel = "stylesheet" type = "text/css" href = "login.css">
	<script type="text/javascript" src="JobClickScripts.js"></script>
	
</head>
<body>
	
	
	<br><br><br><br>
	<div id="main">
		<?php
			if(!isset($_POST['username']))
			{
				header("Location: JobClick.html");
				exit();
			} 
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$errorPictureLink = 'error.png';
			$checkPictureLink = 'check.png';
			$login_address = 'http://localhost/JobClick.html';
			$createAccount_address = 'http://localhost/CreateAccountPage.html';
			
			
			// Connects to MySQL
			$connection = new mysqli("localhost", "alfonso222", "Ragnorok2", "jobclickdb");
			
			// Checks if we connected
			if(mysqli_connect_errno())
			{
				echo mysqli_connect_error();
				exit();
			}
			
			// Checks if username is in database
			$query = mysqli_query($connection,"SELECT * FROM users WHERE username='".$username."'");		
			$user_row = mysqli_fetch_assoc($query);
			$user_id = $user_row ["id"];
			if (mysqli_num_rows($query) != 0)
			{
				if($user_row["password"] == $password)		
				{				
					// Starts a session with the user id of this account
					session_start();
					$_SESSION['user_id'] = $user_id;
					header("Location:JobClickHome.php");
				}			
				else
				{
					echo "<img src='".$errorPictureLink."'>Incorrect password for username:  <u>".$username."</u><br><br>";
				}
			}
			else
			{
				echo "<img src='".$errorPictureLink."'>Invalid username<br><br>";
			}
			
			
			// Closes connection to MySQL
			$connection->close();
		?>	
		
		<button onclick="history.go(-1);" id="back"> Back </button>
		<br><br>
	</div>

	
	<br><br><br><br><br><br><br><br><br><br><br>	
	<div id="footer">
	<hr width="50%">
	<p><font size="2">Job Click &#169; 2016</font></p>
	</div>

</body>
</html>



