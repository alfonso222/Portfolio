<?php   
	session_start();
	
			if(!isset($_SESSION['user_id']))
			{
				header("Location: JobClick.html");
				exit();
			} 
			
			// Gets post id that is inserted in the hidden value of the previous page
			if (isset($_GET["id"]))
			{	
				$_SESSION['currentPost'] = $_GET["id"];
			}		
		
			// Connects to MySQL
			$connection = new mysqli("localhost", "alfonso222", "Ragnorok2", "jobclickdb");
					
			// Checks if we connected
			if(mysqli_connect_errno())
			{
				echo mysqli_connect_error();
				exit();
			}
			
			// Gets the post row by its id and user by id
			$query = mysqli_query($connection,"SELECT * FROM posts WHERE id='".$_SESSION['currentPost']."'");		
			$post_row = mysqli_fetch_assoc($query);
			
			$query2 = mysqli_query($connection,"SELECT * FROM users WHERE id='".$_SESSION['user_id']."'");		
			$user_row = mysqli_fetch_assoc($query2);
	
			// Enters comment if it is filled out
			if (isset($_GET["comment"]) && !empty($_GET["comment"]))
			{
						
				$sql = "INSERT INTO comments (username, post_id, body, date, imageurl, usertype) 
				VALUES('".$user_row['username']."',
				'".$post_row['id']."',
				'".$_GET["comment"]."', 
				'".date("Y-m-d H:i:s")."', 
				'".$user_row['imageurl']."',
				'".$user_row['usertype']."'
				)";
				
				// checks to see if insertion was successful and inserts data
				if ($connection->query($sql) === TRUE) 
				{
					
					header("Location: post.php?id=".$_SESSION['currentPost']."");
					exit();
				} 
				else 	
				{
					echo "Error: " . $sql . "<br>" . $connection->error;
				}
				
			}
			
			// Closes connection to MySQL
			$connection->close();
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Sniglet">
	<link rel = "stylesheet" type = "text/css" href = "post.css">
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
		<?php	
			// Gets post id that is inserted in the hidden value of the previous page
			if (isset($_GET["id"]))
			{	
				$_SESSION['currentPost'] = $_GET["id"];
			}		
			//$post_id = $_SESSION['currentPost'];
		
			// Connects to MySQL
			$connection = new mysqli("localhost", "alfonso222", "Ragnorok2", "jobclickdb");
					
			// Checks if we connected
			if(mysqli_connect_errno())
			{
				echo mysqli_connect_error();
				exit();
			}
			
			// Gets the post row by its id and user by id
			$query = mysqli_query($connection,"SELECT * FROM posts WHERE id='".$_SESSION['currentPost']."'");		
			$post_row = mysqli_fetch_assoc($query);
			
			$query2 = mysqli_query($connection,"SELECT * FROM users WHERE id='".$_SESSION['user_id']."'");		
			$user_row = mysqli_fetch_assoc($query2);
						
			echo
			"
				<div id='postheader'>".$post_row['title']."</div>
				<div id='post'>
					<br> ".$post_row['body']." <br><br>
				</div>
				<div id='postfooter'> 
				Posted by: ".$post_row['username']." at ".$post_row['date']."
				</div>
				
						
			";
			
			// If user is worker display apply button
			if($user_row['usertype'] == "Worker")
			{
				echo
				"
					<br>
					<form method='get' action='apply.php' name='emailform'>
						<input type='button' onclick='submitApplyForm()' value='Apply Now' id='apply'>		
					</form>		
					<br>
				";
			}
			
			//echo all comments associated with this post
			$query3 = mysqli_query($connection,"SELECT * FROM comments WHERE post_id= '".$post_row['id']."' ");
			
			while($comment_array = mysqli_fetch_assoc($query3))
			{
				echo
				"
					<div id='commentheader'> 
						 ".$comment_array['username']." <span style='float: right;'>Posted at ".$comment_array['date']."</span>
					</div>
					
					<div id='postedcomment'>
						<div id='photocontainer'> <img src='".$comment_array ["imageurl"]."' id='avatar'><br> 
							".$comment_array['usertype']."
						</div>
						<div id='commenttext'>".$comment_array['body']."</div>	
					</div>	
				";
				
			}
			
			// Closes connection to MySQL
			$connection->close();
					
		?>
		
		<form method="get" action="post.php">
		<textarea name='comment' rows='5' cols='60' maxlength='1000' id='comment' placeholder='comment...'></textarea><br>
		<input type="submit" value="Add Comment" id ="comment">
		</form><br>
		</center>
		
	
	</div>


	

	
	
	<br><br><br><br><br><br><br><br><br><br><br>	
	<div id="footer">
	<hr width="50%">
	<p><font size="2">Job Click &#169; 2016</font></p>
	</div>
	
	
	
</body>
</html>
















