<?php
session_start();
//koneksi ke database
include 'koneksi.php';
//mendapatkan id produk dari url
$id_produk = $_GET["id"];
//query ambil data
$ambil = $koneksi->query("SELECT * FROM produk_baju WHERE id_baju='$id_produk'");
$detail = $ambil->fetch_assoc();

 



?>
<!DOCTYPE html>
<html>
<head>
    <title>Rumah baju Pandai Sikek</title>

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


<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
           <img src="foto_produk/<?php echo $detail["foto"] ; ?>" alt="" class="img-responsive">;  
             
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail["nama_baju"] ?></h2>
                <h4>Rp. <?php echo number_format($detail["harga_baju"]); ?></h4>
                
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" min="1"  class="form-control " name="jumlah">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="pesan">Pesan now</button>
                                

                            </div>
                            


                        </div>


                    </div>



                </form>

                <?php 
              //jika ada tombol beli
                if (isset($_POST["pesan"]))
                {
                    //mendapatkan jumlah yang di inputkan
                    $jumlah = $_POST["jumlah"];
                    //masukan di pemesaanan 
                    $_SESSION["pemesanan"][$id_produk] = $jumlah;

                    echo "<script>alert('produk telah masuk ke pemesanan');</script>";
                    echo "<script>location='pemesanan.php';</script>";





                }








                ?>


                <p><?php echo $detail["keterangan"]  ;?></p>
             
                



            </div>
            


        </div>

    </div>
    






</section>
