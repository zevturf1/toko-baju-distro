<?php
session_start();
// mendapatkan id_produk dari url
$id_baju = $_GET['id'];


//  jika sudah ada produk itu di pemesanan, maka produk itu jumlah nya di +1
if(isset($_SESSION['pemesanan'][$id_baju]))
{

	$_SESSION['pemesanan'][$id_baju]+=1;
}
// selain itu (blm ada di pemesanan), maka produk di anggap beli 1
else
{

	$_SESSION['pemesanan'][$id_baju] = 1;
}

 //echo "<pre>";
 //print_r($_SESSION);
 //echo "</pre>";

//larikan ke halaman pemesanan
echo "<script>alert(' produk telah ada di pemesanan');</script>";
echo "<script>location='pemesanan.php';</script>";





 ?>