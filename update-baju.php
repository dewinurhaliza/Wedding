<?php 
    include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Baju</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            font-family:Georgia, 'Times New Roman', Times, serif;
            line-height: 20px;
            font-size: 17px;
            margin: 0px;
            padding: 0px;
        }
        nav{
            height: 80px;
        }
        .navbar-brand{
            color: white;
            font-size: 26px;
            margin-left: 25px;
        }
        .btn-outline-success{
            color: white;
            border: 2px solid #ffff; 
            font-weight: bold;    
        }
        .btn-outline-success:hover {
            color: #F78CA2; 
            background-color: white; 
            font-weight: bold;
            border: 3px solid #ffff; 
        }
        .form-container {
            margin: 20px auto;
            padding: 40px;
            max-width: 800px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        }
        table {
            width: 100%;
            max-width: 600px;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
        }
        select, input{
            margin-left: 10px;
        }
        a{
            color: #294B29;
            font-size: 21px;
            text-decoration : none;
            margin-left: 10px;
        }
        button{
            background: #294B29;
            color: white;
            border: 0;
            cursor: pointer;
            border-radius: 5px;
            font-size: 19px;
            padding-right: 20px;
            margin-left: 540px;
        }
        button:hover {
            background: #B70404;
            color: white;
        }
        footer {
            color: #FEF2F4;
            text-align: center;
            font-size: 20px;
            padding: 30px 0px 30px 0px;
            background-color: #294B29;
        }
    </style>
</head>
<body>
    <nav class="navbar" style="background-color: #294B29;">
        <div class="container-fluid">
            <a class="navbar-brand">Bantu Manten</a>
        </div>  
    </nav><br><br>
    <?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $mysqli->query("SELECT * FROM baju WHERE id=$id");
        $user = $result->fetch_assoc();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nama_baju = $_POST['nama_baju'];
        $asal_adat = $_POST['asal_adat'];
        $harga = $_POST['harga'];
        $status_ketersediaan = $_POST['status_ketersediaan'];

        // Check if a file was uploaded
        if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $nama_file = $_FILES['foto']['name'];
            $tmp_file = $_FILES['foto']['tmp_name'];
            $target_file = "baju/" . basename($nama_file);
            
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($tmp_file, $target_file)) {
                echo "File berhasil diunggah.";
            } else {
                echo "Gagal mengunggah file.";
            }
            
            // Update the database with the new file path
            $stmt = $mysqli->prepare("UPDATE baju SET foto = ? WHERE id = ?");
            $stmt->bind_param("si", $target_file, $id);
            $stmt->execute();
        }

        $stmt = $mysqli->prepare("UPDATE baju SET nama_baju = ?, asal_adat = ?, harga = ?, status_ketersediaan = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nama_baju, $asal_adat, $harga, $status_ketersediaan, $id);
        if ($stmt->execute()){
            echo "Data berhasil diperbarui.";
        } else{
            echo "Error: ".$stmt->error;
        }
        $stmt->close();
        header("Location: baju.php");
        exit;
    }
    ?>
    <div class="form-container">
        <form action="update-baju.php" method="post" enctype="multipart/form-data">
            <p style="color: black;">Form Edit Data Baju</p><br>
        <table>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $user['id']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Baju</td>
                <td><input type="text" name="nama_baju" value="<?php echo $user['nama_baju']; ?>" required></td>
            </tr>
            <tr>
                <td>Asal Daerah</td>
                <td><input type="text" name="asal_adat" value="<?php echo $user['asal_adat']; ?>" required></td>
            </tr>       
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $user['harga']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="status_ketersediaan">Status Ketersediaan</label></td>
                <td><select name="status_ketersediaan" required>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="foto" style="color: black;">Upload Foto</label></td>
                <td><input type="file" id="foto" name="foto" accept="image/*"></td>
            </tr>
        </table>
        <a href="baju.php">Back</a>
        <button type="submit">Simpan</button>
        </form>
    </div>
   
    <br><br><br>
    <footer>
        &copy; 2024 Bantu Manten
    </footer>
</body>
</html>
