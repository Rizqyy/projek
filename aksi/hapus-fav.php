<?php
include '../koneksi.php';
    $id=$_GET['koleksiID'];
      
    function hapus($id){
        global $con;
        mysqli_query($con,"DELETE FROM koleksipribadi WHERE koleksiID=$id");
        return mysqli_affected_rows($con);
    }

    if(hapus($id)>0){
        header('location: ../favorit.php');
    
    }
?>