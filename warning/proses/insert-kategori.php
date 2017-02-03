<?php 

include "../koneksi.php";

$namakategori = $_POST['nama-kategori'];
$slugkategori = $_POST['slug-kategori'];


$queryselect = mysql_query("SELECT * FROM tbkategori WHERE SlugKategori='$slugkategori'") or die(mysql_error());


if(mysql_num_rows($queryselect) == 0){

	$sql = "INSERT INTO tbkategori VALUES('', '$namakategori', '$slugkategori')";
	$query = mysql_query($sql) or die(mysql_error());

	if($query){
		header("location:http://localhost/webmusic/warning/kategori.php");
	}
} else {
	echo "Slug sudah ada";
}



