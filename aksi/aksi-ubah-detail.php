<?php
    if(isset($_GET["bukuID"])){
        include "../koneksi.php";
        $id = $_GET['bukuID'];
        $kategori = $_POST['kategori'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $sinopsis = $_POST['sinopsis'];
        $foto = $_POST['foto'];
        
        $ubah = mysqli_query($con, "UPDATE buku set kategoriID='$kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', sinopsis='$sinopsis', foto='$foto' WHERE bukuID='$id'");
        
        if(!empty($ubah)){
            echo"<script>
                alert('Data Berhasil Diubah!!');
                document.location.href='../buku.php';
            </script>";
        }
    }
?>