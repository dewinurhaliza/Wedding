<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Makeup</title>
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
            position: fixed;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand{
            color: white;
            font-size: 26px;
            margin-left: 25px;
        }
        .btn-outline-success{
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
            max-width: 700px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        }
        input{
            width: 310px;
            margin-left: 0px;
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
            max-width: 100px;
        }
        textarea{
            margin-left: 10px;
            border-radius: 3px;
            border: 1px solid #ddd;
        }
        select, input{
            margin-left: 10px;
        }
        a{
            color: #294B29;
            font-size: 18px;
            text-decoration : none;
            margin-left: 10px;
            font-weight: bold;
        }
        input[type="submit"]{
            background: #294B29;
            color: white;
            border: 0;
            padding: 8px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 25px;
            width: 120px;
            height: 37px;
            margin-left: 430px;
        }
        input[type="submit"]:hover {
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
    <div class="form-container">
        <form action="create-makeup.php" method="post" enctype="multipart/form-data">
            <p style="text-align: center; font-size: 25px; font-weight: bold;">Form Tambah Data Makeup</p><br>
        <table>
            <tr>
                <td>Nama Makeup</td>
                <td><input type="text" name="nama_makeup" required></td>
            </tr>
            <tr>
                <td><label for="jenis_makeup">Jenis Makeup</label></td>
                <td><select name="jenis_makeup" required>
                    <option value="Tradisional">Tradisional</option>
                    <option value="Modern">Modern</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="foto" style="color: black;">Upload Foto</label></td>
                <td><input type="file" id="foto" name="foto" accept="image/*" required style="border: 0px"></td>
            </tr>
        </table>
        <a href="makeup.php">Back</a>
        <input type="submit" value="Tambah">
        </form>
    </div>
    <?php
    include 'koneksi.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama_makeup = $_POST['nama_makeup'];
        $jenis_makeup = $_POST['jenis_makeup'];

        // File yang diunggah
        $nama_file = $_FILES['foto']['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        $upload_dir = "makeup/";
        $target_file = $upload_dir . $nama_file;

        // Pindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($tmp_file, $target_file)) {
            $stmt = $mysqli->prepare("INSERT INTO makeup (nama_makeup, jenis_makeup, foto) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama_makeup, $jenis_makeup, $target_file);
            if ($stmt->execute()){
                echo "<h5 style='color: #2C4E80; font-weight: bold; text-align: center;'>Data berhasil ditambahkan. ";
                echo "<a href='makeup.php' style='color: #2C4E80; text-decoration: none;'>Tampilkan</a></p>";
            } else{
                echo "Error: ".$stmt->error;
            }
            $stmt->close();
        } else {
            echo "<h5 style='color: red; font-weight: bold; text-align: center;'>Gagal mengunggah foto.</h5>";
        }
    }
    ?>


    <br><br><br>
    <footer>
        &copy; 2024 Bantu Manten
    </footer>
</body>
</html>