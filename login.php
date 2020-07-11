<?php
session_start();
include './admin/koneksi.php';
?>
<!DOCTYPE html>
<html>
<<head>
  <title>Login Pelanggan</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-default">
    <div class="container">

        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <!-- jk sudah login(anda session pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])): ?>
            <li><a href="logout.php">Logout</a></li>
            <!-- selanjutnya (blm login | blm ada session pelanggan) -->
            <?php else: ?> 
                <li><a href="login.php">Login</a></li>
            <?php endif ?>           
            <li><a href="checkout.php">Checkout</a></li>
            </ul>
    </div>
  </nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Login Pelanggan</h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary" name="login">login</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php
    //jika ada tombol login (tombol simpan ditekan)
    if (isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        //lakukab query negcek akun di tabel pelanggan di db
        $ambil = $koneksi->query("SELECT * FROM pelanggan 
        WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    //itung akun yg terambil
    $akunygcocok = $ambil->num_rows;
    //jika 1 akun yag cocok , mk diloginkan 
    if($akunygcocok==1)
    {
        //anda sudah login 
        //mendapatkan akun dlm bentuk array 
        $akun=$ambil->fetch_assoc();

        //simpan di session pelanggan
        $_SESSION["pelanggan"]=$akun;
        echo "<script>alert('anda sukses login');</script>";
        echo "<script>location='checkout.php';</script>";
    }
    else
    {
        //anda gagak login 
        echo "<script>alert('anda gagal login, perikasa akun anda');</script>";
        echo "<script>location='login.php';</script>";
    }
    }
?>
</body>
</html>
