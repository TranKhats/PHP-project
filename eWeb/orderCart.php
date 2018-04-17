<?php
    require_once "connect.php";
    session_status();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $sexErr='';
        $sex="";
        if(!isset($_POST['sex'])){
            $sexErr="Bạn phải chọn danh xưng";
        }
        else{
            $sex=$_POST['sex'];
        }
        $name="";
        $nameErr="";
        if(empty($_POST['name'])){
            $nameErr="Bạn phải nhập tên";
        }
        else{
            $name=$_POST['name'];
        }
        $phone=$_POST["phone"];
        $phoneErr="";
        if(empty($phone)||!is_numeric($phone)||strlen($phone)<9){
            $phoneErr="Số điện thoại được nhập không đúng";
        }
        else{
            if($conn->query("select TENKH from KHACHHANG where MAKH='$phone'")->fetch_array()[0]["TENKH"]!=$name){
                $phoneErr="Số điện thoại này đã được dùng";
            }
        }
        if(!(empty($nameErr)&&empty($phoneErr)&&empty($sexErr))){
            // $idCus=$connect->query("select MAKH from KHACHHANG where MAKH='$phone'").num_rows;
            if($conn->query($conn->query("select TENKH from KHACHHANG where MAKH='$phone'")->num_rows==0)){//kiem tra khach hang da ton tai
                $conn->query("INSERT INTO KHACHHANG (`MAKH`, `TENKH`, `SDT`, `PHAI`) 
                            VALUES ('$phone', '$name', '$phone', '$sex')");
            }
            //Them moi mot session
            $newIDSession=session_id();
            $conn->query("INSERT INTO GIAODICH (`MAGD`, `TIME`, `MAKH`) VALUES ('$newIDSession', '".date()."', '$phone')");
            //Them moi  1 order
            $newIDOrder=$conn->query("select MAORDER from order")->num_rows;
            $conn->query("INSERT INTO ORDER (`MAORDER`, `MAGD`) VALUES ('$newIDOrder', '$newIDSession')");
            //Them moi mot CHITETORDER
            foreach($_SESSION["cart"] as $key->val){
                $newDetailed=$conn->query("select MA_CHITIETORDER from CHITIET_ORDER")->num_rows;
                $conn->query("INSERT INTO CHITIET_ORDER (`MA_CTORDER`, `MAORDER`, `MASP`, `SOLUONGSP`) 
                VALUES ('$newDetailed', '$newIDOrder', '$key', '$val')");    
            }
        }
    }
?>