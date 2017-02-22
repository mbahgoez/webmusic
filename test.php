<?php

try {
    $db = new PDO("mysql:host=mysql.idhostinger.com;dbname=u664647819_music", "u664647819_music", "loloksemut48");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection Failed " . $e->getMessage();
}


$data = $db->query("SELECT * FROM tbmusic")->fetchAll();

print_r(json_encode($data));