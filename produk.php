<?php
session_start();
//koneksi ke database
include 'koneksi.php';


?>
<!DOCTYPE html>
<html>
<head>
    <title>Toko Baju Distro</title>

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
        <li><a href="carapesan.php"><font color="#fffff">Cara pesan</a></li></font>
       
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
<!-- konten -->
<section class="content">
    <div class="container">
    	<h3>Produk Terbaru</h3>
       
        <div class="row">
           
             <?php $ambil = $koneksi->query("SELECT * FROM produk_baju");?>
            <?php while($perproduk = $ambil->fetch_assoc()){ ?>
            <div  class="col-md-3">
              
                <div class="thumbnail">
                    <img src="foto_produk/<?php echo $perproduk['foto']; ?>" alt="">
                    <div class="caption">
                        <h3><?php echo $perproduk['nama_baju'];?></h3>
                        <h5>Rp. <?php echo number_format($perproduk['harga_baju']);?></h5>
                        <a href="pesan.php?id=<?php echo $perproduk['id_baju']; ?>" class="btn btn-primary">Pesan</a>
                        <a href="detailproduk.php?id=<?php echo $perproduk['id_baju']; ?>" class="btn btn-success">Detail</a>
                        
                    </div>
                </div>
             </div>
             <?php } ?>
              </div>
</section>
</div>
    
</footer>

</footer>

<!-- panggil jquery,bootstrap.js dan owlcarousel.js -->
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/owlcarousel/owl.carousel.min.js"></script>





</body>
</html>


