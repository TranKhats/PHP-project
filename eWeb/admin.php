<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/index.js"></script>
    <title>Admistration</title>
    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="css/bootstrap-iso.css" />
    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
</head>
<?php

    include_once 'validateAll.php';
    require_once 'connect.php';
    $allType=$conn->query('select MALOAI,TENLOAI from LOAISANPHAM');
    $allProducers=$conn->query('select * from NHASANXUAT');
    $allProducts=$conn->query("select nk.MASP,s.TENSP,TENLOAI,sum(SOLUONG) as TSNHAP,ifnull(SLBAN,0) as SLDABAN,l.MALOAI,nsx.MANSX,TENNSX from 
	(select s.MASP,sum(SOLUONGSP)+tb.SLCOMBO as  SLBAN
	from CHITIET_ORDER cto,SANPHAM s,(SELECT s.MASP, (SELECT COUNT(*) 
	FROM CHITIETCOMBO o WHERE s.MASP=o.MASP) AS SLCOMBO FROM SANPHAM s) as tb
	where s.MASP=cto.MASP and tb.MASP=s.MASP
	group by s.MASP) as temp
    right join NHAPKHO nk
    on nk.masp=temp.masp
    inner join SANPHAM s
    on nk.MASP=s.MASP
    inner join LOAISANPHAM l
    on s.MALOAI=l.MALOAI
    inner join NHASANXUAT nsx
    on l.MANSX=nsx.MANSX
    group by nk.MASP,s.TENSP,TENLOAI,l.MALOAI,nsx.MANSX,TENNSX");
    $dateErr=$amountErr=$idErr=$nameErr='';
    $message='123456789';
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $name=$idProduct='';
        if(isset($_POST['id-update'])&&strlen($_POST['id-update'])>5||empty($_POST['id-update']))
            $idErr="ID không được để trống trong hoặc quá 5 kí tự";
        else
            $idProduct=$_POST['id-update'];
            $typeProduct=$_POST['type-product'];
        //--------------Insert-----------------------
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

            if (empty($dateErr)&&empty($amountErr)&&empty($idErr)&&empty($nameErr)){
                if($conn->query("select * from SANPHAM where MASP='".$idProduct."'")->num_rows==0){
                    $conn->query("INSERT INTO `sanpham` (`MASP`, `TENSP`, `MALOAI`) VALUES ('$idProduct', '$name', '$typeProduct')");     
                }
                $conn->query("INSERT INTO `nhapkho` (`NGAYNHAP`, `SOLUONG`, `MASP`) VALUES (STR_TO_DATE('".$import."', '%d/%m/%Y'), '".$amount."', '".$idProduct."')");
                $message="Thêm sản phẩm thành công!";
                echo "<script type='text/javascript'>alert('".$message."') </script>";
                header("Location:admin.php");
            }
            //echo "<script type='text/javascript'>alert('".$message."') </script>";
        }
        //---------------------Delete--------------------------
        if(isset($_POST['action'])&&$_POST['action']=='delete'){
            if(empty($idErr)){
                if($conn->query("select * from SANPHAM where MASP='".$idProduct."'")->num_rows==1){
                    if($conn->query("select * from CHITIET_ORDER where MASP='".$idProduct."'")->num_rows>0||
                    ($conn->query("select * from CHITIETCOMBO where MASP='".$idProduct."'")->num_rows>0)){
                    echo "<script type='text/javascript'>alert('Sản phẩm này đang được dùng trong gio hàng') </script>";
                    }
                    else{
                        try{
                            $conn->query("delete from NHAPKHO where MASP='".$idProduct."'");
                            $conn->query("delete from SANPHAM where MASP='".$idProduct."'");
                            header('Location:admin.php');
                        }catch(Exception $e){
                            echo "<script type='text/javascript'>alert('Lỗi hệ thống') </script>";

                        }
                    }
                }
                else {
                    echo "<script type='text/javascript'>alert('Sản phẩm không tồn tại') </script>";
                }
            }
        }
        if(isset($_POST['action'])&&$_POST['action']=='update'){
            if(isset($_POST['name-product'])&&!empty($_POST['name-product']))
                $name=$_POST['name-product'];
            else
                $nameErr='Không được để trống tên sản phẩm';
            if (empty($idErr)&&empty($nameErr)){
                if($conn->query("select * from SANPHAM where MASP='".$idProduct."'")->num_rows==1){
                    $x="UPDATE `sanpham` SET `TENSP`='".$name."', `MALOAI`='".$typeProduct."' WHERE `MASP`='".$idProduct."'";
                    $conn->query("UPDATE `sanpham` SET `TENSP`='".$name."', `MALOAI`='".$typeProduct."' WHERE `MASP`='".$idProduct."'");
                    header("Location:admin.php");
                }
                else{
                    echo "<script type='text/javascript'>alert('Mã Sản phẩm không tồn tại') </script>";
                }
            }
        }
    }


