<?php
    session_start();
    //if(isset($_COOKIE['pass'])&&isset($_COOKIE['user'])){
    if(isset( $_SESSION["loged"])&&$_SESSION['loged']){
        $_SESSION["loged"] = false;
        //setcookie("user", "", time() - 3600);
        //setcookie("pass", "", time() - 3600);
        echo "<script type='text/javascript'>alert('Đăng xuất thành công')</script>";
        header('Location:../index.php');
    }


?>