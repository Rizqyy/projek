<?php
  include "../koneksi.php";
  if(isset($_POST['submit'])){
      $kategori = mysqli_real_escape_string($con,$_POST['kategoriID']);
      $foto = mysqli_real_escape_string($con,$_POST['foto']);
      $judul = mysqli_real_escape_string($con,$_POST['judul']);
      $penulis = mysqli_real_escape_string($con,$_POST['penulis']);
      $penerbit = mysqli_real_escape_string($con,$_POST['penerbit']);
      $tahun_terbit = mysqli_real_escape_string($con,$_POST['tahun_terbit']);
      $sinopsis = mysqli_real_escape_string($con,$_POST['sinopsis']);
      $stok = mysqli_real_escape_string($con,$_POST['stok']);
      
      $input = mysqli_query($con, "INSERT INTO buku(kategoriID, foto, judul, penulis, penerbit, tahun_terbit, sinopsis, stok) VALUES 
              ( '$kategori','$foto','$judul','$penulis','$penerbit','$tahun_terbit','$sinopsis','$stok')");
      if(!empty($input)){
        echo '<script>
              alert("Tambah Buku Berhasil");
              window.location = "../buku.php";
              </script>';
      }
  }  
?>