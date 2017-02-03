<?php 
include "../app/start.php";
include "../app/DB.php";
include "koneksi.php";

if(isset($_GET['q'])){
	$q = $_GET['q'];
	$query = mysql_query("SELECT * FROM vlistmusic WHERE Title LIKE '%$q%'");
} else {
	$query = mysql_query("SELECT * FROM vlistmusic");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
      <li><a href="index.php">Home</a></li>
      <li><a href="kategori.php">Kategori</a></li>
      <li><a href="artist.php">Artist</a></li>
      <li class="active"><a href="lagu.php">Lagu</a></li>
    </ul>
    </div>
  </div>
</nav>
<br><br>
	<section class="container">
		<div class="row">
			<form action="proses/parsingid.php" method="POST">
				<div class="col-lg-10">
				
					<input type="text" name="id" placeholder="Insert URL Youtube" class="form-control">
				
				</div>
			<div class="col-lg-2">
				<button class="btn btn-block btn-primary">Convert</button>
			</div>
			</form>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-3 col-lg-offset-8">
				<form>
					<input type="text" name="q" <?php if(isset($_GET['q'])){ ?> value="<?php echo $_GET['q']; ?>"  <?php } ?> class="form-control" placeholder="Masukan Kata kunci">
				</form>
			</div>
			<div class="col-lg-1">
				<button class="btn btn-primary btn-block">
					Cari
				</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="table-list col-lg-12">
				<div class="table-responsive" style="border:1px solid #ccc;">
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>ID Youtube</th>
								<th>Judul Video</th>
								<th>Judul Lagu</th>
								<th>Artist</th>
								<th>Album</th>
								<th>Tahun</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i=1;;
								while($data = mysql_fetch_array($query)){ ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $data['Title']; ?></td>
								<td><?php echo $data['Track'] ?></td>
								<td><?php echo $data['NamaArtist']; ?></td>
								<td><?php echo $data['Album']; ?></td>
								<td>
									<?php echo $data['Tahun']; ?>
								</td>
								<td>
									[<a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo baseurl('/warning/proses/delete-lagu.php?id=').$data['idmusic']; ?>">Delete</a>]
									[<a href="">Edit</a>]
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</section>

	<br>
	<br>
	<br>
	<br>
</body>
</html>