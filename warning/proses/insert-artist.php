<?php 

include "../../app/DB.php";

$namaartist = $_POST['nama-artist'];
$slugartist = $_POST['slug-artist'];
$slugkategori = $_POST['slug-kategori'];

$query = $db->query("INSERT INTO tbartist VALUES('', '$namaartist', '$slugartist', '$slugkategori')");

if($query){
	header("Location:http://localhost/webmusic/warning/artist.php");
}