<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Mengecek kondisi jika user ada atau tidak
$sql_user = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$username' AND password='$password'");
$cek_user = mysqli_num_rows($sql_user);

if ($cek_user > 0) {
    $user = mysqli_fetch_assoc($sql_user);
    $id = $user['id'];

    $_SESSION['login'] = true;

    header('Location: ../UAP/home.php');
    exit();
}  else {
    header('Location: ../UAP/login.php?error=1');
    exit();
}
?>