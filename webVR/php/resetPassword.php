<?php
	require 'config.php'
	$msg='';
	if(isset($_GET['email'])&& isset($_GET['token']))
	{
		$email=$_GET['email'];
		$token=$_GET['token'];

		$sql=$conn->prepare("SELECT id FROM users WHERE email='$email'AND token='$token' AND token<>'' AND token-end>NOW() ");
			//$sql->bind_param("ss",$uname,$password);
			$sql->execute();
			$result=$sql->get_result();

			if(result->num_rows>0)
			{
				if(isset($_POST['submit']))
				{
					$newpass=sha1($_POST['Npassword']);
					$cpass=sha1($_POST['Cpassword']);

					if($newpass == $cpass)
					{
						$stmt=$conn->query("update users set token='' , pass='$newpass' WHERE email='$email' ");
						if($stmt)
						{
							$msg"Password Changed successfully!<br><a href='login.php'>Login here</a>";
						}
						else
						{
							$msg"somthing is wrong,try again";
						}
					}
					else
					{
						$msg"password did not match";
					}
				}
			}
			else
			{
				header("location:login.php");
				exit();
			}
	}
?>

<!doctype html>
<html class="no-js " lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<title>Reset Password</title>
 	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">	
	<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounderd" id="reset-box">
				<h3 text-success text-center><?= $msg; ?></h3>
				<h2 class="text-center mt-2">Reset Password</h2>
				<form action="" method="post" role="form" class="p-2" id="reset-form">
					<div class="form-group">
						<input type="Npassword" name="Npassword" class="form-control" placeholder="New Password" required>
					</div>
					<div class="form-group">
						<input type="password" name="Cpassword" class="form-control" placeholder="Conform Password" required >
					</div>
					<div class="form-group">
						<input type="submit" name="reset" id="reset" value="reset Password" class="p-10 btn btn-primary btn-block">
					</div>
				</form>				
			</div>
		</div>
	</div>
</body>
</html>
		