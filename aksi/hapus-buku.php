<?php
include '../koneksi.php';
    $id=$_GET['bukuID'];
      
    function hapus($id){
        global $con;
        mysqli_query($con,"DELETE FROM buku WHERE bukuID=$id");
        return mysqli_affected_rows($con);
    }

    if(hapus($id)>0){
        echo"<script>
            alert('Buku Berhasil Dihapus!!');
            document.location.href='../ulasan.php';
        </script>";
    
    }
?>