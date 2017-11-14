<?php
    $hostname = "127.0.0.1";
    $username = "gchase";
    $password = "";
    $dbname = "book";
    $id = $_GET["id"];
    
    try
    {
    $pdo = new PDO("mysql:dbname=book;host=localhost", $username, $password);
    }
    catch (PDOException $e) {
    echo "Connection Failed".$e->getMessage();
    die();
    }
?>