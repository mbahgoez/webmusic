<?php 
include "../app/start.php";
include "../app/DB.php";
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
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="kategori.php">Kategori</a></li>
      <li><a href="artist.php">Artist</a></li>
      <li><a href="lagu.php">Lagu</a></li>
    </ul>
    </div>
  </div>
</nav>
<br><br>
	<section class="container">
		<div class="row">
			<div class="table-list col-lg-8">
				<div class="table-responsive" style="border:1px solid #ccc;">
					<table class="table table-striped table-hover table-condensed">
						<thead>
						<tr>
							<td>ID Kategori</td>
							<td>Nama Kategori</td>
							<td>Slug Kategori</td>
							<td>Action</td>
						</tr>
						</thead>
						<tbody>
						<?php 
						$query = $db->query("SELECT * FROM tbkategori")->fetchAll();
						$i = 1;

						foreach($query as $data){?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $data['NamaKategori'] ?></td>
								<td>
									<a target="_blank" href="<?php echo baseurl($data['SlugKategori']); ?>">
										<?php echo $data['SlugKategori'] ?>
									</a>	
								</td>
								<td>
									[<a onclick="return confirm('Yakin ingin hapus ini?')" href="proses/delete-kategori.php?id=<?php echo $data['idkategori'] ?>">Delete</a>]	

									[<a href="?editid=<?php echo $data['idkategori']; ?>">Edit</a>]
									

								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="form col-lg-4">
				<?php
				if(isset($_GET['editid'])){
					$id = $_GET['editid'];
					$query = $db->query(
						dbselect_where("tbkategori", "idkategori='$id'")
					);
					$data = $query->fetchAll()[0];
					?>
					<form action="proses/update-kategori.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $data['idkategori']; ?>">
					<div class="form-group">
						<label for="nama-kategori">
							Nama Kategori
						</label>
						<input type="text" class="form-control" value="<?php echo $data['NamaKategori']; ?>" name="nama-kategori" id="nama-kategori">
					</div>

					<div class="form-group">
						<label for="slug-kategori">
							Slug Kategori
						</label>
						<input type="text" class="form-control" value="<?php echo $data['SlugKategori']; ?>" name="slug-kategori" id="slug-kategori">
					</div>

					<button type="submit" class="btn btn-default">
						Perbarui Kategori
					</button>
					<a href="<?php echo baseurl('warning/kategori.php'); ?>" class="btn btn-danger">x Batalkan</a>

				</form>
					<?php
				}  else { ?>

			
				<form action="proses/insert-kategori.php" method="POST">
					<div class="form-group">
						<label for="nama-kategori">
							Nama Kategori
						</label>
						<input type="text" class="form-control" name="nama-kategori" id="nama-kategori">
					</div>

					<div class="form-group">
						<label for="slug-kategori">
							Slug Kategori
						</label>
						<input type="text" class="form-control" name="slug-kategori" id="slug-kategori">
					</div>

					<button type="submit" class="btn btn-default">
						Tambah Kategori
					</button>

				</form>
				<?php
				}
				?>
			</div>

		</div>
		
	</section>
</body>
</html>