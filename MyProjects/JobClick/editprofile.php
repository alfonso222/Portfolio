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
	<link rel = "stylesheet" type = "text/css" href = "editprofile.css">
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
	<br>
	<div id='container'>
	
		<?php
			// Connects to MySQL
			$connection = new mysqli("localhost", "alfonso222", "Ragnorok2", "jobclickdb");
					
			// Checks if we connected
			if(mysqli_connect_errno())
			{
				echo mysqli_connect_error();
				exit();
			}
					
			//Gets user database row by session id  ZHI
			$query = mysqli_query($connection,"SELECT * FROM users WHERE id='".$_SESSION['user_id']."'");		
			$user_row = mysqli_fetch_assoc($query);
		
			
			
			// Displays all the edit profile options (html included)
			echo
			"	
					<br>
					<h2>Edit Profile</h2>
					<hr width='70%'>	
					
					Profile Picture/ Avatar<br>
					<div id='imagecontainer'>
						<form action='upload.php' name='uploadpictureform' method='post' enctype='multipart/form-data' id='uploadpictureform'>
							<input type='file' name='fileToUpload' id='fileToUpload' class='inputfile'>
							<input type='submit' value='Upload Image' name='submit' id='edit'>
						</form>
					</div><br>
					
					Upload Resume<br>
					<div id='imagecontainer'>
						<input type='button' onclick='' value='Upload Resume' id ='edit'><br>
					</div><br>
				
					<form name='editprofileform' method='post' action='profile.php'>			
														
						First Name<br>
						<input type='text' name='firstname' size='10' id='container' value=".$user_row["firstname"]."><br><br>
						
						Last Name<br>
						<input type='text' name='lastname' size='10' id='container' value=".$user_row["lastname"]."><br><br>
								
						Email Address<br>
						<input type='email' name='email' size='30' maxLength='40' placeholder='name@domain.com' id='container' value=".$user_row["email"]." ><br><br>
						
						Phone Number<br>
						<input type='number' name='phonenumber' size='20' id='container' value=".$user_row["phonenumber"]."><br><br>
								
						Date of birth<br>
						<input type='date' name='dob' size='20' maxLength='20' id='container' value=".$user_row["dob"]."><br><br>		
						
						About Me<br>
						<textarea name='aboutme' rows='6' cols='50' maxlength='500' id='container'>".$user_row["aboutme"]."</textarea><br><br>
									
						Skills<br>
						<textarea name='skills' rows='6' cols='50' maxlength='500' id='container'>".$user_row["skills"]." </textarea><br><br>
						
						<input type='button' onclick='submitEditProfile()' value='Save Changes' id ='edit'><br><br>
						
						
					</form>						
					
					
					
				
			";	
			
			// Closes connection to MySQL
			$connection->close();	
		?>
		
		
		
		</div>
		<br>
	</div>

	
	

	
	
	<br><br><br><br><br><br><br><br><br><br><br>	
	<div id="footer">
	<hr width="50%">
	<p><font size="2">Job Click &#169; 2016</font></p>
	</div>

	
	
</body>
</html>