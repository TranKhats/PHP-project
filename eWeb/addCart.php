<?php
    require_once "connect.php";
    session_start();
    // session_unset();
    // session_destroy();
    $active=300;//set time cho session
    // if(!isset($_SESSION["timeOut"])){
    //     $_SESSION["timeOut"]=time();
    // }
    // else{
    //     $duration=time()-(int)$_SESSION["timeOut"];
    //     if($duration>$active){
    //         session_unset();
    //         session_destroy();
    //         $_SESSION["timeOut"]=time();
    //     }
    // }
    if(!isset($_SESSION['totalPrice'])){
        $_SESSION['totalPrice']=0;
    }
    if(isset($_GET["id"])){//kiem tra MASP co duoc goi ko
        $id=$_GET["id"];
        $check=$conn->query("select MASP from SANPHAM where MASP='$id'");
        if(count($check)==1){//kiem  tra SP co trong ds SanPham
            if(isset($_SESSION["cart"][$id])){
                $_SESSION["cart"][$id]++;
            }
            else{
                $_SESSION["cart"][$id]=1;
            }
        }
        header("Location:showCart.php");
    }
    else{
        header("Location:index.php");
    }
?>