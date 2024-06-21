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
            color: #ffff;
            font-size: 20px;
            padding: 30px 0px 30px 0px;
            background-color: #294B29;
            padding: 30px 0px 30px 0px;
            text-align: left;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="brand">Bantu Manten</a>
            <div class="menu" style="margin-left: -330px;">
                <ul>
                    <li><a href="login.html">LOGIN</a></li>
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
    <footer id="copyright"> 
        <section class="contact">
          <div class="content">
              <p style="font-size: 25px; text-align: left; color: white;">Contact Us</p>
              <br>
          </div>
          <div class="container">
              <div class="contactInfo" style="margin-left: 30px;">
                  <div class="box">
                      <div class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                          </svg> Jl.Prof. Sumantri Brojonegoro No.1, Gedong Meneng, Bandar Lampung
                      </div>                
                  </div> <br>
                  <div class="box">
                      <div class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                          </svg> 081234567890
                      </div>
                  </div><br>
                  <div class="box">
                      <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                        </svg> @bantumanten.official
                      </div>
                  </div>
              </div>
          </div>
      </section>
        <div class="cr" style=" text-align: center;">&copy; 2024 Bantu Manten</div>
      </footer>

</body>
</html>