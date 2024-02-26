<?php
    include "../koneksi.php";
    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($con,$_POST['email']);
        $pass = md5 ($_POST['pass']);

        $cekemail=mysqli_query($con,"SELECT * FROM user where email='$email' ") or die(mysqli_error());
        $cekpass=mysqli_query($con,"SELECT * FROM user where password='$pass' ") or die(mysqli_error());
        if(mysqli_num_rows($cekemail)==0){
            echo '<script>
            alert("Email salah!!!");
            window.location = "../login.php";
            </script>';
            
            }else if(mysqli_num_rows($cekpass)==0){
            echo '<script>
                alert("Password salah!!!");
                window.location = "../login.php";
                </script>';
        } else if(mysqli_num_rows($cekemail)>0){
            $login=mysqli_fetch_array($cekemail);
            $_SESSION['user']=true;
            $_SESSION['userID']=$login['userID'];
            $_SESSION['username']=$login['username'];
            $_SESSION['nama_lengkap']=$login['nama_lengkap'];
            $_SESSION['email']=$login['email'];
            $_SESSION['alamat']=$login['alamat'];
            $_SESSION['level']=$login['level'];
            echo '<script>
            alert("selamat Datang Kembali");
            window.location = "../index.php";
            </script>';
        } 
} 
?>