<?php
session_start();
include './admin/koneksi.php';
if (empty($_SESSION["keranjang"]) or !isset($_SESSION['keranjang'])) {
    echo "<script>alert('keranjang kosong silahkan belanja dulu');</script>";
    echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sicantik Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="keranjang.php">Keranjang</a>
                </li>

                <!-- jk sudah login(anda session pelanggan) -->
                <?php if (isset($_SESSION["pelanggan"])) : ?>
                    <li><a class="nav-link" href="logout.php">Logout</a></li>
                    <!-- selanjutnya (blm login | blm ada session pelanggan) -->
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php">Checkout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end navbar -->





    <section class="konten">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>SubHarga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <!-- menampilkan produk yg sedang diperulangkan berdasarkan id_produk -->
                        <?php $ambil = $koneksi->query("SELECT * FROM produk 
                WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"] * $jumlah;

                        ?>
                        <tr>

                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?></td>
                            <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td>
                                <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-outline-danger">hapus</a>


                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>

            <a href="index.php" class="btn btn-outline-primary"> Lanjutkan Belanja </a>
            <a href="checkout.php" class="btn btn-outline-success">Checkout </a>
        </div>
    </section>

</body>

</html>