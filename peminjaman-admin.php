<?php
    include "koneksi.php";
    if(!isset($_SESSION['user']) || $_SESSION['level'] != 'pengguna'){
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
                        <h1 class="mt-3">Data Pinjam</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php
                                if($_SESSION ['level'] =='pengguna'){
                            ?>
                                <div class="col-md-12">
                                  <a href="Buku.php" class="btn btn-primary mb-4"><i class="fa fa-plus"></i> Pinjam Buku</a>
                                </div>
                            <?php
                            }?>
                                <div class="col-md-12">  
                                    <a href="riwayat-peminjaman.php" class="btn btn-primary"><i class="fa fa-print"></i>Laporan</a>   
                                </div>
                            <!-- kolom pencarian -->
                            <?php
                                if($_SESSION ['level'] !='pengguna'){
                            ?>
                            <form method="GET" action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="search" placeholder="cari berdasarkan kode pinjam...">
                                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                                </div>
                            </form>
                            <?php
                            }?>
                                <table class="table table-border">
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Judul Buku</th>
                                        <th>Kode Pinjam</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                    <?php
                            $search = isset($_GET['search']) ? $_GET['search'] : '';
                            // Perform a query based on the search term
                            $query = "SELECT * FROM peminjaman JOIN user ON user.userID = peminjaman.userID JOIN buku ON buku.bukuID = peminjaman.bukuID";
                            if (!empty($search)) {
                                $query .= " WHERE kode_peminjaman LIKE '%$search%'";
                            }
                            $query .= " ORDER BY peminjamanID ASC";
                            $result = mysqli_query($con, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $no = 0;
                                while ($data = mysqli_fetch_array($result)) {
                                    $no++;
                        ?>
                        <tr>
                            <td><?php echo $no?></td>
                            <td><?php echo $data['username']?></td>
                            <td><?php echo $data['judul']?></td>
                            <td><?php echo $data['kode_peminjaman']?></td>
                            <td><?php echo $data['tanggal_peminjaman']?></td>
                            <td><?php echo $data['tanggal_pengembalian']?></td>
                            <td><?php echo $data['status']?></td>
                            <td><?php echo $data['jumlah']?></td>
                            <?php
                                if($_SESSION['level'] != 'pengguna'){
                                    if($data['status'] == 'pinjam'){
                            ?>
                            <td><a class="btn btn-success" href="ubah-pinjam.php?peminjamanID=<?php echo $data['peminjamanID']?>">Kembali Buku</a>
                            <?php
                                }
                            }?>
                        </tr>
                        <?php
                                }
                            } else {
                                echo "<tr><td colspan='9'>Data tidak ditemukan</td></tr>";
                            }
                        ?>
                                </table>
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