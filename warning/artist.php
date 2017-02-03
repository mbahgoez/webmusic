<?php
include "../app/start.php";
include "../app/DB.php";
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
                <li class="active"><a href="artist.php">Artist</a></li>
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
                        <th>ID Artist</th>
                        <th>Nama Artist</th>
                        <th>Slug Artist</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    include "koneksi.php";
                    $query = mysql_query("SELECT * FROM vartist ORDER BY NamaArtist ASC");
                    $i = 1;

                    while ($data = mysql_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['NamaArtist']; ?></td>
                            <td><?php echo $data['SlugArtist']; ?></td>
                            <td>
                                <a target="_blank" href="<?php echo baseurl($data['SlugKategori']); ?>">
                                    <?php echo $data['NamaKategori']; ?>
                                </a>
                            </td>
                            <td>
                                [<a href="">Edit</a>]
                                [<a onclick="return confirm('Yakin ingin hapus ini?')" href="proses/delete-artist.php?id=<?php echo $data['idartist']; ?>">
                                    Delete
                                </a>]
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form col-lg-4">
            <form action="proses/insert-artist.php" method="POST">
                <div class="form-group">
                    <label for="nama-artist">
                        Nama Artist
                    </label>
                    <input type="text" class="form-control" name="nama-artist" id="nama-artist">
                </div>

                <div class="form-group">
                    <label for="slug-artist">
                        Slug artist
                    </label>
                    <input type="text" class="form-control" name="slug-artist" id="slug-artist">
                </div>

                <div class="form-group">
                    <label for="slug-kategori">
                        Slug Kategori
                    </label>
                    <select name="slug-kategori" id="slug-kategori" class="form-control">
                        <option value="">- Pilih Kategori -</option>

                        <?php
                        $query = mysql_query("SELECT * FROM tbkategori");
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <option
                                value="<?php echo $data['idkategori']; ?>"><?php echo $data['NamaKategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-default">
                    Tambah Artist
                </button>

            </form>
        </div>

    </div>

</section>
</body>
</html>