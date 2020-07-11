<?php
session_start();
//12 mendapatkan id produk id_produk dari url
$id_produk = $_GET['id'];
//jika sudah ada di keranjang maka roduk itu jumlahnya +1
if (isset($_SESSION['keranjang'][$id_produk])) {
  $_SESSION['keranjang'][$id_produk]+= 1;
}
// selain itu (blm ada di kerangjang) mk produk dianggap dibeli1
else {
  $_SESSION['keranjang'][$id_produk] = 1;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>