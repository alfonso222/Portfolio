<?php   
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location: JobClick.html");
		exit();
	} 
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Sniglet">
	<link rel = "stylesheet" type = "text/css" href = "profile.css">
	<script type="text/javascript" src="JobClickScripts.js"></script>
	
	
	
</head>
<body>
	
	<div id="header">	
		<img id="logo" src="JobClickLogo.png">	
		
		<div id="navmenu">			
			<span><form  method="get" action="JobClickHome.php">		
				<input type="submit" value="Home">
			</form>	</span>
			
			<span><form  method="get" action="profile.php">		
				<input type="submit" value="Profile">
			</form>	</span>	
			
			<span><form  method="get" action="logout.php">			
				<input type="submit" value="Logout">
			</form>	</span>				
		</div>	
	</div>
	
	<br>
	
	<div id="main">		
		<?php
			$userPictureLink = 'defaultuser.png';
			
			
			// Connects to MySQL
			$connection = new mysqli("localhost", "alfonso222", "Ragnorok2", "jobclickdb");
					
			// Checks if we connected
			if(mysqli_connect_errno())
			{
				echo mysqli_connect_error();
				exit();
			}
			
			
			//Gets user database row by session id number
			$query = mysqli_query($connection,"SELECT * FROM users WHERE id='".$_SESSION['user_id']."'");		
			$user_row = mysqli_fetch_assoc($query);
			
			// Updates profile information with the form submited in edit profile page
			if(isset($_POST['firstname'])) //zhi
			{
				$sql = "UPDATE users SET firstname = '".$_POST['firstname']."' WHERE id = ".$user_row ["id"];
				$query = mysqli_query($connection,$sql);
				if($query)
				{
					$user_row ["firstname"] = $_POST['firstname'];
				}
			}
			if(isset($_POST['lastname'])) 
			{
				$sql = "UPDATE users SET lastname = '".$_POST['lastname']."' WHERE id = ".$user_row ["id"];
				$query = mysqli_query($connection,$sql);
				if($query)
				{
					$user_row ["lastname"] = $_POST['lastname'];
				}
			}
			if(isset($_POST['email'])) 
			{
				$sql = "UPDATE users SET email = '".$_POST['email']."' WHERE id = ".$user_row ["id"];
				$query = mysqli_query($connection,$sql);
				if($query)
				{
					$user_row ["email"] = $_POST['email'];
				}
			}
			if(isset($_POST['phonenumber']))
			{
				$sql = "UPDATE users SET phonenumber = '".$_POST['phonenumber']."' WHERE id = ".$user_row ["id"];
				$query = mysqli_query($connection,$sql);
				if($query)
				{
					$user_row ["phonenumber"] = $_POST['phonenumber'];
				}
			}
			if(isset($_POST['dob']))
			{						
				// calculates age by date of birth
				$dob = $_POST['dob'];
				$date = new DateTime($dob);
				$now = new DateTime('today');
				$interval = $now->diff($date);	
				$sql2 = "UPDATE users SET age = '".$interval->y."' WHERE id = ".$user_row ["id"];
				$sql = "UPDATE users SET dob = '".$_POST['dob']."' WHERE id = ".$user_row ["id"];
			
				$query = mysqli_query($connection,$sql);
				if($query)
				{
					$user_row ["dob"] = $_POST['dob'];				
				}
				$query = mysqli_query($connection,$sql2);
				if($query)
				{
					$user_row ["age"] = $interval->y;			
				}
				
			}
			if(isset($_POST['aboutme']))
			{
				$stmt = $connection->prepare("UPDATE users SET aboutme = ? WHERE id = ?");
				$stmt->bind_param('si', $_POST['aboutme'], $_SESSION['user_id']);
				if($stmt->execute())
				{
					$user_row ["aboutme"] = $_POST['aboutme'];
				}
			}
			if(isset($_POST['skills']))
			{
				$stmt = $connection->prepare("UPDATE users SET skills = ? WHERE id = ?");
				$stmt->bind_param('si', $_POST['skills'], $_SESSION['user_id']);
				if($stmt->execute())
				{
					$user_row ["skills"] = $_POST['skills'];
				}
			}
			
			
			//Displays profile info from database
			echo "<br><div id='profile'> <h2> ".$user_row ["firstname"]." ".$user_row ["lastname"]." </h2>	
			<img src='".$user_row ["imageurl"]."' id = 'profilepic'>
				<div id ='container'>
					<b>Email -</b> ".$user_row ["email"]." <br>
					<b>Phone Number -</b> ".$user_row ["phonenumber"]." <br>
					<b>Age -</b> ".$user_row ["age"]." <br>
					<b>Date of Birth -</b> ".$user_row ["dob"]." <br>
					<b>Account Type -</b> ".$user_row ["usertype"]." <br>
				</div><br>		

				<b>About Me</b>
				<div id='container2'>
					".$user_row ["aboutme"]."
				</div><br>
				
				<b>Skills</b>
				<div id='container2'>
					".$user_row ["skills"]."
				</div> <br>				
			</div><br>";			
			
			// Closes connection to MySQL
			$connection->close();
		?>
		
		<form  method="post" action="editprofile.php">			
			<input type="submit" value="Edit Profile" id ="edit">
		</form>	
		<br>
	</div>

	
	

	
	
	<br><br><br><br><br><br><br><br><br><br><br>	
	<div id="footer">
	<hr width="50%">
	<p><font size="2">Job Click &#169; 2016</font></p>
	</div>

</body>
</html>