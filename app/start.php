<?php

ini_set("display_errors", "On");

define('TITLE', 'Musicfeel.ga');
define('DESC', 'Download Kumpulan Lagu Terbaru dan Terlaris Baik Dalam dan Luar Negeri
');

function currentUrl(){
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	return $actual_link;
}

function urlprint($url)
{
    $str = str_ireplace(" ", "-", $url);
    return strtolower($str);
}

function baseurl($url = null)
{
    if (isset($url)) {
        $host = "http://localhost/webmusic/" . $url;
    } else {
        $host = "http://localhost/webmusic";
    }
    return $host;
}

function byte_to_mb($size, $precision = 2) {
	$base = log($size, 1024);
	$suffixes = array('', 'K', 'MB', 'G', 'T');   

	return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}

function sec_to_time($seconds){
	$hours = floor($seconds / 3600);
	$mins = floor($seconds / 60 % 60);
	$secs = floor($seconds % 60);


	$timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
	return $timeFormat;
}