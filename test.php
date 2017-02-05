<?php

try {
    $db = new PDO("mysql:localhost=;dbname=dbmusic", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection Failed " . $e->getMessage();
}


$data = $db->query("SELECT * FROM tbmusic")->fetchAll();

print_r(json_encode($data));