<?php 

include "../koneksi.php";

$namakategori = $_POST['nama-kategori'];
$slugkategori = $_POST['slug-kategori'];
$id = $_POST['id'];

$sql = "UPDATE tbkategori SET ";
$sql .= "NamaKategori='$namakategori', ";
$sql .= "SlugKategori='$slugkategori' ";
$sql .= "WHERE idkategori='$id'";


$query = mysql_query($sql) or die(mysql_error());

if($query){
	header("location:http://localhost/webmusic/warning/kategori.php?status=berhasil-diperbarui");
}



