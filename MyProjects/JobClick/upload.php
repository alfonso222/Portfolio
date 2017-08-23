<?php
session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
/*/ Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
	else
{
*/	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	{
			
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
		
		$sql = "UPDATE users SET imageurl = '".$target_file."' WHERE id = ".$user_row ["id"]."";
			
				// checks if value worked and updates database
				if($connection->query($sql) == TRUE) 
				{
					header("Location: profile.php");
					exit();				
				} 
				else 
				{
					echo "<br>Error: " . $sql . "<br>" . $connection->error;
				}
		
		
		// Closes connection to MySQL
		$connection->close();
		
		
    } 
	else
	{
        echo "Sorry, there was an error uploading your file.";
    }

?>