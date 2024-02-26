<?php
    include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link rel="shortcut icon" href="assets/img/icon.jpg" type="image/x-icon">
</head>
<body>
<h3 align="center">Laporan Peminjaman</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Judul Buku</th>
            <th>Kode Pinjam</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Jumlah</th>
        </tr>
        <?php
            $lap=mysqli_query($con, "SELECT * FROM peminjaman JOIN user on user.userID=peminjaman.userID JOIN buku on buku.bukuID=peminjaman.bukuID"); 
            $no=0;
            while($data=mysqli_fetch_array($lap)){
            $no++;
        ?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $data['nama_lengkap']?></td>
            <td><?php echo $data['judul']?></td>
            <td><?php echo $data['kode_peminjaman']?></td>
            <td><?php echo $data['tanggal_peminjaman']?></td>
            <td><?php echo $data['tanggal_pengembalian']?></td>
            <td><?php echo $data['status']?></td>
            <td><?php echo $data['jumlah']?></td>
        </tr>
        <?php
            }?>
    </table>
    <script>
        window.print();
        setTimeout(function() {
            window.close();
        }, 10);
    </script>
</body>
</html>