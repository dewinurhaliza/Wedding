<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Desain Undangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            font-family: Georgia, 'Times New Roman', Times, serif;
            line-height: 20px;
            font-size: 17px;
            margin: 0px;
            padding: 0px;
        }
        nav {
            height: 80px;
            background-color: black;
        }
        .navbar-brand {
            color: white;
            font-size: 26px;
            margin-left: 25px;            
        }
        .btn-outline-success {
            color: white;
            border: 3px solid #ffff;
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
        input {
            width: 300px;
            height: 30px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            max-width: 600px;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
        }
        select, input {
            margin-left: 10px;
        }
        a {
            color: #294B29;
            font-size: 18px;
            text-decoration: none;
            margin-left: 10px;
            font-weight: bold;
        }
        input[type="submit"] {
            background: #294B29;
            color: white;
            border: 0;
            padding: 8px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 25px;
            width: 100px;
            height: 37px;
            margin-left: 550px;
        }
        input[type="submit"]:hover {
            background: #294B29;
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
    <div class="form-container">
        <form action="create-undangan.php" method="post" enctype="multipart/form-data">
            <p style="text-align: center; font-size: 25px; font-weight: bold;">Form Tambah Data Desain Undangan</p><br>
        <table>
            <tr>
                <td>Nama Undangan</td>
                <td><input type="text" name="nama_undangan"></td>
            </tr>
            <tr>
                <td>Panjang Undangan (dalam cm)</td>
                <td><input type="text" name="panjang" required></td>
            </tr>      
            <tr>
                <td>Lebar Undangan (dalam cm)</td>
                <td><input type="text" name="lebar" required></td>
            </tr>
            <tr>
                <td><label for="fotoo" style="color: black;">Upload Foto</label></td>
                <td><input type="file" id="fotoo" name="fotoo" accept="image/*" required style="border: 0px"></td>
            </tr>
        </table>
        <a href="undangan.php">Back</a>
        <input type="submit" value="Submit">
        </form>
    </div>
    <?php
    include 'koneksi.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama_undangan = $_POST['nama_undangan'];
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];

         // File yang diunggah
        $nama_file = $_FILES['fotoo']['name'];
        $ukuran_file = $_FILES['fotoo']['size'];
        $tmp_file = $_FILES['fotoo']['tmp_name'];
        $upload_dir = "undangan/";
        // Buat direktori jika belum ada
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $target_file = $upload_dir . basename($nama_file);

        
        //$target_file = $upload_dir . $nama_file;

    //     $stmt = $mysqli->prepare("INSERT INTO undangan (nama_undangan, panjang, lebar, fotoo) VALUES (?, ?, ?, ?)");
    //     $stmt->bind_param("ssss", $nama_undangan, $panjang, $lebar, $target_file);
    //     if ($stmt->execute()){
    //         echo "<h5 style='color: #2C4E80; font-weight: bold; text-align: center;'>Data berhasil ditambahkan. ";
    //         echo "<a href='undangan.php' style='color: #2C4E80; text-decoration: none;'>Tampilkan</a></p>";
    //     } else{
    //         echo "Error: ".$stmt->error;
    //     }
    //     $stmt->close();
            // Pindahkan file yang diunggah ke direktori tujuan
            if (move_uploaded_file($tmp_file, $target_file)) {
                $stmt = $mysqli->prepare("INSERT INTO undangan (nama_undangan, panjang, lebar, fotoo) VALUES (?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("ssss", $nama_undangan, $panjang, $lebar, $target_file);
                    if ($stmt->execute()) {
                        echo "<h5 style='color: #2C4E80; font-weight: bold; text-align: center;'>Data berhasil ditambahkan. ";
                        echo "<a href='undangan.php' style='color: #2C4E80; text-decoration: none;'>Tampilkan</a></p>";
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error: " . $mysqli->error;
                }
            } else {
                echo "Error: Gagal mengunggah file.";
            }
        }
    // }
    ?>


    <br><br><br>
    <footer>
        &copy; 2024 Bantu Manten
    </footer>
</body>
</html>