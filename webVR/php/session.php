<?php
	session_start();
	require 'config.php';

	$user=$_SESSION['username'];
	$sql=$conn->prepare("SELECT * FROM users WHERE username='$user'   ");
			$sql->execute();
			$result=$sql->get_result();
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$username=$row['username'];
			$name=$row['name'];
			$email=$row['email'];
			$created=$row['date'];
			$id=$row['id'];

			if(!isset($user))
			{
				header("location:login.php");
			}
	if(isset($_POST["register"]))
	{
		$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		$query = "INSERT INTO images(UserID,image) VALUES ('$id','$file')";
		if(mysqli_query($conn,$query))
		{
			echo '<script>alert("Image Uploades Successfully")</script>';
		}
	}
	if(array_key_exists('upvote', $_POST))
	{
		$query= "UPDATE images SET Upvote = Upvote+1";
		if(mysqli_query($conn,$query))
		{
			echo '<script>alert("you have upvoteed")</script>';
		}
	}
	if(array_key_exists('downvote', $_POST))
	{
		$query= "UPDATE images SET Downvote = Downvote+1 WHERE ";
		if(mysqli_query($conn,$query))
		{
			echo '<script>alert("you have downvoteed")</script>';
		}
	}
	
?>