?>
<body>
    <?php
        include_once 'header.php';
    ?>
    <nav style="background: none;">
        <div class="container">
            <ul id="admin-menu">
                <li>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Tài khoản</span>
                </li>
                <li>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span>Cài đặt</span>
                </li>
                <li>
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    <span>Sản phẩm</span>
                </li>
                <li>
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    <span>Giỏ hàng</span>
                </li>
            </ul>
        </div>
    </nav>
    <section id="update-product">
        <div class="container">
            <div id="messageBox" style=""><?php echo $message ?></div>
            <form action="admin.php" method="POST">
                <div class="left">
                    <label>
                        <span>Tên sản phẩm:</span>
                        <input type="text" name="name-product" class="name-product-update">
                    </label>
                    <label class='erro'><?php echo $nameErr ?></label>
                    <label class='type-product'>
                        <span>Loại sản phẩm:</span>
                        <select name="type-product" class="type-product-update">
                            <?php
                                while($typeRow=$allType->fetch_assoc()){
                                    echo "<option value='".$typeRow['MALOAI']."'>".$typeRow['TENLOAI']."</option>";                                    
                                }
                            ?>
                        </select>
                        <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                    </label>
                    <label class='producer'>
                        <span>Nhà cung cấp:</span>
                        <select name="producer" class="producer-update">
                            <?php
                                while($producerRow=$allProducers->fetch_assoc()){
                                    echo "<option value='".$producerRow['MANSX']."'>".$producerRow['TENNSX']."</option>";
                                }
                            ?>
                        </select>
                        <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                    </label>
                </div>
                <div class="right">
                    <label>
                        <span>Số lượng:</span>
                        <input type="text" name="amount" class="amount-update">
                    </label>
                    <label class='erro'><?php echo $amountErr ?></label>


                    <div style="overflow: hidden;text-align: right;">
                        <span style="padding-right: 10px;">Ngày nhập:</span>            
                        <div class="input-group" style="width: 70%;float: right;">
                            <div class="input-group-addon" style="">
                                <i class="fa fa-calendar"></i>                                                  
                            </div>
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text" style="float: right;width:100%;">
                        </div>
                    </div>
                    <label class='erro'><?php echo $dateErr ?></label>
                    <label>
                        <span>Mã sản phẩm:</span>
                        <input type="text" name="id-update" class="id-update">
                    </label>
                    <label class='erro'><?php echo $idErr ?></label>
                </div>
                <div class='action'>
                    <input type="submit" name="action" value="add" class="change-data">
                    <input type="submit" name="action" value="delete" class="change-data">
                    <input type="submit" name="action" value="update" class="change-data">
                </div>
            </form>
            <div id="messageBox" style=""><?php echo $message ?></div>
        </div>
    </section>
    <section id="main-content">
        <div class='container'>
            <h4>
                <strong>Tất cả sản phẩm</strong>
            </h4>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th class='id-product'>Mã</th>
                        <th class='name-product'>Tên sản phẩm</th>
                        <th class='type-product'>Loại sản phẩm</th>
                        <th class='producer'>Nhà sản xuất</th>
                        <th class='export'>Số lượng nhập</th>
                        <th class='import'>Số lượng xuất</th>
                        <th class='remain'>Tồn kho</th>
                    </tr>
                    <?php
                        while($procductRow=$allProducts->fetch_assoc()){
                            echo "<tr class='detail-product-admin'>
                                    <td class='id-val'>".$procductRow['MASP']."</td>
                                    <td class='name-val'>".$procductRow['TENSP']."</td>
                                    <td class='type-val' value='".$procductRow['MALOAI']."'>".$procductRow['TENLOAI']."</td>
                                    <td class='producer-val' value='".$procductRow['MANSX']."'>".$procductRow['TENNSX']."</td>
                                    <td class='import-val'>".$procductRow['TSNHAP']."</td>
                                    <td class='export-val'>".$procductRow['SLDABAN']."</td>
                                    <td class='maintain-val'></td>
                                </tr>";      
                        }
                    ?>
                    
                    
                </table>
            </div>
        </div>
    </section>


    <?php
        include_once 'footer.php';
    ?>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
</body>

</html>