<?php 
include "../app/DB.php";

header("Content-type:application/json");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(!empty($_GET['idyoutube'])){
		$id = $_GET['idyoutube'];

		$sql = "SELECT * FROM vlistmusic WHERE idyoutube='$id'";

		$data = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($data);
	} else {
		$sql = "SELECT * FROM vlistmusic";
		$data = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($data);
	}
}