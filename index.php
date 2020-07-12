<?php
session_start();
//koneksi ke databse
include './admin/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Sicantik Store</title>
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
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Cari">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Cari</button>
      </form>
    </div>
  </nav>
  <!-- end navbar -->

  <!-- coba konten -->
  <section class="konten">
    <div class="container">
      <div class="row">

        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while ($perproduk = $ambil->fetch_assoc()) {; ?>
          <div class="col-12 col-sm-8 col-md-6 col-lg-3">
            <div class="card">
              <img class="card-img" src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt=" foto_produk">
              <div class="card-body">
                <h4 class="card-title"><?php echo $perproduk['nama_produk']; ?></h4>
                <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo provident porro molestiae,</p>
                <div class="buy d-flex justify-content-between align-items-center">
                  <div class="price text-success">
                    <h5 class="mt-4">Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                  </div>
                  <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary mt-3"><i class="fas fa-shopping-cart"></i> Beli</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- end coba konten -->



  <!-- Footer -->
  <footer">

    <!-- Copyright -->
    <div style="background-color:#F8F9FA;" class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> Sicantik.com</a>
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->



    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- end script -->
</body>

</html>