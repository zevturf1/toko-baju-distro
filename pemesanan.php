<?php
session_start();
//koneksi ke database
include 'koneksi.php';
if (empty($_SESSION["pemesanan"]) OR  !isset($_SESSION["pemesanan"]))
 {
    echo "<script>alert('silahkan pesan barang dulu');</script>";
    echo "<script>location='produk.php';</script>";
}

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
<section class="konten">
	<div class="container">
		<h1>Pemesanan Produk</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr >
					<th >no</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<body>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["pemesanan"] as $id_baju => $jumlah): ?>
					<!-- menampilkan produk yg sedang diperulangkan berdasarkan id produk -->
					<?php
					$ambil = $koneksi->query("SELECT * FROM produk_baju WHERE id_baju='$id_baju'");
					$pecah = $ambil->fetch_assoc();
					$Subharga = $pecah["harga_baju"]*$jumlah;
			        ?>	
				
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_baju"]; ?></td>
					<td>Rp.<?php echo number_format($pecah["harga_baju"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp.<?php echo number_format($Subharga); ?></td>
					<td>
						<a href="hapuspemesanan.php?id=<?php echo $id_baju ?>" class="btn btn-danger btn-xs">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
			<?php endforeach ?>
			</body>
		</table>
		<a href="produk.php" class="btn btn-success">Pesan lagi </a>
		<a href="checkout.php" class="btn btn-primary">CheckOut </a>
	</div>
	

</section>






<!-- panggil jquery,bootstrap.js dan owlcarousel.js -->
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/owlcarousel/owl.carousel.min.js"></script>





</body>
</html>