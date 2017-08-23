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
	<link rel = "stylesheet" type = "text/css" href = "JobClickHome.css">
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
		<br><br><br><br><br>
		
		<center>
			<form method="get" action="JobClickHome.php"> 
				<input list="jobs" type="search" name="category" placeholder="Search Job Posts..." / id="dropdown">		
						
				<datalist id="jobs">		
					<?php					
					$myfile = fopen("jobcategories.txt", "r") or die("Unable to open file!");		
					while(!feof($myfile))
					{		
						$job = fgets($myfile);
						$job = trim ($job);
						echo "<option value='".$job."'>".$job."</option>";			
					}
					
					fclose($myfile);		
					?>
				</datalist>	
				</input>
					
				<input type="submit" value="Search Jobs" id ="search">
			</form>	
			<br	
						
			<?php		
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
			
			if($user_row['usertype'] == "Recruiter")
			{
				echo 
				"
					<br>
					<form method='get' action='createpost.php'>
						<input type='submit' value='Create Job Post' id='createpost'>
					</form>
					<br>
				";
				
			}
			
			
			if (isset($_GET["category"]) && !empty($_GET["category"])) 
			{
				
				$category = $_GET['category'];
				echo " Jobs in - '<u>".$category."'</u>";
		
				$query = mysqli_query($connection,"SELECT * FROM posts WHERE category= '".$category."' ");
				echo "<p style='font-size: 12px;'>".mysqli_num_rows($query)." - results showing</p>";
				
				echo 
				"
					<div id='postheader'>
						<div id='block' style='width:40%;'>Title<br></div>
						<div id='block' style='width:30%;'>Category<br></div>
						<div id='block' style='width:25%;'>Post Date<br></div>
					</div>
				";
				while($post_array = mysqli_fetch_assoc($query))
				{
					echo 
					"
					<div id='results'>
						<div id='block' style='width:40%;'>	
							<form method='get' action ='post.php';>
								<input type='hidden' name='id' value='".$post_array["id"]."'>
								<input type='submit'  value='".$post_array["title"]."' id='submitbutton'>
							</form>
						</div>
						
						
						<div id='block' style='width:30%;'>".$post_array["category"]."<br><br></div>
						<div id='block' style='width:25%;'>".$post_array["date"]."<br><br></div>
					</div>
					
					";
				}
				
				// Closes connection to MySQL
				$connection->close();
			}
			else
			{
				
				echo " All Jobs ";
		
				$query = mysqli_query($connection,"SELECT * FROM posts");
				echo "<p style='font-size: 12px;'>".mysqli_num_rows($query)." - results showing</p>";
				
				echo 
				"
					<div id='postheader'>
						<div id='block' style='width:40%;'>Title<br></div>
						<div id='block' style='width:30%;'>Category<br></div>
						<div id='block' style='width:25%;'>Post Date<br></div>
					</div>
				";
				while($post_array = mysqli_fetch_assoc($query))
				{
					echo 
					"
					<div id='results'>
						<div id='block' style='width:40%;'>	
							<form method='get' action ='post.php';>
								<input type='hidden' name='id' value='".$post_array["id"]."'>
								<input type='submit'  value='".$post_array["title"]."' id='submitbutton'>
							</form>
						</div>
						
						
						<div id='block' style='width:30%;'>".$post_array["category"]."<br><br></div>
						<div id='block' style='width:25%;'>".$post_array["date"]."<br><br></div>
					</div>
					
					";
				}
				
				// Closes connection to MySQL
				$connection->close();
			}
				
			
			
		?>
		<br>
			
			
		</center>

	
	</div>


	
	<br><br><br><br><br><br><br><br><br><br><br>	
	<div id="footer">
	<hr width="50%">
	<p><font size="2">Job Click &#169; 2016</font></p>
	</div>
	
	
	
	
</body>
</html>










