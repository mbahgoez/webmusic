<?php
include '../../app/DB.php';
include "../../app/start.php";

$id = $_GET['id'];

$sql = "DELETE FROM tbartist WHERE idartist='$id'";

$query = $db->exec($sql);


if($query){
	header("Location:".baseurl('warning/artist.php')."?status=berhasil");
} else {
	header("Location:".baseurl('warning/artist.php')."?status=gagal");
}

