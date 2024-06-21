<?php 
    include 'koneksi.php'; 

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $stmt = $mysqli->prepare("DELETE FROM baju WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()){
            echo "Data berhasil dihapus.";
        } else{
            echo "Error: ".$stmt->error;
        }
        $stmt->close();
    }
    header("Location: baju.php");
    exit;
?>
