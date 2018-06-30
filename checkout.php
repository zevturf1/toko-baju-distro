<?php
session_start();
//koneksi ke database
include 'koneksi.php';





// jika tidak ada session pelanggan(blm login,.) mk dilarikan ke login php
if (!isset($_SESSION["pelanggan"]))
 {
	echo "<script>alert('anda belum login (silahkan login dulu)');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet"  href="assets/bootstrap/css/bootstrap.min.css">
    <style type="text/css">
    .navbar-inverse {background: #353b48;
        font color: #ffffff;}
</style>

</head>
<body style="background-color: #bdc3c7">
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
         <a href="" class="navbar-brand"><font color="#fffff">Rumah baju</a></font>
    </div>
   <div class="collkapse navbar-collapse" id="#naff">
        <ul class="nav navbar-nav" >
        <li><a href="index.php"><font color="#fffff">Home</a></li></font>
        <li><a href="produk.php"><font color="#fffff">produk</a></li></font>
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
</nav>
<section class="konten">
    <div class="container">
        <h1>CheckOut Produk</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
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
                   
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$Subharga; ?>
            <?php endforeach ?>
            </tbody>
            <tfoot>
                  <tr>
                      <th colspan="4">Total Belanja</th>
                      <th>Rp.  <?php echo number_format($totalbelanja) ?></th>

                  </tr>

            </tfoot>
        </table>
     
      <form method="post">
        
         <div class="row">
            <div class="col-md-4"><div class="form-group">
            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control"> 
         </div></div>
            <div class="col-md-4"><div class="form-group">
            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon'] ?>" class="form-control"> 
         </div></div>
            <div class="col-md-4">
                <select class="form-control" name="id_ongkir">
                    <option value="">Pilih ongkos kirim</option>

                    <?php
                    $ambil = $koneksi->query("SELECT * FROM ongkir");
                    while($perongkir = $ambil->fetch_assoc()){

                    ?>
                    <option value="<?php echo $perongkir["id_ongkir"] ?>">
                        <?php echo $perongkir['nama_kota'] ?> -
                        Rp. <?php echo number_format($perongkir['tarif']) ?> 



                    </option>
                    <?php }?>
               


                </select>
            </div>
             


         </div>
         <div class="form-group">
             <label>Alamat Lengkap Pengiriman</label>
            <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Alamat Lengkap Pengiriman(beserta kode pos)" ></textarea>  



         </div>


         <button class="btn btn-primary" name="checkout">Checkout</button>


      </form>

      <?php 
       if (isset($_POST["checkout"]))
       {
        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $id_ongkir = $_POST["id_ongkir"];
        $tanggal_pemesanan = date("y-m-d");
        $alamat_pengiriman = $_POST['alamat_pengiriman'];


        $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
        $arrayongkir = $ambil->fetch_assoc();
        $nama_kota = $arrayongkir['nama_kota'];
        $tarif = $arrayongkir['tarif'];


        $total_pemesanan = $totalbelanja + $tarif;

        // 1. menyimpan data ka tabel pemesanan
        $koneksi->query("INSERT INTO pemesanan(
            id_pelanggan,id_ongkir,tanggal_pemesanan,total_pemesanan,nama_kota,tarif,alamat_pengiriman)VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pemesanan','$total_pemesanan','$nama_kota','$tarif','$alamat_pengiriman') ");

        // mendapekan id pemesanan yang baru tajadi

            $id_pemesanan_barusan = $koneksi->insert_id;

            foreach ($_SESSION["pemesanan"] as $id_baju => $jumlah) {

               // mendapatkan data produk berdasarkan id_baju
                $ambil=$koneksi->query("SELECT * FROM produk_baju WHERE id_baju='$id_baju'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_baju'];
                $harga = $perproduk['harga_baju'];
                $panjang = $perproduk['panjang'];

                $subpanjang = $perproduk['subpanjang']*$jumlah;
                $subharga  = $perproduk['harga_baju']*$jumlah;



                 $koneksi->query("INSERT INTO pembelian_baju(id_pemesanan,id_baju,nama_baju,harga_baju,panjang,subpanjang,subharga,jumlah)VALUES ('$id_pemesanan_barusan','$id_baju','$nama','$harga','$panjang','$subpanjang','$subharga','$jumlah') ");
            }
          
          //mengkosongkan sesi pemesanan/ keranjang
            
            unset($_SESSION["pemesanan"]); 





          // tampilan di larian ka halaman nota , nota dari pembalian yang barusan
          echo "<script>alert('pemesanan sukses');</script>"; 
          echo "<script>location='nota.php?id=$id_pemesanan_barusan';</script>";     


       }

      ?>


    </div>
    

</section>




<hr>




</body>
</html>