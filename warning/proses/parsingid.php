<?php

include "../../app/start.php";

$url = $_POST['id'];


function getHost($Address){
	$parseUrl = parse_url(trim($Address));

	if(!empty($parseUrl['host'])){
		$host = $parseUrl['host'];
	} else {
		$host = explode("/", $parseUrl['path'])[0];
	}
	$c = count(explode(".", $host));

	if($c == 2){
		$domain = explode(".", $host)[0];
	} else if($c == 3){
		$domain = explode(".", $host)[1];
	} else {
		$domain = false;
	}

	return $domain;
}

if(getHost($url) == 'youtube'){
	
	$urlparse = parse_url($url);
	parse_str($urlparse['query'], $query);
	$toget = $query['v'];

} else if(getHost($url) == 'youtu'){
	
	$youtuurl = explode("/", parse_url($url)['path']);
	$toget = $youtuurl[1];

} else {
	header("location:".baseurl("warning/lagu.php")."?status=gagalconvert");
}



header("location:".baseurl("warning/form-lagu.php")."?id=".$toget);