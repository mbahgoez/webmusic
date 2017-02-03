<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=dbrentalmobil", "root", "");

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection Failed " . $e->getMessage();
}

function dbselect($table)
{

}

function dbinsert($table, $data)
{

}

function dbdelete($table, $where)
{

}

function dbupdate($table, $data, $Insert)
{

}



