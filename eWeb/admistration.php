<?php
        include_once 'validateAll.php';
        require_once 'connect.php';
        $dateErr=$amountErr=$idErr=$nameErr='';
        $message='123456789';
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
    
            $name=$idProduct='';
            if (isset($_POST['action'])&&$_POST['action']=='add') {
                if(isset($_POST['name-product'])&&!empty($_POST['name-product']))
                    $name=$_POST['name-product'];
                else
                    $nameErr='Không được để trống tên sản phẩm';
                $typeProduct=$_POST['type-product'];
                $producer=$_POST['type-product'];
                if(isset($_POST['amount'])&&is_numeric($_POST['amount']))
                    $amount=$_POST['amount'];
                else
                    $amountErr="Số lượng chưa nhập đúng";
                if(isset($_POST['date'])&&validateDate($_POST['date'],'d/m/Y'))
                    $import=$_POST['date'];
                else
                    $dateErr="Ngày không đúng";
                if(isset($_POST['id-update'])&&strlen($_POST['id-update'])>5||empty($_POST['id-update']))
                    $idErr="ID không được để trong hoặc quá  kí tự";
                else
                    $idProduct=$_POST['id-update'];
                if (empty($dateErr)&&empty($amountErr)&&empty($idErr)&&empty($nameErr)){
                        $conn->query("INSERT INTO `sanpham` (`MASP`, `TENSP`, `MALOAI`) VALUES ('$idProduct', '$name', '$typeProduct')");
                        $conn->query("INSERT INTO `nhapkho` (`NGAYNHAP`, `SOLUONG`, `MASP`) VALUES (STR_TO_DATE('".$import."', '%d/%m/%Y'), '".$amount."', '".$idProduct."')");
    
                        //header("Location:admin.php");
                        $message="Thêm sản phẩm thành công!";
    
                }
            }
            if(isset($_POST['action'])&&$_POST['action']=='delete'){
    
            }
        }
        error_reporting(0);
        echo json_encode($message);
           
?>