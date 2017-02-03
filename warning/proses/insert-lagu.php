<?php 

include "../../app/start.php";
include "../../app/DB.php";
include "../koneksi.php";

$idyoutube = mysql_real_escape_string($_POST['idyoutube']);
$judulvideo = mysql_real_escape_string($_POST['judul-video']);
$judullagu = mysql_real_escape_string($_POST['judul-lagu']);
$filesize = mysql_real_escape_string($_POST['filesize']);
$duration = mysql_real_escape_string($_POST['duration']);
$artist = mysql_real_escape_string($_POST['artist']);
$album = mysql_real_escape_string($_POST['album']);
$tahun = mysql_real_escape_string($_POST['tahun']);
$tag = mysql_real_escape_string($_POST['tag']);
$genre = mysql_real_escape_string($_POST['genre']);
$link = mysql_real_escape_string($_POST['urllink']);



$sql = "INSERT INTO tbmusic ";
$sql .= "VALUES('', '$idyoutube', '$judulvideo', '$judullagu', '$duration', '$filesize', '$album', '$tahun', '$genre', '$tag', '$link', '$artist')";

$query = mysql_query($sql) or die(mysql_error());

if($query){
	header("location:".baseurl("warning/lagu.php?status=")."berhasil-tambah");
} else {
	header("location:".baseurl("warning/lagu.php?status=")."gagal-tambah");
}