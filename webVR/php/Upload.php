<?php
	include 'session.php'
?>

<!doctype html>
<html class="no-js " lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<title>Upload</title>
 	<link rel="stylesheet" href="style.css">
 	<style type="text/css">
 		#alert
 		{
 			display: none;
 		}
 	</style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">ScaleVR</a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="Explore.php">Explore</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>
	<div class="container">	
		<h1 class="text-center display-4">Upload Images</h1>
		<h1 class="text-center display-2"><?= $name; ?></h1>
		<form action="" method="post" role="form" id="register-form" enctype="multipart/form-data">
  			<h1 class="display-5">Select a file:</h1>
  			<input type="file" id="image" name="image"><br><br>
  			<input type="Submit" class="btn btn-outline-info btn-lg" name="register" id="register" value="Upload">
		</form>
	</div>
<script  src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$('#register-form').validate();
		$('#register').click(function(){
				var image=$('#image').val();
				if(image == '')
				{
					alert("Please select Image");
				}
				else
				{
					var extension = $('#image').val().split('.').pop().toLowerCase();
					if(jQuery.inArray(extension, ['gif','jpg','png','jpeg','jfif'])==-1)
					{
						alert("Invalid image file");
						$('#image').val('');
						return false;
					}
				}
			});
	});
</script>
</body>
</html>