<?php
include '../koneksi.php';
    $id=$_GET['userID'];
      
    function hapus($id){
        global $con;
        mysqli_query($con,"DELETE FROM user WHERE userID=$id");
        return mysqli_affected_rows($con);
    }

    if(hapus($id)>0){
        echo"<script>
            alert('Data Berhasil Dihapus!!');
            document.location.href='../user.php';
        </script>";
    
    }
?>