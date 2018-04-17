<?php

        include 'showManyProduct.php';
        $x=$_GET['keysearch'];
        searchResult();
        function searchResult(){
            $end=false;
            $query="SELECT MASP,TENSP FROM SANPHAM where TENSP like '%".$_GET['keysearch']."%'";
            getProductByQuery($query,$end);
        }


        
?>