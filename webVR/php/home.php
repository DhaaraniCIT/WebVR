<?php
	include 'session.php'
?>

<!doctype html>
<html class="no-js " lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<title>Home</title>
 	<link rel="stylesheet" href="style.css">
 	<style type="text/css">
 		#alert
 		{
 			display: none;
 		}
    a
    {
      color: #39cfca;
    }
    a:hover
    {
      color: white;
      text-decoration-line: none;
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
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>

</nav>
<div class="container">
		<h1 class="text-center display-4">Welcome</h1>
		<h1 class="text-center display-2"><?= $name; ?></h1>
		<h1 class="text-center display-5">You are in Our Home page </h1>
		<h1 class="text-center display-5">Thank you <?= $name; ?> for logging in here :)</h1><br>
		<h1 class="text-center display-5">You can</h1>
    <div class="row">
			<div class="col-sm-6" >
        <center>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Upload</h5>
              <p class="card-text">You can Upload Panorama images by clicking the "Upload" button below</p>
              <button type="button" class="btn btn-outline-info btn-lg"><a href="Upload.php" >Upload</a></button>
            </div>
          </div>
        </center>
      </div>
      <div class="col-sm-6">
        <center>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Explore</h5>
              <p class="card-text">You can Explore the images uploaded by clicking the "Explore" button below</p>
              <button type="button" class="btn btn-outline-info btn-lg"><a href="explore.php">Explore</a></button>
            </div>
          </div>
        </center>
      </div>
		</div>
  </div>
</body>
</html>