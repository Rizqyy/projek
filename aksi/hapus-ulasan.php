<?php
include '../koneksi.php';
    $id=$_GET['ulasanID'];
      
    function hapus($id){
        global $con;
        mysqli_query($con,"DELETE FROM ulasanbuku WHERE ulasanID=$id");
        return mysqli_affected_rows($con);
    }

    if(hapus($id)>0){
        echo"<script>
            alert('Ulasan Berhasil Dihapus!!');
            document.location.href='../buku.php';
        </script>";
    
    }
?>