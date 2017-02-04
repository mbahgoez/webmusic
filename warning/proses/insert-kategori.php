<?php 

include "../../app/DB.php";
include "../../app/start.php";

$namakategori = $_POST['nama-kategori'];
$slugkategori = $_POST['slug-kategori'];


$queryselect = $db->query("SELECT * FROM tbkategori WHERE SlugKategori='$slugkategori'");

if(count($queryselect->fetchAll()) == 0){

	$sql = "INSERT INTO tbkategori VALUES('', '$namakategori', '$slugkategori')";
	$query = $db->query($sql);

	if($query){
		header("location:".baseurl("/warning/kategori.php"));
	}
} else {
	echo "Slug sudah ada";
}



