	<?php
		session_start();
	
		if(!isset($_SESSION['user_id']))
		{
			header("Location: JobClick.html");
			exit();
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
		$query = mysqli_query($connection,"SELECT * FROM users WHERE id='".$_SESSION['user_id']."'");		
		$user_row = mysqli_fetch_assoc($query);
		
		if($user_row['usertype'] == "Recruiter")
		{
			// Submits Post 
				
				
							
			$sql = "INSERT INTO posts (username, title, date, category, body, imageurl) 
			VALUES('".$user_row['username']."',
			'".$_GET['title']."',
			'".date("Y-m-d H:i:s")."', 
			'".$_GET['category']."', 
			'".$_GET['body']."',
			'".$user_row['imageurl']."'
			)";
					
			// checks to see if insertion was successful and inserts data
			if ($connection->query($sql) === TRUE) 
			{		
				header("Location: JobClickHome.php");
				exit();
			} 
			else 	
			{
				echo "Error: " . $sql . "<br>" . $connection->error;
			}
					
				
				
			// Closes connection to MySQL
			$connection->close();
		}
		else
		{
			header("Location: JobClickHome.php");
			exit();
		}
	?>


