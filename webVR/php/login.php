<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		header("location:home.php");
	}
?>
<!doctype html>
<html class="no-js " lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<title>login</title>
 	<link rel="stylesheet" href="style.css">
 	<style>
		#alert,#register-box,#reset-box
		{
			display:none;
		}
		
	</style>
</head>
<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col-lg-4 offset-lg-4" id="alert">
				<div class="alert alert-success">
					<strong id="result">
					</strong>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounderd" id="login-box">
				<h2 class="text-center mt-2">Login</h2>
				<form action="" method="post" role="form" class="p-2" id="login-form">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username" required minlength="2" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="password" required minlength="8" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="rem" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['username'])){ ?> checked <?php } ?>> 
						<label for="customCheck" class="custom-control-label">Remember Me</label>
						<a href="#" id="forget-btn" class="float-right">Forget Password</a> 
					</div>
					<div class="form-group">
						<input type="submit" name="login" id="login" value="login" class="p-10 btn btn-primary btn-block">
					</div>
					<div class="form-group">
						<p class="text-center">New User?<a href="#" id="register-btn">Register Here</a></p>
					</div>
				</form>				
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounderd" id="register-box">
				<h2 class="text-center mt-2">Register</h2>
				<form action="" method="post" role="form" class="p-2" id="register-form">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="name" required>
					</div>
					<div class="form-group">
						<input type="text" name="uname" class="form-control" placeholder="Username" required minlength="2">
					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="E-mail-id" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" id="Pass" class="form-control" placeholder="Password" required minlength="8">
					</div>
					<div class="form-group">
						<input type="password" name="cpassword" id="Cpass" class="form-control" placeholder="Conform-Password" required minlength="8">
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
							<label for="customCheck2" class="custom-control-label">I agree to the <a href="#">Terms and Conditions.</a></label>
						</div>	 
					</div>
					<div class="form-group">
						<input type="submit" name="register" id="register" value="register" class="p-10 btn btn-primary btn-block">
					</div>
					<div class="form-group">
						<p class="text-center">Already Register?<a href="#" id="login-btn">login Here</a></p>
					</div>
				</form>				
			</div>
		</div>	
		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounderd" id="reset-box">
				<h2 class="text-center mt-2">Reset Password</h2>
				<form action="" method="post" role="form" class="p-2" id="forget-form">
					<div class="form-group">
						<small class="text-muted" >
						To Reset ur Password enter your email we will send you the new pasasword
						</small>
					</div>
					<div class="form-group">
						<input type="email" name="femail" class="form-control" placeholder="email" required>
					</div>
					<div class="form-group">
						<input type="submit" name="forget" id="forget" value="reset" class="p-10 btn btn-primary btn-block">
					</div>
					<div class="form-group text-center">
						<a href="#" id="back-btn">back</a>
					</div>
				</form>
			</div>
        </div>			
	</div>	
	<script  src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$('#forget-btn').click(function(){
				$('#login-box').hide();
				$('#reset-box').show();
			});
		
			$('#register-btn').click(function(){
				$('#login-box').hide();
				$('#register-box').show();
			});
		
			$('#login-btn').click(function(){
				$('#reset-box').hide();
				$('#login-box').show();
				$('#register-box').hide();
			});
			
			$('#back-btn').click(function(){
				$('#reset-box').hide();
				$('#login-box').show();
			});
			
			$('#login-form').validate();
			
			$('#register-form').validate({
				rules:{
					Cpass:{
						equalTo:"#Pass",
					}
				}
			});
			$('#forget-form').validate();
			$('#register').click(function(e){
				if(document.getElementById('register-form').checkValidity()){
				e.preventDefault();
				$.ajax({
					url:'action.php',
					method:'post',
					data:$("#register-form").serialize()+'&action=register',
					success:function(response){
						$("#alert").show();
						$("#result").html(response);
					}
				});
				}
				return true;
			});
			$('#login').click(function(e){
				if(document.getElementById('login-form').checkValidity()){
				e.preventDefault();
				$.ajax({
					url:'action.php',
					method:'post',
					data:$("#login-form").serialize()+'&action=login',
					success:function(response){
						if(response==="ok")
						{
							window.location='home.php'; 
						}
						else
						{	
							$("#alert").show();
							$("#result").html(response);
						}
					}
				});
				}
				return true;
			});
			$('#forget').click(function(e){
				if(document.getElementById('forget-form').checkValidity()){
				e.preventDefault();
				$.ajax({
					url:'action.php',
					method:'post',
					data:$("#forget-form").serialize()+'&action=forget',
					success:function(response){
						$("#alert").show();
						$("#result").html(response);
					}
				});
				}
				return true;
			});
		});
	</script>
</body>
</html>