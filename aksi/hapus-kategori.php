<?php
include '../koneksi.php';
    $id=$_GET['kategoriID'];
      
    function hapus($id){
        global $con;
        mysqli_query($con,"DELETE FROM kategoribuku WHERE kategoriID=$id");
        return mysqli_affected_rows($con);
    }

    if(hapus($id)>0){
        echo"<script>
            alert('Kategori Berhasil Dihapus!!');
            document.location.href='../kategori.php';
        </script>";
    
    }
?>