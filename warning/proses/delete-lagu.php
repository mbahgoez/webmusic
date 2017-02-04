<?php
include "../../app/DB.php";
include "../../app/start.php";

$id = $_GET['id'];

$sql = "DELETE FROM tbmusic WHERE idmusic='$id'";

$query = $db->exec($sql);


if($query){
	header("Location:".baseurl('warning/lagu.php')."?status=berhasil");
} else {
	header("Location:".baseurl('warning/lagu.php')."?status=gagal");
}

