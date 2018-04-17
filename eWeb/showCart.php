<?php

    require_once "connect.php";
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cart.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/index.js"></script>
    <title>Cart</title>
</head>
                <?php
                    $nameErr="";
                    $phoneErr="";
                    $sexErr='';
                    $addressErr='';
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if(isset($_POST['action'])&&$_POST['action']=='order'){
                            $isordered=false;

                            $sexErr='';
                            $sex="";
                            $address='';
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
                            $phone="";
                            $phoneErr="";
                            if(empty($_POST["phone"])||!is_numeric($_POST["phone"])||strlen($_POST["phone"])<10){
                                $phoneErr="Số điện thoại phải được nhập không đúng";
                            }
                            else{
                                $x="select TENKH from KHACHHANG where MAKH='".$_POST['phone']."'";
                                $testPhone=$conn->query("select TENKH from KHACHHANG where MAKH='".$_POST['phone']."'")->fetch_array()["TENKH"];
                                if($testPhone!=null||$testPhone==$name){
                                    $phoneErr="Số điện thoại này đã được dùng, không phải bạn!";
                                }
                                else {
                                    $phone=$_POST["phone"];
                                }
                            }
                            //----------validateAddress-----------
                            if(isset($_POST['address'])){
                                if(empty($_POST['address'])){
                                    $addressErr='Thiếu địa chỉ giao hàng';
                                }
                                else {
                                    $address=$_POST['address'];
                                }
                            }
                            //----------add GIao dich-------------
                            if(empty($nameErr)&&empty($phoneErr)&&empty($sexErr)&&empty($addressErr)){
                                // $idCus=$connect->query("select MAKH from KHACHHANG where MAKH='$phone'").num_rows;
                                if($conn->query("select TENKH from KHACHHANG where MAKH='$phone'")->num_rows==0){//kiem tra khach hang da ton tai
                                    $conn->query("INSERT INTO KHACHHANG (`MAKH`, `TENKH`, `SDT`, `DIACHI`, `PHAI`) 
                                                VALUES ('$phone', '$name', '$phone','$address', '$sex')");
                                }
                                //Them moi mot session
                                $newIDSession=session_id();
                                $conn->query("INSERT INTO GIAODICH (`MAGD`, `TIME`, `MAKH`) VALUES ('$newIDSession', '".date('Y-m-d')."', '$phone')");
                                //Them moi  1 order
                                $newIDOrder=$conn->query("SELECT MAORDER FROM `ORDER`")->num_rows;
                                $queryOr="INSERT INTO ORDER (`MAORDER`, `MAGD`) VALUES ('$newIDOrder', '$newIDSession')";
                                $conn->query("INSERT INTO `ORDER` (`MAORDER`, `MAGD`) VALUES ('$newIDOrder', '$newIDSession')");
                                //Them moi mot CHITETORDER
                                $cart=$_SESSION["cart"];
                                foreach($cart as $key=>$val){
                                    $newDetailed=$conn->query("select MA_CTORDER from CHITIET_ORDER")->num_rows;
                                    // ---------------------them gia cua tung  chitiet_order----------
                                    $priceResult=$conn->query("select  MATT,GIATRI from SANPHAM s,THONGTINCHITIET ct 
                                                            where s.MASP=ct.MASP and s.MASP='$key' 
                                                            and (MATT='giamoi' or MATT='discount')");
                                    while($row=$priceResult->fetch_assoc()){
                                        $pricePrt[$row['MATT']]=$row['GIATRI'];
                                    }
                                    if(count($pricePrt)==1){
                                        $price=$val*$pricePrt['giamoi'];
                                    }
                                    else {
                                        $price=($val*$pricePrt['giamoi']*$pricePrt['discount'])/100.0;
                                    }
                                    // ---------------------------------------------------------------------
                                    $conn->query("INSERT INTO CHITIET_ORDER (`MA_CTORDER`, `MAORDER`, `MASP`, `SOLUONGSP`,`TIEN`) 
                                    VALUES ('$newDetailed', '$newIDOrder', '$key', '$val','$price')");    
                                }
                                echo "<script type='text/javascript'>alert('Giao dịch thành công!')</script>";
                                header("Location:bill.php?idOrder=$newIDOrder");
                                $_SESSION['cart']=array();
                                $_SESSION['totalPrice']=0;
                               
                            }

                        }
                        
                    }
                    
                ?> 
<body>
    <?php
        require_once "header.php";
    ?>
 
    <section id="wrap-cart">
        <div class="container">
            <div class="wrap-cart">
                <ul id="list-products">
                    <?php
                        $totalPrice=0;//init price                    
                        if(isset($_SESSION["cart"])){
                            if(isset($_POST['action'])&&$_POST['action']=='remove'){//remove a product 
                                if(isset($_POST['idRemove'])){
                                    unset($_SESSION["cart"][$_POST['idRemove']]);
                                    header("Location:showCart.php");
                                }
                            }
                            if(isset($_GET['action'])&&$_GET['action']=='minus'){//minus a product
                                if(isset($_GET['idMinus'])){
                                    $id=$_GET['idMinus'];
                                    if($_SESSION['cart'][$id]>1){
                                        $_SESSION['cart'][$id]--;
                                    }
                                    else{//1 product ->delete
                                        unset($_SESSION['cart'][$id]);
                                    }
                                    header("Location:showCart.php");
                                }    
                            }
                            if(isset($_GET['action'])&&$_GET['action']=='plus'){//plus a product
                                if(isset($_GET['idPlus'])){
                                    $id=$_GET['idPlus'];{
                                        $_SESSION['cart'][$id]++;
                                    }
                                    header("Location:showCart.php");
                                }    
                            }
                            
                            //---------showCart----------------
                            if(isset($_SESSION["cart"])){
                                $cart=$_SESSION["cart"];                              
                                foreach($cart as $key=>$val){
                                    $namePrt=$conn->query("select TENSP from SANPHAM where MASP='$key'")->fetch_row()[0];
                                    //Lay thong tin  San pham
                                    if($namePrt!=null){
                                        $bookedPrt=$conn->query("select  MATT,GIATRI from SANPHAM s,THONGTINCHITIET ct 
                                                            where s.MASP=ct.MASP and s.MASP='$key' 
                                                            and (MATT='linkanh' or MATT='giamoi' or MATT='discount')");
                                        //get  associative Array of deatailed booked Product
                                        while($row=$bookedPrt->fetch_assoc()){
                                            $detailedPro[$row['MATT']]=$row['GIATRI'];
                                        }
                                        $totalPrice+=$detailedPro["giamoi"]*$val;
                                        try{
                                            echo "<li class='added-product'>
                                                    <div class='showed col-xs-2 col-sm-2 col-lg-2' data-id='".$key."'>
                                                        <img src='".$detailedPro['linkanh']."' alt='DellA101'>
                                                        <button type='button' class='remove-added'>
                                                            <i class='fa fa-times-circle' aria-hidden='true'></i> Xóa</button>
                                                    </div>
                                                    <div class='col-xs-10 col-sm-10 col-lg-10 info-added-prts'>
                                                        <div class='info-price'>
                                                            <a href='#' class='name'>
                                                                <strong>".$namePrt."</strong>
                                                            </a>
                                                            <span class='final-price'>".$detailedPro['giamoi']." đ</span>
                                                        </div>
                                                        <div class='info-pr'>Sản phẩm mới bán chạy</div>
                                                        <div class='info-color'>
                                                            <span>Chọn màu:</span>
                                                            <ul>
                                                                <li>
                                                                    <input type='radio' name='color' value='' class='color'>
                                                                </li>
                                                                <li>
                                                                    <input type='radio' name='color' value='' class='color'>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class='choose-number'>
                                                            <div class='minus'>-</div>
                                                            <div class='number'>".$val."</div>
                                                            <div class='plus'>+</div>
                                                        </div>
                                                    </div>
                                                </li>";
                                        }catch(Exeption $e){

                                        }
                                    }
                                }   
                            }
                            else {
                                header("Location:index.php");
                            }
                        }
                        $_SESSION["totalPrice"]=$totalPrice;
                    ?>
                    

                </ul>
                <div class="money-sum">
                    <?php
                            if($totalPrice==0){
                                echo "<h5 style='color: #ffbe00;font-weight: bolder;'> Giỏ hàng không tồn tại </h5>";
                            }
                    ?>

                    <div>
                        <span>
                            <strong>Tổng tiền:</strong>
                        </span>
                        <span class="sum"><Strong><?php echo $totalPrice; ?> đ</Strong></span>
                    </div>
                </div>
                <div class="info-customer">

                    <!-- <iframe name="refresh" style="display:none;"></iframe> -->
                    <form action="showCart.php" method="POST"  id="book">
                        <label class="sex"><input type="radio" name="sex" value="men">Anh</label>
                        <label class="sex"><input type="radio" name="sex" value="women">Chị</label>
                        <?php
                                echo "<label class='erro'>$sexErr</label>";
                            ?>
                        <input type="text" name="name" placeholder="Họ tên" class="name-cus">
                        <input type="text" name="phone" placeholder="Số điện thoại" class="phone-cus">
                        
                        <?php
                                echo "<label class='erro'>$nameErr</label>";
                                echo "<label class='erro' style='margin-left:9%'>$phoneErr</label>";
                        ?> 
                        <textarea rows="2" name='address' placeholder='Địa chỉ giao hàng...'></textarea>
                        <?php
                                echo "<label class='erro'>$addressErr</label>";
                        ?>                      
                        <button type="submit" value='order' name='action' id='order' >Mua hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        require_once "footer.php";
    ?>
</body>

</html>