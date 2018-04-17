<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/chatOnline.css"> -->
    <link rel="stylesheet" href="css/login.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/index.js"></script>
    <!-- ----------------chat bootsnip------------------------- -->
    <link rel="stylesheet" href="css/chat.bootsnipp.css" type="text/css" />
    <script src="js/chat.bootsnipp.js"></script>
</head>

<body>
    <?php
        require_once 'connect.php';
        require_once "header.php";
    ?>
    <div id="home">
        <div class="container">
            <div id="left-menu" class="pull-left">
                <ul id="detailed-left-menu">
                    <?php
                        for($i=0;$i<$countProducers;$i++){
                            echo "<li class='navBar fist-navBar' onmouseover='set_SubmenuPositon(this)'>
                            <a class='item-left-menu'>".$arrayPrs[$i]['TENNSX']."</a>
                            <div class='sub-menu'>
                                <div class='box-sub-menu'>
                                    <h5>HÃNG SẢN XUÁT</h5>
                                    <ul>
                                        <li>
                                            <a href='#'>ĐIỆN THOẠI</a>
                                        </li>
                                        <li>
                                            <a href='#'>MÁY TÍNH</a>
                                        </li>
                                        <li>
                                            <a href='#'>TABLET</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class='box-sub-menu'>
                                    <h5>MỨC GIÁ</h5>
                                    <ul class='suggested-price'>
                                        <li>
                                            <a href='#'>1-3 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>3-5 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>5-11 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>11-20 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>Cao cấp</a>
                                        </li>
    
                                    </ul>
                                </div>
                                <div class='box-sub-menu'>
                                    <h5>MỨC GIÁ</h5>
                                    <ul class='suggested-price'>
                                        <li>
                                            <a href='#'>1-3 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>3-5 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>5-11 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>11-20 triệu</a>
                                        </li>
                                        <li>
                                            <a href='#'>Cao cấp</a>
                                        </li>
    
                                    </ul>
                                </div>
                            </div>
                        </li>";
    
                        }
                    ?>


                </ul>
            </div>
            <div style="width:78%;margin:auto;">
                <div class="flexslider " id="slider">
                    <ul class="slides">
                        <li>
                            <img src="images/banner01.jpg" />
                        </li>
                        <li>
                            <img src="images/banner02.jpg" />
                        </li>
                        <li>
                            <img src="images/banner03.jpg" />
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <div id="content-web">
        <section>
            <div class="container">
                <div class="new-collection">
                    <a href="#">
                        <img src="images/banner07.jpg">
                        <div class="center-text">
                            <strong>New collection</strong>
                        </div>
                    </a>
                </div>
                <div class="new-collection">
                    <a href="#">
                        <img src="images/banner08.jpg">
                        <div class="center-text">
                            <strong>New collection</strong>
                        </div>
                    </a>
                </div>
                <div class="new-collection">
                    <a href="#">
                        <img src="images/banner09.jpg">
                        <div class="center-text">
                            <strong>New collection</strong>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="all-products">
                <h3>Deals of the day</h3>
                <?php
                    //require_once("getProducts1.php");
                    require_once("getProducts.php");
                    //getProductByQuery("SELECT MASP,TENSP FROM SANPHAM",$end);
                ?>
                <a href="javascript:loadMore(this);" id="load-more" >Xem thêm <span><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>                
            </div>
        </section>
    </div>
    <?php
        include_once "chatBox.php";
        require_once "footer.php";
    ?>
    
    <!-- FlexSlider -->
    <script defer src="js/jquery.flexslider.js"></script>

    <script type="text/javascript">
        $(window).on('load', function () {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>


</body>

</html>