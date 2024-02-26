<?php
    if(isset($_GET["peminjamanID"])){
        include "../koneksi.php";
        $id = $_GET['peminjamanID'];
        $status = $_POST['status'];
        
        $ubah = mysqli_query($con, "UPDATE peminjaman set status='$status' WHERE peminjamanID='$id'");

        if(!empty($ubah)){
            header('location: ../peminjaman.php');
        }
    }
?>