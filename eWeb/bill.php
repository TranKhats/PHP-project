<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/index.js"></script>
    <title>Đơn đặt hàng</title>
</head>
<?php
    include_once "connect.php";
    include_once "header.php";
    if(isset($_GET['idOrder'])){
        $idOr=$_GET['idOrder'];

    $queryOr="SELECT TENSP,SOLUONGSP,TIEN FROM giaodich tr, `order` o,chitiet_order ct,sanpham s
                where o.MAORDER=ct.MAORDER and s.masp=ct.masp 
                and o.MAORDER='$idOr'
                group by TENSP";
    $resultOr=$conn->query($queryOr);
}
?>
<body>
    <div class="container">
        <div class="bill">
            <div class="table-responsive">
                <h3 class='title'>Đơn đặt hàng của bạn</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            
                        </tr>
                    </thead>
                    <?php
                        if(isset($resultOr)){
                            if(count($resultOr)>0){
                                $total=0;
                                $i=1;
                                while ($row=$resultOr->fetch_assoc()) {
                                    echo    "<tbody>
                                                <tr>
                                                    <td>$i</td>
                                                    <td class='detailed-ordered'>".$row['TENSP']."</td>
                                                    <td class='detailed-ordered'>".$row['SOLUONGSP']."</td>
                                                    <td class='detailed-ordered'>".$row['TIEN']."</td>
                                                </tr>
                                            </tbody>";
                                    $i++;
                                    $total+=$row['TIEN'];
                                }
                            }
                        }
                    ?>

                </table>
            </div>
            <?php
                if(!isset($total)){
                    $total=0;
                }
                echo "<h5 class='total'>Tổng tiền:<span>$total</span></h5>";
            ?>
            <div id='back'>
                <a href='index.php'>Quay lại</a>
            </div>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
</body>
<style>
    .bill{
        min-height: 305px;
        padding: 25px;
        margin: 25px 25px 0 25px;
        background: white;
        box-shadow: 0px 1px 10px 10px #a5989829;
    }
    .total span{
        padding-left: 30px;
    }
    .total,.title{
        color:red;
    }
    .table{
        border: solid #0000004f 1px;
    }
    .detailed-ordered{
        border: solid #0000004f 1px;
        border-bottom:none;
    }
    #back{
        width: 134px;
        height: 38px;
        background: #ffe100;
        float: right;
        font-size: 17px;
        border-radius: 6px;
        padding: 5px 5px 5px 34px;
        margin-top: 50px;
    }
    #back a{
        color: white;
        font-weight: bolder;
    }
</style>
</html>