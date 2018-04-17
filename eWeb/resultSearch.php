<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tìm kiếm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/index.js"></script>
</head>

<body>
    <?php

        require_once 'connect.php';
        require_once "header.php";
    ?>
    


    <div id="content-web">

        <section>
            <div class="container" id="all-products">
                <h3>Kết quả tìm kiếm</h3>
                <?php
                    include_once 'getProductSearch.php';
                ?>
                <a href="javascript:loadMoreSearch(this);" id="load-more" >Xem thêm <span><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>                
            </div>
        </section>
    </div>
<?php
    require_once "footer.php";
?>
    
    <!-- FlexSlider -->
    




</body>

</html>