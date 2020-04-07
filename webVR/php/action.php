<?php
	require('config.php');
	if(isset($_POST['action']) && $_POST['action']=='register')
	{
		$name=check_input($_POST['name']);
		$uname=check_input($_POST['uname']);
		$email=check_input($_POST['email']);
		$password=check_input($_POST['password']);
		$cpassword=check_input($_POST['cpassword']);
		$password=sha1($password);
		$cpassword=sha1($cpassword);
		$created=date('d-m-y');
		if($password!=$cpassword)
		{
			echo 'Password did not match';
			exit();
		}
		else
		{
			$sql=$conn->prepare("SELECT username,email FROM users WHERE username=? OR email=?");
			$sql->bind_param("ss",$uname,$email);
			$sql->execute();
			$result=$sql->get_result();
			$row=$result->fetch_array(MYSQLI_ASSOC);
		
			if($row['username']==$uname)
			{
				echo"Username already present,try differently";
			}
			elseif($row['email']==$email)
			{
				echo"Email already present,try differently";
			}
			else
			{
				$stmt=$conn->prepare("INSERT INTO users (name, username, email, pass, date) VALUES (?, ?, ?, ?, ?)");
				$stmt->bind_param("sssss",$name,$uname,$email,$password,$created);
				if($stmt->execute())
				{
					echo"registered successfully,Login now";
				}
				else
				{
					echo"somthing is wrong,try again";
				}			
			}
		}
		if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'username'          =>     $_POST["uname"],  
                     'password'     =>     $_POST["password"],
                     'email'       =>      $_POST['email']
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     //$message = "<label class='text-success'>File Appended Success fully</p>"; 
                     echo " ,data entered into json file and DB"; 
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
	}
	
	if(isset($_POST['action']) && $_POST['action']=='login')
	{
		session_start();

		$username=$_POST['username'];
		$password=$_POST['password'];
		$password=sha1($password);
		$password=substr($password,0,-10);
		$sql=$conn->prepare("SELECT * FROM users WHERE username='$username' AND pass='$password'  ");
			//$sql->bind_param("ss",$uname,$password);
			$sql->execute();
			$result=$sql->get_result();
			$row=$result->fetch_array(MYSQLI_ASSOC);
			if($row['username']==$username)
			{
				$_SESSION['username']=$username;
				echo"ok";
				if(!empty($_POST['rem']))
				{
					setcookie("username",$_POST['username'],time()+(10*365*24*60*60));
					setcookie("password",$_POST['password'],time()+(10*365*24*60*60));		
				}
				else
				{
					if(isset($_COOKIE['username']))
					{
						setcookie("username","");
					}
					if(isset($_COOKIE['password']))
					{
						setcookie("password","");
					}
				}
			}	
			else
			{
				echo"login failed";
			}
	}
	
	if(isset($_POST['action']) && $_POST['action']=='forget')
	{
		$fmail = $_POST['femail'];
		$sql=$conn->prepare("SELECT id FROM users WHERE email='$fmail'");
			//$sql->bind_param("ss",$uname,$password);
			$sql->execute();
			$result=$sql->get_result();

			if($result->num_rows>0)
			{
				$token="abcdefghijklmnoopqrstuvwxyz1234567890";
				$token=str_shuffle($token);
				$token=substr($token, 0,10);

				$stmt=$conn->query("update users set token='$token' token-end=DATA_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email= '$fmail' ");

				require 'PHPMailer-master/src/PHPMailer.php';
				require 'PHPMailer-master/src/OAuth.php';
				require 'PHPMailer-master/src/Exception.php';
				require 'PHPMailer-master/src/POP3.php';
				require 'PHPMailer-master/src/SMTP.php';
				require_once "PHPMailer-master/src/PHPMailerAutoload.php";
				$mail = new PHPMailer\PHPMailer\PHPMailer();
				$mail->Host='smtp.gmail.com';
				$mail->Port=587;
				$mail->isSMTP();
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='tls';
				$mail->Username='dhaaranieaswari@gmail.com';
				$mail->Password='password';
				$mail->addAddress($fmail);
				$mail->setFrom('dhaaranieaswari@gmail.com','Dhaarani');
				$mail->Subject='Reset Password';
				$mail->isHTML(true);
				$mail->Body="<h3>Click the below link to reset your password</h3><br><a href='http://localhost/guvi_developer/resetPassword.php?email=$fmail&token=$token'>http://localhost/guvi_developer/resetPassword.php?email=$fmail&token=$token</a><br><h3>Regards<br>Guvi</h3>";

				if($mail->send())
				{
					echo "We have send you a reset link to your Email ID , please check your Email.";
				}
				else
				{
					echo "Something went wrong, please try again!.";
				}
			}
	}
	
	function check_input($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>