<?php include 'koneksi.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Nota Pemesanan</title>
	 <link rel="stylesheet"  href="assets/bootstrap/css/bootstrap.min.css">
	  <style type="text/css">
    .navbar-inverse {background: #353b48;
        font color: #ffffff;}
</style>
</head>
<body style="background-color: #bdc3c7">
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
   <div class="collkapse navbar-collapse" id="#naff">
        <ul class="nav navbar-nav" >
        <li><a href="index.php"><font color="#fffff">Home</a></li></font>
        <li><a href="produk.php"><font color="#fffff">produk</a></li></font>
        <li><a href="pemesanan.php"><font color="#fffff">Pemesanan</a></li></font>
        <li><a href=""><font color="#fffff">Profil</a></li></font>
        <li><a href="carapesan.php"><font color="#fffff">Cara pemesanan</a></li></font>
        <li><a href="checkout.php"><font color="#fffff">CheckOut</a></li></font>
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
</nav>

<section class="konten">
	<div class="container">
		

<h2>Nota Pemesanan</h2>
<br>

<?php
$ambil = $koneksi->query("SELECT * FROM pemesanan JOIN pelanggan
	ON pemesanan.id_pelanggan=pelanggan.id_pelanggan
	WHERE pemesanan.id_pemesanan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>






<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian: <?php echo $detail['id_pemesanan']; ?> </strong><br>
		Tanggal: <?php echo $detail['tanggal_pemesanan']; ?> <br>
		Total  : <?php echo number_format($detail['total_pemesanan']) ?>

	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<p>
	     <?php echo $detail['telepon']; ?> <br>
	     <?php echo $detail['email']; ?> 
     </p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota']; ?></strong> <br>
		Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']) ?> <br>
		Alamat      : <?php echo $detail['alamat_pengiriman'] ?>

	</div>



</div>





<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama produk</th>
			<th>Harga</th>
			<th>Panjang</th>
			<th>Jumlah</th>
			
			<th>Subtotal</th>

		</tr>
	</thead>
	<tbody>
	 <?php $nomor=1; ?>
     <?php  $ambil=$koneksi->query("SELECT * FROM pembelian_baju WHERE id_pemesanan='$_GET[id])'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ 
			?>
<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_baju']; ?> </td>
			<td>Rp. <?php echo number_format($pecah['harga_baju']); ?> </td>
			<td><?php echo $pecah['panjang']; ?> Cm </td>
			<td><?php echo $pecah['jumlah']; ?> </td>
			
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
			
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				silahkan melakukan pembayaran  Rp. <?php echo number_format($detail['total_pemesanan']); ?> ke <br>
				<strong>BANK NAGARI 137-001088-3276 AN. ZEVTU</strong>
				<br>
				<br>
				Silahkan cetak nota ini!!! <br>
				dan kirim ke alamat email kami: <strong>TokoBajuDistro@gmail.com</strong>
			</p>
			<a href="javascript:window.print()" class="btn btn-success">Print </a></div></div></div></div></section></body></html>