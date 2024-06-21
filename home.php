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
        #home {
            position: relative;
            text-align: left;
            color: white;
            overflow: hidden;
        }
        #home .overlay{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        #home .intro {
            z-index: 1;
            position: absolute;
            max-width: 1400px;
            bottom: 0px;
            padding: 20px;
            font-size: 15px;
            background-color: rgba(0, 0, 0, 0.5);
        }
        #home .intro h3 {
            font-size: 40px;
            margin: 0;
            padding: 0;
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
            background-color: #FF597B;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin-left: 1130px;
        }
        .tambah a:hover {
            background-color: #E90064;
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
            margin-top: 0px;
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
            color: #FEF2F4;
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
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="home">
        <div class="overlay"></div>
        <img src="2.jpg" type="image/jpeg" width="100%" style="margin-top: -80px;"/>
        <div class="intro">
          <h3>Bantu Manten</h3><br>
          <p style="color: #FFFF;  margin-left: 0px;">
          Buat hari spesial Anda lebih berkesan dengan pilihan dekorasi, make up, dan baju pernikahan adat terbaik dari kami.
          Rayakan momen istimewa Anda dengan sentuhan tradisi dan keanggunan. Kami menyediakan dekorasi yang memukau, make up yang mempesona, dan baju pernikahan adat yang elegan untuk hari pernikahan Anda yang tak terlupakan.</p>
        </div>
      </header>
      <br><br>
      <div>
        <h1 style="font-size: 32px; text-align: center; font-weight: bold;">Dekorasi Pernikahan</h1><br>
        <p style="border-bottom: 5px solid #FFA447; width: 400px; margin-left: 486px;"></p><br>
      </div>
    <table>
        <?php
        $sql = "SELECT id, nama_dekor, jenis_dekor, foto FROM dekorasi";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $count = 0; 
            while($row = $result->fetch_assoc()) {
                if ($count % 5 == 0) {
                    echo "<tr>";
                }
                echo "<td>";
                echo "<div style='text-align: center;'>";
                echo "<img src='" . $row['foto'] . "' alt='Foto Makeup' width='200px' height='250px' style='padding: 10px; margin-right: auto; margin-left: auto; border-radius: 15px;'><br>";
                echo "<span style='color: #FF9800; display: block; margin-bottom: 5px;'>" . $row['nama_dekor'] . "</span>";
                echo "<span style='color: #294B29; display: block; margin-bottom: 5px;'>" . $row['jenis_dekor'] . "</span>";
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
            echo "<tr><td colspan='5>Tidak ada data.</td></tr>";
        }
        ?>
    </table>
      <div>
        <h1 style="font-size: 32px; text-align: center; font-weight: bold;">Make Up Pernikahan</h1><br>
        <p style="border-bottom: 5px solid #FFA447; width: 400px; margin-left: 486px;"></p><br>
      </div>
    <table>
        <?php
        $sql = "SELECT id, nama_makeup, jenis_makeup, foto FROM makeup";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $count = 0; 
            while($row = $result->fetch_assoc()) {
                if ($count % 5 == 0) {
                    echo "<tr>";
                }
                echo "<td>";
                echo "<div style='text-align: center;'>";
                echo "<img src='" . $row['foto'] . "' alt='Foto Makeup' width='200px' height='250px' style='padding: 10px; margin-right: auto; margin-left: auto; border-radius: 15px;'><br>";
                echo "<span style='color: #FF9800; display: block; margin-bottom: 5px;'>" . $row['nama_makeup'] . "</span>";
                echo "<span style='color: #294B29; display: block; margin-bottom: 5px;'>" . $row['jenis_makeup'] . "</span>";
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
            echo "<tr><td colspan='5>Tidak ada data.</td></tr>";
        }
        ?>
    </table>
    <div>
        <h1 style="font-size: 32px; text-align: center; font-weight: bold;">Baju Pernikahan Adat</h1><br>
        <p style="border-bottom: 5px solid #FFA447; width: 400px; margin-left: 486px;"></p><br>
      </div>
    <table>
        <?php
        $sql = "SELECT id, nama_baju, asal_adat, status_ketersediaan, foto FROM baju";
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
                $status_ketersediaan = $row['status_ketersediaan'];
                $warna = ($status_ketersediaan == 'Tersedia') ? '#294B29' : '#FF0000';
                echo "<span style='color: $warna; display: block; margin-bottom: 5px;'>" . $status_ketersediaan . "</span>";

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
            echo "<tr><td colspan='5>Tidak ada data.</td></tr>";
        }
        ?>
    </table>

      <div>
        <h1 style="font-size: 32px; text-align: center; font-weight: bold;">Undangan Pernikahan</h1><br>
        <p style="border-bottom: 5px solid #FFA447; width: 400px; margin-left: 486px;"></p><br>
      </div>
    <table>
        
        <?php
        $sql = "SELECT id, nama_undangan, panjang, lebar, fotoo FROM undangan";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $count = 0; 
            while($row = $result->fetch_assoc()) {
                if ($count % 5 == 0) {
                    echo "<tr>";
                }
                echo "<td>";
                echo "<div style='text-align: center;'>";
                echo "<img src='" . $row['fotoo'] . "' alt='Foto Undangan' width='380px' height='250px' style='padding: 10px; margin-right: auto; margin-left: auto; border-radius: 15px;'><br>";
                echo "<span style='color: #FF9800; display: block; margin-bottom: 5px;'>" . $row['nama_undangan'] . "</span>";
                echo "<span style='color: #294B29; display: block; margin-bottom: 5px;'>" . 'Ukuran ' . $row['panjang'] . ' x ' . $row['lebar'] . "</span><br>";
                echo "</td>";
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
            echo "<tr><td colspan='5>Tidak ada data.</td></tr>";
        }
        ?>
    </table>

    <br><br><br>
    <footer>
        &copy; 2024 Bantu Manten
    </footer>

</body>
</html>