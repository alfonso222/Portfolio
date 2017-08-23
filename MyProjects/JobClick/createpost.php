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
	<link rel = "stylesheet" type = "text/css" href = "createpost.css">
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
		<br><br><br>
		<center>
			
			<div id='createpost'>
					<form method="get" action="submitpost.php" name="createpostform" >
						<br>Title of Post<br>
						<input type='text' name='title' size='40' id='container' required><br><br>
						
						Category of Job <br>
						<input list="jobs" type="search" size="40" name="category" placeholder="Search Job Category" / id="container" required>							
						<datalist id="jobs">		
						<?php					
							$myfile = fopen("jobcategories.txt", "r") or die("Unable to open file!");		
							while(!feof($myfile))
							{		
								$job = fgets($myfile);
								$job = trim ($job);
								echo "<option value='".$job."'> </option>";			
							}
							
							fclose($myfile);		
						?>
						</datalist><br>
						
		
						<br>Body<br>
						<textarea name='body' rows='9' cols='80' maxlength='2000' id="container" required></textarea><br><br>
									
						
						<br><input type="submit" onclick="submitCreatePostForm()" value="Submit Post" id ="createpost">
					</form>	
			
			</div>
			<br>
		
		
		
		
		</center>	
	</div>


	

	
	
	<br><br><br><br><br><br><br><br><br><br><br>	
	<div id="footer">
	<hr width="50%">
	<p><font size="2">Job Click &#169; 2016</font></p>
	</div>
	


	
	<script type="text/javascript" src="JobClick.js"></script>
</body>
</html>
















