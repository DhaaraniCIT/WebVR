 <?php
  include 'session.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>360&deg; Image</title>
    <meta name="description" content="360&deg; Image - A-Frame">
   <script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script>
  </head>
  <body>
    <a-scene>
  <a-assets>
      <img id="my-image" src="1.jfif" style=" width:100%;" /></a>
  </a-assets>

  <!-- Using the asset management system. -->
  <a-sky src="#my-image"></a-sky>

  <!-- Defining the URL inline. Not recommended but more comfortable for web developers. -->
  
</a-scene>
  </body>
</html>