<?php
    include "../koneksi.php";
      $query = mysqli_query($con,"SELECT max(kode_peminjaman) as kodeTerbesar FROM peminjaman");
      $data = mysqli_fetch_array($query);
      $kodepinjam = $data['kodeTerbesar'];

      // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
      // dan diubah ke integer dengan (int)
      $urutan = (int) substr($kodepinjam, 3, 3);
      
      // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
      $urutan++;
      
      // membentuk kode barang baru
      // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
      // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
      // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
      $huruf = "KP";
      $kodepinjam = $huruf . sprintf("%03s", $urutan);

      $cart = @$_SESSION['cart'];
      foreach ($cart as $no=>$no_produk){
        $id = $_SESSION['userID'];
        $bukuID = $no_produk['bukuID'];
        $jumlah = (int) $no_produk['stok'];
        $tanggal_peminjaman = date('y-m-d');
        $tanggal_pengembalian = date('y-m-d', strtotime($tanggal_peminjaman.'+ 7 days'));
        mysqli_query($con, "INSERT INTO peminjaman(userID, bukuID, kode_peminjaman, tanggal_peminjaman, tanggal_pengembalian, jumlah)VALUES
                ('$id', '$bukuID', '$kodepinjam', '$tanggal_peminjaman', '$tanggal_pengembalian', '$jumlah')");
      }
      $peminjamanID = mysqli_insert_id($con);
      foreach ($cart as $no => $no_produk) {
        $bukuID = $no_produk['bukuID'];
        $jumlah = (int) $no_produk['stok'];
        mysqli_query($con, "INSERT INTO keranjang(peminjamanID, bukuID, jumlah)VALUES('$peminjamanID', '$bukuID', '$jumlah')");
      }
      unset($_SESSION['cart']);
      echo '<script>alert("Pinjam Buku Berhasil!!");location.href="../peminjaman.php"</script>';
?>