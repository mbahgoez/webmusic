<?php
include '../koneksi.php';
include "../../app/start.php";
$id = $_GET['id'];

$sql = "DELETE FROM tbartist WHERE idartist='$id'";

$query = mysql_query($sql);


if($query){
	header("Location:".baseurl('warning/artist.php')."?status=berhasil");
} else {
	header("Location:".baseurl('warning/artist.php')."?status=gagal");
}

