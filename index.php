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
                            <a class="nav-link" href="buku.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <?php
                                if($_SESSION ['level'] =='pengguna'){
                            ?>
                            <a class="nav-link" href="favorit.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-bookmark"></i></div>
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
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <?php
                                if($_SESSION ['level'] !='pengguna'){
                            ?>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body"><i class="fas fa-user fa-fw"></i> Data Pengguna
                                            <?php 
                                                echo mysqli_num_rows(mysqli_query($con,"SELECT*FROM user"));
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body"><i class="fa fa-book-open"></i> Jumlah Peminjaman
                                            <?php 
                                            echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM peminjaman"));
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="small text-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-body"><i class="fa fa-table"></i> Jumlah Kategori
                                            <?php 
                                            echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM kategoribuku"));
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="small text-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body"><i class="fas fa-comment"></i> Jumlah Ulasan
                                            <?php 
                                            echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM ulasanbuku"));
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="small text-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }?>
                                 <?php
                                if($_SESSION ['level'] =='pengguna'){
                                ?>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body"><i class="fa fa-book-open"></i> Jumlah Peminjaman
                                            <?php 
                                            echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM peminjaman WHERE userID='{$_SESSION['userID']}'"));
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="small text-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body"><i class="fa fa-book-open"></i> Buku Favorit
                                            <?php 
                                            echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM koleksipribadi WHERE userID='{$_SESSION['userID']}'"));
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="small text-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body"><i class="fas fa-comment"></i> Jumlah Ulasan 
                                            <?php 
                                            echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM ulasanbuku WHERE userID='{$_SESSION['userID']}'"));
                                            ?>
                                        </div>
                                        <div class="card-footer d_SESSION-flex align-items-center justify-content-between">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }?>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-secondary text-white mb-4">
                                        <div class="card-body"><i class="fa fa-book"></i> Jumlah Buku
                                            <?php 
                                                echo mysqli_num_rows(mysqli_query($con,"SELECT*FROM buku"))
                                            ?>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="container-fluid px-4">
                        <h3 class="mt-3">Informasi Pengguna</h3></div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-border">
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>alamat</th>
                                        <th>Level</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $_SESSION['username']?></td>
                                        <td><?php echo $_SESSION['email']?></td>
                                        <td><?php echo $_SESSION['alamat']?></td>
                                        <td><?php echo $_SESSION['level']?></td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </main>
            </div>
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