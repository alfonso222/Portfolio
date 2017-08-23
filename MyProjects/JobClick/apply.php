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
	
	$query = mysqli_query($connection,"SELECT * FROM users WHERE id='".$_SESSION['user_id']."'");		
	$user_row = mysqli_fetch_assoc($query);
	
	$query2 = mysqli_query($connection,"SELECT * FROM posts WHERE id='".$_SESSION['currentPost']."'");		
	$post_row = mysqli_fetch_assoc($query2);
	
	$query3 = mysqli_query($connection,"SELECT * FROM users WHERE username='".$post_row['username']."'");		
	$user2_row = mysqli_fetch_assoc($query3);
	
	
	
	$to = "".$user2_row['email']."";
	$subject = "Application for (".$post_row['title'].")";
	$msg = "".$user_row['firstname']." ".$user_row['lastname']." Has applied to your job post. Contact user at phone number: ".$user_row['phonenumber']." or email: ".$user_row['email']."";
	$from = "".$user_row['email']."";

	if(mail($to,$subject,$msg,$from))
	{
		header("Location: post.php");
		exit();
	}

	// Closes connection to MySQL
	$connection->close();

?>