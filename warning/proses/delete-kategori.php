<?php
include "../../app/DB.php";
include "../../app/start.php";
$id = $_GET['id'];


$sql = "DELETE FROM tbkategori WHERE idkategori='$id'";

$query = $db->query($sql);


if($query){
	header("Location:".baseurl('warning/kategori.php')."?status=berhasil");
} else {
	header("Location:".baseurl('warning/kategori.php')."?status=gagal");
}

