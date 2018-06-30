<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","dbbaju");


?>
<!DOCTYPE html>
<html>
<head>
    <title>TokoBajuDistro</title>

    <link rel="stylesheet"  href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"  href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet"  href="assets/owlcarousel/css/owl.carousel.min.css">
     <link rel="stylesheet"  href="assets/owlcarousel/css/owl.theme.default.min.css">
     <link rel="stylesheet"  href="assets/dist/css/main.css">

     <body background="assets/image/backgroundbati1.jpg">
       

        <style type="text/css">
    .navbar-inverse {background: #353b48;
        font color: #ffffff;}
</style>

    <style type="text/css">
    .panel-footer {background: #353b48;
        font color: #ffffff;}
</style>


</head>
<body style="background-color: #bdc3c7">
    
<header class="header">
    <div class="container">
         <div class="row">
            <div ></div>
           
        </div>
       
    </div>
</header>
<!-- navbar --> 
<nav class="navbar navbar-inverse">
    <div class="">
        <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#naff">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
         <a href="" class="navbar-brand"><font color="#fffff">TokoBajuDistro.com</a></font>
    </div>
   <div class="collapse navbar-collapse" id="#naff">
        <ul class="nav navbar-nav" >
        <li><a href="index.php"><font color="#fffff">Home</a></li></font>
        <li><a href="produk.php"><font color="#fffff">Produk</a></li></font>
        <li><a href="pemesanan.php"><font color="#fffff">Pemesanan</a></li></font>
        <li><a href="profil.php"><font color="#fffff">Profil</a></li></font>
        <li><a href="carapesan.php"><font color="#fffff">cara pesan</a></li></font>
        <!-- jika sudah login (ada session pelanggan) -->
        <?php if (isset($_SESSION["pelanggan"])): ?>
        <li><a href="logout.php"><font color="#fffff">Logout</a></li></font>
        <!-- selain itu(blm login )/ blm ada session pelanggan) -->
    <?php else: ?>
        <li><a href="login.php"><font color="#fffff">Login</a></li></font>
    <?php endif ?>
    </ul>
    </div>
</div>
</nav> 



<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
             <strong><h2>Profil Perusahaan</h2></strong>
             <h3 > adalah jenis toko di Indonesia yang menjual pakaian dan aksesori yang dititipkan oleh pembuat pakaian, atau diproduksi sendiri. Distro umumnya merupakan industri kecil dan menengah (IKM) yang sandang dengan merk independen yang dikembangkan kalangan muda. Produk yang dihasilkan oleh distro diusahakan untuk tidak diproduksi secara massal, agar mempertahankan sifat eksklusif suatu produk dan hasil kerajinan.

Konsep distro berawal pada pertengahan 1990-an di Bandung. Saat itu band-band independen (Indie) di Bandung berusaha menjual merchandise mereka seperti CD/kaset, t-shirt, dan sticker selain di tempat mereka melakukan pertunjukan. Bentuk awal distro adalah usaha rumahan dan dibuat etalase dan rak untuk menjual t-shirt. Selain komunitas musik, akhirnya banyak komunitas lain seperti komunitas punk dan skateboard yang kemudian juga membuat toko-toko kecil untuk menjual pakaian dan aksesori mereka. Kini, industri distro sudah berkembang, bahkan dianggap menghasilkan produk-produk yang memiliki kualitas ekspor. Pada tahun 2007 diperkirakan ada sekitar 700 unit usaha distro di Indonesia, dan 300 diantaranya ada di Bandung.</h3>
            </div>
            


        </div>

    </div>
    






</section>





