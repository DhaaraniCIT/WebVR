 <?php
	include 'session.php';
?>

<!doctype html>
<html class="no-js " lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<title>Explore</title>
 	<link rel="stylesheet" href="style.css">
 	<style type="text/css">
 		#aframe
 		{
 			display: none;
 		}
 		.card,.col-sm-6{
 			padding-bottom: 10px;
 		}
 		img
 		{
 			width: 200px;
 			height: 200px;
 		}
 	</style>
 	<meta name="description" content="360&deg; Image Gallery - A-Frame">
    <script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-event-set-component@5/dist/aframe-event-set-component.min.js"></script>
    <script src="https://unpkg.com/aframe-layout-component@5.3.0/dist/aframe-layout-component.min.js"></script>
    <script src="https://unpkg.com/aframe-template-component@3.2.1/dist/aframe-template-component.min.js"></script>
    <script src="https://unpkg.com/aframe-proxy-event-component@2.1.0/dist/aframe-proxy-event-component.min.js"></script>
    <script type="text/javascript">
    	function image_id(image)
    	{
    		var imageid=1;
    		document.getElementById("answer").value= imageid;
    	}
    </script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">ScaleVR</a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="Upload.php">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>
	<div class="container">	
		<h1 class="text-center display-4">Explore Images</h1>
		<h1 class="text-center display-2"><?= $name; ?></h1>
		<h1 class="text-center display-4">Images</h1>
		<div>Here's the image from the database:</div>
		<div class="row" id="hide">
 			<?php
 				$query = "SELECT Image,Upvote,Downvote,ImageID FROM images";
 				$result = mysqli_query($conn,$query);
 				while ($row = mysqli_fetch_array($result)) 
 				{
 					$images=$row['ImageID'];
 					echo '<div class="col-sm-6" >
 						<div class="card"><a href="Aframe.php">
 						<img src="data:image/jpeg;base64, '.base64_encode($row['Image']).'" style=" width:100%;"  onclick="image_id($images)"/></a>
 						<div class="container">
 							'.$row['Upvote'].'<i class="fa fa-thumbs-up" style="font-size:36px"></i>
 							'.$row['Downvote'].'<i class="fa fa-thumbs-down" style="font-size:36px"></i>
 							<form method="POST">
 								<input type="submit" name="upvote"
                class="btn btn-outline-info btn-lg" value="Upvote" /> 
          
        						<input type="submit" name="downvote"
                class="btn btn-outline-info btn-lg" value="Downvote" /> 
 							</form>
  						</div>
  					</div>
  					</div>';
 				}

 			?>	
		</div>
	</div>
<script  src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$('#click').click(function(){
				$('#hide').hide();
				$('#aframe').show();
			});
	});
</script>
</body>
</html>