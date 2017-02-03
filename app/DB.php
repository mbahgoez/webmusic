<?php


try {
    $db = new PDO("mysql:localhost=;dbname=dbmusic", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection Failed " . $e->getMessage();
}


function dbselect($table)
{
	$sql = "SELECT * FROM $table";
	return $sql;
}

function dbselect_where($table, $where){
	$sql = "SELECT * FROM $table ";
	$sql .= "WHERE $where";
	return $sql;
}

function dbinsert($table, $data)
{
	$sql = "INSERT INTO $table(";
	$i = 0;
	foreach ($data as $key => $val) {
		$sql .= "$key";
		$i++;
		if(count($data) != $i){
			$sql .= ", ";
		}
	}
	$sql .= ") VALUES(";

	$i = 0;
	foreach ($data as $key => $val) {
		$sql .= "'$val'";
		$i++;
		if(count($data) != $i){
			$sql .= ", ";
		}
	}

	$sql .= ")";
	return $sql;
}



function dbdelete($table, $where)
{
	$sql = "DELETE FROM $table WHERE $where";
}

$data = array(
	"nama"=>"bagus",
	"kelas"=>"XII RPL 2"
);

function dbupdate($table, $data, $where)
{
	$sql = "UPDATE $table SET ";
	
	$i = 0;
	foreach ($data as $key => $val) {
		$sql .= "$key='$val'";
	
		$i++;
		
		if(count($data) != $i){
			$sql .= ", ";
		}
	}
	$sql .= " WHERE $where";
	$sql .= "";
	return $sql;
}



