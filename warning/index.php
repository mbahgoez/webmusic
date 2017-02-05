<?php 
include "../app/start.php";
include "../app/DB.php";

print_r($_SERVER);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Form Admin</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body id="admin">

<nav class="navbar navbar-default" style="background: #fff">
  <div class="container-fluid">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?php echo baseurl("warning"); ?>">Admin MusicFeel.ga</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="index.php">Home</a></li>
	      <li><a href="kategori.php">Kategori</a></li>
	      <li><a href="artist.php">Artist</a></li>
	      <li><a href="lagu.php">Lagu</a></li>
	    </ul>
    </div>
  </div>
</nav>

</body>
</html>