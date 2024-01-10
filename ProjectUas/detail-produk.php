<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email,admin_address FROM tb_admin
   WHERE admin_id = 1");

$a = mysqli_fetch_object($kontak);   

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WarungWaska</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">WarungWastu</a></h1>
        <ul>
            <li><a href="produk.php">Produk</a></li>
        </ul>
        </div>
    </header>

    <!-- seacrh -->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search']?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <p>Deskripsi : <br>
                    <?php echo $p->product_descripion ?>
                    </p>
                    <p><i data-feather="phone"></i><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp?>&text=Hai, saya tertarik dengan produk anda." target="_blank">Hubungi Via WhatsApps</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="social">
            <a href="#"><i
             data-feather="instagram"></i></a>
            <a href="#"><i
             data-feather="twitter"></i></a>
            <a href="#"><i
             data-feather="facebook"></i></a>
        </div>
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>No. Hp</h4>
            <p><?php echo $a->admin_telp?></p>
        </div>

        <div class="credit">

            <p>Created by <a href="">Muhammad Rizki Hermawan</a>. | &copy; 2024</p>
        </div>
    </footer>
    <script>
          feather.replace();
        </script>
</body>
</html>
