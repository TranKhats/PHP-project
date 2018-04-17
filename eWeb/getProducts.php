<?php
        require_once 'connect.php';
        require_once 'showManyProduct.php';
        $end=false;
        getProductByQuery("SELECT MASP,TENSP FROM SANPHAM",$end);

        
?>