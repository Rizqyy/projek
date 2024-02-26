<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan Digital</title>
        <link rel="shortcut icon" href="assets/img/icon.jpg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Perpustakaan Digital</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group"></div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <?php
                                if($_SESSION ['level'] =='admin'){
                            ?>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Data Pengguna
                            </a>
                            <?php
                            }?>
                            <div class="sb-sidenav-menu-heading">Fitur</div>
                            <?php
                                if($_SESSION ['level'] !='pengguna'){
                            ?>
                            <a class="nav-link" href="kategori.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <?php
                            }?>
                            <a class="nav-link" href="peminjaman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Pinjam
                            </a>
                            <?php
                                if($_SESSION ['level'] =='pengguna'){
                            ?>
                            <a class="nav-link" href="favorit.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
                                Buku Favorit
                            </a>
                            <?php
                            }?>
                            <?php
                                if($_SESSION ['level'] !='pengguna'){
                            ?>
                            <a class="nav-link" href="ulasan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Ulasan
                            </a>
                            <?php
                            }?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">Login :
                        <h5><?php echo $_SESSION['nama_lengkap']?></h5>
                    </div>
                </nav>
            </div>
        <!-- fitur utama -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-3">Daftar Buku</h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    if($_SESSION ['level'] !='pengguna'){
                                ?>
                                <a href="tambah-buku.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Buku</a>
                                <?php
                                }?>
                            </div>
                            <div class="row m-4">
                                <?php
                                    $judul=mysqli_query($con, "SELECT * FROM buku order by bukuID asc"); 
                                    while($buku=mysqli_fetch_array($judul)){
                                ?>
                                <div class="card m-4" style="width: 14rem;">
                                <img src="assets/img/<?php echo $buku['foto'];?>" class="cart-img-top">
                                    <div class="card-body">
                                        <h5 class="cart-title"><?php echo $buku['judul'];?></h5>
                                        <a class="btn btn-outline-secondary" href="detail.php?bukuID=<?php echo $buku['bukuID']?>">Detail Buku</a>
                                    <?php
                                        if($_SESSION ['level'] =='pengguna'){
                                    ?>
                                        <a class="btn btn-outline-success" href="tambah-pinjam.php?bukuID=<?php echo $buku['bukuID']?>">Pinjam</a>
                                        <a class="btn btn-outline-success" href="aksi/tambah-fav.php?bukuID=<?php echo $buku['bukuID']?>"><i class="fa fa-bookmark"></i></a>
                                    <?php
                                    }?>
                                    <?php
                                        if($_SESSION ['level'] !='pengguna'){
                                    ?>
                                        <a class="btn btn-outline-danger" href="aksi/hapus-buku.php?bukuID=<?php echo $buku['bukuID']?>" onclick="return confirm('Apakah Anda Ingin Menghapus Buku Tersebut?')">Delete</a>
                                    <?php
                                    }?> 
                                    </div>
                                </div>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>  
            </main>     
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>