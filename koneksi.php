<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wedding";

    $mysqli = new mysqli($host, $username, $password, $dbname);
    if (!$mysqli){
        die("Koneksi Gagal: ".mysqli_connect_error());
    }
?>