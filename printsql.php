<style>
* {

	font-family:'consolas';
	font-size: 12px;
}
</style>

<?php 

mysql_connect("localhost", "root", "");
mysql_select_db("dbmusic");


	echo $create = "CREATE DATABASE dbmusic";
	echo "<br><br>";

	$queryshowtable = mysql_query("SHOW TABLES");
	while($data = mysql_fetch_array($queryshowtable)){
		$table = $data[0];

		$queryfield = mysql_query("DESC $table");

		echo "CREATE TABLE $table(<br>";
		$totalfield = mysql_num_rows($queryfield);
		$i=0;
		while($data = mysql_fetch_array($queryfield)){
			echo "&nbsp;&nbsp;&nbsp;&nbsp;".$data[0]." ".$data[1]." ".$data[2]." ".$data[3];
			$i++;
			if($i != $totalfield){
				echo ", <br>";
			} else {
				echo "<br>";
			}
		}
		echo ");<br><br>";


		// ----------------------------------------------

		$queryfield = mysql_query("DESC $table");

		$insert="INSERT INTO $table(";
		$i=0;
		while($data = mysql_fetch_array($queryfield)){
			$insert .= $data[0];
			$i++;
			if($i != $totalfield){
				$insert .= ",";
			}
		}
		$insert .= ") VALUES";

		
		$queryvalues = mysql_query("SELECT * FROM $table");
		$num = mysql_num_rows($queryvalues);
		$numfor = 0;
		while($data = mysql_fetch_array($queryvalues)){
			$insert .= "<br>(";

			for($i = 0; $i<$totalfield; $i++){
				$insert .= "'".$data[$i]."'";
				
				$k=$i+1;

				if($totalfield != $k){
					$insert .= ", ";
				}
				
			}


			$insert .= ")";
			$numfor++;
			if($numfor != $num){
				$insert .= ", ";
			}
		}		

		echo $insert;
		echo "<br><br>";
	}
	$sql = "";


	