<?php
    require_once "connect.php";
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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/product.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/index.js"></script>
    <script src="js/jquery.elevateZoom-3.0.8.min.js"></script>

    <title>Product</title>
</head>

<body>
    <?php
        require_once "header.php";
        $key=$_GET['id'];
        $result=$conn->query("select t.MATT,TENTT,GIATRI from SANPHAM s,THONGTINCHITIET ct,THONGTIN t 
        where s.MASP=ct.MASP and t.MATT=ct.MATT and s.MASP='".$_GET['id']."'");
        while($row=$result->fetch_assoc()){
            $detailedPrt[$row['MATT']]=array($row['TENTT'],$row['GIATRI']); 
        }
    ?>
    <section id="main-content-show">
        <div class="container">
            <aside id="main-product" class="col-lg-5 col-sm-6 col-xs-12">
                <div id="image-product" class="box">
                    <img id="main-product-image" src="<?php echo $detailedPrt['LINKANH'][1] ?>">
                    <div id="more-images">
                        <ul>
                            <li>
                                <img src="images/dell1.png">
                            </li>
                            <li>
                                <img src="images/dell1.png">
                            </li>
                            <li>
                                <img src="images/dell1.png">
                            </li>
                            <li>
                                <img src="images/dell1.png">

                            </li>
                        </ul>
                    </div>
                    <a id="see-more" href="#">Xem thêm</a>
                </div>

            </aside>
            <aside id="price-sale" class="col-lg-7 col-sm-6 col-xs-12">
                <div id="wrap-info" style="margin-left:70px">
                    <div class="final_price">
                        <strong><?php echo $detailedPrt['giamoi'][1] ?> ₫</strong>
                    </div>
                    <div id="promotion-zero">
                        <strong data-count="3">Khuyến mãi</strong>

                        <ul>
                            <li>
                                <figure>
                                    <img class="attached-product" src="images/balo-acer.png">
                                    <figcaption>Balo</figcaption>
                                </figure>
                            </li>
                            <li>
                                <figure>
                                    <img class="attached-product" src="images/mouse.png">
                                    <figcaption>Chuột</figcaption>
                                </figure>
                            </li>
                            <li>
                                <figure>
                                    <img class="attached-product" src="images/PMH100k.png">
                                    <figcaption>Phiếu mua hàng 100k</figcaption>
                                </figure>
                            </li>
                        </ul>
                    </div>
                    <div id="area-order">
                        <!-- <a class='add_cart order-now' href='addCart.php?id=".$key."'> -->
                        <a href="addCart.php?id=<?php echo $key; ?>" class="order-now">
                            <b>Mua ngay</b>
                            <span>Xem hàng không thích không mua</span>
                        </a>
                        <a href="#" class="add-cart">Thêm vào giỏ hàng</a>
                    </div>
                    <div class="contact">
                        <p>Gọi đặt mua:
                            <span>1800.1060</span> (Miễn phí).
                            <span>028.3622.1060</span> (7:30-22:00)</p>
                    </div>
                    <div id="policy">
                        <ul>
                            <li>Trong hộp có: Dây nguồn, Sách hướng dẫn, Thùng máy, Adapter sạc</li>
                            <li>Bảo hành chính hãng:
                                <b>thân máy 12 tháng, pin 12 tháng, sạc 12 tháng</b>
                            </li>
                            <li>Giao hàng tận nơi miễn phí trong
                                <b>60 phút</b>.
                            </li>
                            <li>
                                <b>1 đổi 1 trong 1 tháng với sản phẩm lỗi. </b>
                            </li>
                        </ul>
                    </div>
                    <div class="promotion">
                        <p>Ưu đãi mua Office 365 Personal 1 năm giảm còn
                            <span>590.000đ</span> khi mua kèm Laptop (chỉ áp dụng trong 1 tháng khi mua laptop) -
                            <span>Xem chi tiết</span>
                        </p>
                    </div>
                    <div id="table-parameter">
                        <h3>Thông tin sản phẩm</h3>
                        <ul>
                            <li>Màn Hình : 13.3 inch FullHD IPS</li>
                            <li>CPU : Intel Celeron N3350 1.10 GHz</li>
                            <li>Ram : 3 GB LPDDR3 1600 MHz</li>
                        </ul>
                        <ul>
                            <li>VGA : Intel (R) HD Graphics</li>
                            <li>HĐH : Windows 10 (Dùng thử)</li>
                            <li>HĐH : Windows 10 (Dùng thử)</li>
                        </ul>
                        <a href="#" data-toggle="modal" data-toggle="modal" data-target="#exampleModalLong1">Xem nhiều hơn</a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <ul>
                            <?php
                                foreach($detailedPrt as $key=>$val){
                                    echo "<li>
                                            <label>$val[0]</label>
                                            <span>$val[1]</span>
                                        </li>";
                                }
                            ?>

                        </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once "footer.php";
    ?>
    <!----------Zoom-product------------- -->
    <script>
        $('#main-product-image').elevateZoom();
    </script>
</body>

</html>