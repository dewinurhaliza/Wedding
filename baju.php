<?php 
    include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>BAJU ADAT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <style>
         * {
            font-family:Georgia, 'Times New Roman', Times, serif;
            line-height: 20px;
            font-size: 17px;
            margin: 0px;
            padding: 0px;
        }
        .navbar{
            width: 100%;
            margin: auto;
        }
        nav{
            height: 80px;
            z-index: 100;
            color: white;
            text-align: center;
            position: fixed;
            line-height: 60px;
            width: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2));
        }
        nav .brand {
            font-size: 28px;
            float: left;
            position: relative;
            line-height: 60px;
            font-weight:bold;
            margin-left: 50px;
            text-decoration: none;
            color: white;
        }
        nav .menu {
            float: right;
            height: 60px;
            max-width: 100%;
        }
          nav .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav .menu ul li {
            list-style-type: none;
            float: left;
            line-height: 60px;
        }
        nav ul li a {
            color: white;
            text-align: center;
            padding: 0px 16px 0px 16px;
            text-decoration: none;
        }
        nav .brand:hover{
            cursor: pointer;
            color: #FF9800;
        }
        .menu {
            color: white;
            font-size: 19px;
            text-decoration: none;
            font-weight: bold;
            margin-left: 25px;
        }
        nav .menu:hover{
            color: #FF9800;
        }
        h1{
            margin-left: 20px; 
            margin-top: 0px;
            padding-top: 40px; 
            font-size: 27px; 
            font-weight: bold; 
            color: #294B29; 
        }
        p{
            font-size: 18px;
            margin-left: 20px;
            color: #686D76;
            line-height: 25px;
        }
        .judul{
            text-align: center; 
            margin-top: 0px;
            padding-top: 40px; 
            font-size: 27px; 
            font-weight: bold; 
            color: #294B29; 
        }
        .tambah {
            display: flex;
            align-items: center;
            border-radius: 8px;
            padding: 20px;
            transition: transform 0.2s;
        }
        .tambah a {
            text-decoration: none;
            color: #ffff;
            background-color: #365E32;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin-left: 1130px;
        }
        .tambah a:hover {
            background-color: #294B29;
        }
        span{
            font-size: 15px; 
            font-weight: bold; 
            color: black; 
            text-align: center;
        }
        table {
            border-collapse: collapse;
            color: black;
            margin-left: auto;
            margin-right: auto;
        }
        td {
            border: 1px solid white;
            text-align: center;
            padding: 25px;
        }
        .aksi {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            color: white;
            margin: 5px;
            transition: background-color 0.3s;
        }
        .edit {
            background-color: #41B06E; 
        }
        .edit:hover {
            background-color: #45a049; 
        }
        .delete {
            background-color: #f44336; 
        }
        .delete:hover {
            background-color: #d32f2f; 
        }
        footer {
            color: white;
            text-align: center;
            font-size: 20px;
            padding: 30px 0px 30px 0px;
            background-color: #294B29;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="brand">Bantu Manten</a>
            <div class="menu" style="margin-left: -330px;">
            <ul>
              <li><a href="dekorasi.php">Dekorasi</a></li>
              <li><a href="makeup.php">Make Up</a></li>
              <li><a href="baju.php">Pakaian</a></li>
              <li><a href="undangan.php">Undangan</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <p class="judul">Daftar Baju Pernikahan Adat</p>
    <div class="tambah"><a href="create-baju.php"><i class="bi bi-plus-circle-fill"> </i>  Tambah Data</a></div>

    <table>
        <?php
        $sql = "SELECT id, nama_baju, asal_adat, harga, status_ketersediaan, foto FROM baju";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $count = 0; 
            while($row = $result->fetch_assoc()) {
                if ($count % 5 == 0) {
                    echo "<tr>";
                }
                echo "<td>";
                echo "<div style='text-align: center;'>";
                echo "<img src='" . $row['foto'] . "' alt='Foto Baju' width='200px' height='250px' style='padding: 10px; margin-right: auto; margin-left: auto; border-radius: 15px;'><br>";
                echo "<span style='color: #FF9800; display: block; margin-bottom: 5px;'>" . $row['nama_baju'] . "</span>";
                echo "<span style='color: #294B29; display: block; margin-bottom: 5px;'>" . $row['asal_adat'] . "</span>";
                echo "<span style='color: #686D76; display: block; margin-bottom: 5px;'>" . $row['harga'] . "</span>";
                $status_ketersediaan = $row['status_ketersediaan'];
                $warna = ($status_ketersediaan == 'Tersedia') ? '#294B29' : '#FF0000';
                echo "<span style='color: $warna; display: block; margin-bottom: 5px;'>" . $status_ketersediaan . "</span><br>";

                echo "<a href='update-baju.php?id=" . $row['id'] . "' class='aksi edit'><i class='bi bi-pencil-square'></i></a>";
                echo "<a href='delete-baju.php?id=" . $row['id'] . "' class='aksi delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\"><i class='bi bi-trash3-fill'></i></a>";
                echo "</div>";
                echo "</td>";
                $count++;
                if ($count % 5 == 0) {
                echo "</tr>"; 
                }
            }
            if ($count % 5 != 0) {
                echo "</tr>"; 
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data.</td></tr>";
        }
        ?>
    </table>

    <br><br><br>
    <footer>
        &copy; 2024 Bantu Manten
    </footer>

</body>
</html>