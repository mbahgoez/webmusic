<?php 

include "../../app/DB.php";

$namakategori = $_POST['nama-kategori'];
$slugkategori = $_POST['slug-kategori'];
$id = $_POST['id'];

$sql = "UPDATE tbkategori SET ";
$sql .= "NamaKategori='$namakategori', ";
$sql .= "SlugKategori='$slugkategori' ";
$sql .= "WHERE idkategori='$id'";

$query = $db->exec($sql);

if($query){
	header("location:".baseurl("warning/kategori.php?status=berhasil-diperbarui"));
}



