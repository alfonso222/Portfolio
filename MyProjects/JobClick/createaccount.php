<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Sniglet">
	<link rel = "stylesheet" type = "text/css" href = "createaccount.css">
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
			$email = $_POST['email'];
			$phoneNum = $_POST['phonenum'];	
			$firstname = $_POST['firstname'];	
			$lastname = $_POST['lastname'];	
			$accountType = 'nothing';
			$errorPictureLink = 'error.png';
			$checkPictureLink = 'check.png';
			$login_address = 'JobClick.html';
			$createAccount_address = 'CreateAccountPage.html';
			$defaultPicture_address = 'uploads/default.png';
			
			// Connects to MySQL
			$connection = new mysqli("localhost", "alfonso222", "Ragnorok2", "jobclickdb");
			
			// Checks if we connected
			if(mysqli_connect_errno())
			{
				echo mysqli_connect_error();
				exit();
			}
					
			// Checks if username is in database		
			$query = mysqli_query($connection,"SELECT username FROM users WHERE username='".$username."'");	
			$query2 = mysqli_query($connection,"SELECT email FROM users WHERE email='".$email."'");
			if (mysqli_num_rows($query) != 0)
			{
				echo "<img src='".$errorPictureLink."'>There is already an existing account with username:  <u>".$username."<hr></u><br>";
				
			}
			else if (mysqli_num_rows($query2) != 0)
			{
				echo "<img src='".$errorPictureLink."'>An account is already registered with email:  <u>".$email."</u><hr><br>";		
			}
			else // Else Insert all data into database
			{		
				$accountType = $_POST['account'];			
				$sql = "INSERT INTO users (username, password, email, phonenumber, usertype, firstname, lastname, imageurl) 
				VALUES('{$connection->real_escape_string($username)}', 
				'{$connection->real_escape_string($password)}',
				'{$connection->real_escape_string($email)}',
				'{$connection->real_escape_string($phoneNum)}',
				'{$connection->real_escape_string($accountType)}',
				'{$connection->real_escape_string($firstname)}',
				'{$connection->real_escape_string($lastname)}',
				'{$connection->real_escape_string($defaultPicture_address)}'
				)";
				
				// checks if login worked and actually sets the values in the database
				if($connection->query($sql) == TRUE) 
				{
					echo "<br><img src='".$checkPictureLink."'>Your account has successfully been created!<hr><br>";
					echo "<a href='".$login_address."'> Login </a><br><br>";
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . $connection->error;
				}
				
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



