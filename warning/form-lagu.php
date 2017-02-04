<?php 
include "../app/start.php";
include "../app/DB.php";

$id = $_GET['id'];

$fetch = "https://www.youtubeinmp3.com/fetch/?format=JSON&video=https://www.youtube.com/watch?v={$id}&bitrate=1&filesize=1";

$file = file_get_contents($fetch);

$array = json_decode($file);

$length = sec_to_time($array->length);
$filesize = byte_to_mb($array->filesize);
$url = "//www.youtubeinmp3.com/fetch/?video=https://www.youtube.com/watch?v={$id}";


$queryartist = $db->query("SELECT * FROM tbartist ORDER BY NamaArtist ASC")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<br>
<br>
    <div class="container">
    <div class="row">
        <div class="form col-lg-6">
            <form action="<?php echo baseurl('warning/proses/insert-lagu.php'); ?>" method="post">
				
				<div class="hidden">
					<input type="hidden" name="urllink" value="<?php echo $url; ?>">
					<input type="hidden" name="filesize" value="<?php echo $filesize; ?>">
					<input type="hidden" name="duration" value="<?php echo $length; ?>">
				</div>
				

                <div class="form-group">
                    <label for="idyoutube">
                        ID Youtube
                    </label>
                    <input type="text" class="form-control" id="idyoutube" name="idyoutube" value="<?php echo $_GET['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="judul-video">
                        Judul Video
                    </label>
                    <input type="text" class="form-control" id="judul-video" name="judul-video" value="<?php echo $array->title; ?>">
                </div>
                <div class="form-group">
                    <label for="judul-lagu">
                        Judul Lagu
                    </label>
                    <input type="text" class="form-control" id="judul-lagu" name="judul-lagu">
                </div>
                <div class="form-group">
                    <label for="artist">
                        Artist
                    </label>
                    <select class="form-control" name="artist" id="artist">
                        <option value="">- Pilih Artist -</option>
                        <?php foreach($queryartist as $data){ ?>
                        <option value="<?php echo $data['idartist']; ?>">
                        	<?php echo $data['NamaArtist']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <a href="<?php echo baseurl('warning/artist.php'); ?>" target="_blank">Tidak ada artis? buat artist.</a>
                </div>
                <div class="form-group">
                    <label for="genre">
                        Genre
                    </label>
                    <input type="text" class="form-control" id="genre" name="genre">
                </div>
                <div class="form-group">
                    <label for="album">
                        Album
                    </label>
                    <input type="text" class="form-control" id="album" name="album">
                </div>
                <div class="form-group">
                    <label for="tahun">
                        Tahun
                    </label>
                    <input type="text" class="form-control" id="tahun" name="tahun">
                </div>
                <div class="form-group">
                    <label for="Tag">
                        Tag
                    </label>
                    <input type="text" class="form-control" id="Tag" name="tag">
                </div>
                <button type="submit" class="btn btn-default">
                    Simpan Lagu
                </button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>
