<?php
include '../koneksi.php';
include "../../app/start.php";
$id = $_GET['id'];

$sql = "DELETE FROM tbmusic WHERE idmusic='$id'";

$query = mysql_query($sql);


if($query){
	header("Location:".baseurl('warning/lagu.php')."?status=berhasil");
} else {
	header("Location:".baseurl('warning/lagu.php')."?status=gagal");
}

