    <?php
        if(!isset($_SESSION)){
            session_start();
        }
        $queryNSX="SELECT TENNSX FROM  NHASANXUAT";
        $producers=$conn->query($queryNSX);
        while( $rowProducers = $producers->fetch_assoc()){
            $arrayPrs[] = $rowProducers; // Inside while loop
        }
        $countProducers=count($arrayPrs);
        // ---------------------KT sp trong gio----------------------------
        $countCart=0;
        if(isset($_SESSION['cart'])){
            $cart=$_SESSION["cart"];
            foreach($cart as $key=>$val){
                $countCart+=$val;
            }
        }
    ?>

    
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Welcome to E-shop!</span>
            </div>
            <div class="pull-right">
                <ul>
                    <li>
                        <a href="#">STORE</a>
                    </li>
                    <li>
                        <a href="#">NEWLETTERS</a>
                    </li>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                ENG
                                <span class="caret"></span>
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="#">Frances</a>
                                </li>
                                <li>
                                    <a href="#">VietNames</a>
                                </li>
                                <li>
                                    <a href="#">Chinese</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                USD
                                <span class="caret"></span>
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="#">ERO</a>
                                </li>
                                <li>
                                    <a href="#">VND</a>
                                </li>
                                <li>
                                    <a href="#">USD</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="pull-left" id="bar" onclick="openMenu()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <a class="pull-left" href="index.php" id="shopName">
                <span style="color:yellow">E</span>-SHOP</a>
            <form class="pull-left" id="catologue" method="GET" action="resultSearch.php">
                <select>
                    <option>All Catologues</option>
                    <option>Catologue 1</option>
                    <option>Catologue 2</option>
                </select>
                <input type="text" name="keysearch" placeholder="Enter your key word" value="<?php (isset($_GET['keysearch']))?$_GET['keysearch']:''; ?>" />
                <button type="submit" class="btn btn-default" aria-label="Search" id="search-product">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </form>
            <div class="pull-right">
                <ul>
                    <li style="position:relative">
                        <div class="icon" id="account">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </div>
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                TÀI KHOẢN
                                <span class="caret"></span>
                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <a>Login</a>/</li>
                                    <li>
                                        <a>Join</a>
                                    </li>
                                </ul>
                            </div>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="drop-down-log">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user-o" aria-hidden="true"></i> Tài khoản của tôi
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> MY WISHLIST
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a>
                                        <i class="fa fa-exchange" aria-hidden="true"></i> COMPARE
                                    </a>

                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-check" aria-hidden="true"></i> CHECKOUT
                                    </a> -->

                                </li>
                                <?php
                                    if(isset($_SESSION['loged'])&&$_SESSION['loged']){
                                        echo "<li>
                                                <a href='include/log_out.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>Đăng xuất</a>
                                            </li>";
                                        if(isset($_SESSION['typeUser'])&&$_SESSION['typeUser']==1){
                                            echo "<li>
                                                    <a href='admin.php' >
                                                    <i class='fa fa-cog' aria-hidden='true'></i> Quản lí
                                                    </a>
                                                </li>";
                                    }
                                }
                                    else {
                                        echo "<li>
                                                <a href='#' data-toggle='modal' data-toggle='modal' data-target='#exampleModalLong'>
                                                    <i class='fa fa-unlock-alt' aria-hidden='true'></i> Đăng nhập
                                                </a>
                                            </li>";
                                    }
                                ?>

                                <li>
                                    <a href='sign.php' >
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>Tạo tài khoản
                                    </a>


                                </li>
                            </ul>

                        </div>
                    </li>
                    <li>
                        <div class="icon" id="chart">
                            <a href='showCart.php' >
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span><?php echo $countCart ?></span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </header>
    <nav>
        <div class="container">
            <ul id="navigation">
                <li id="catologues">
                        Catologues
                        <i class="fa fa-list" aria-hidden="true"></i>
                </li>
                <li class="navBar">
                    <a href="#">Máy tính</a>
                    <div class="sub-menu">
                        <div class="box-sub-menu">
                            <h5>HÃNG SẢN XUÁT</h5>
                            <ul>
                                <?php

                                for($i=0;$i<$countProducers;$i++){
                                    echo "<li>
                                    <a href='#'>".$arrayPrs[$i]['TENNSX']."</a>
                                </li>";
                                }
                                ?>
 
                            </ul>
                        </div>
                        <div class="box-sub-menu">
                            <h5>MỨC GIÁ</h5>
                            <ul class="suggested-price">
                                <li>
                                    <a href="#">1-3 triệu</a>
                                </li>
                                <li>
                                    <a href="#">3-5 triệu</a>
                                </li>
                                <li>
                                    <a href="#">5-11 triệu</a>
                                </li>
                                <li>
                                    <a href="#">11-20 triệu</a>
                                </li>
                                <li>
                                    <a href="#">Cao cấp</a>
                                </li>

                            </ul>
                        </div>
                        <div class="box-sub-menu">
                            <h5>MỨC GIÁ</h5>
                            <ul class="suggested-price">
                                <li>
                                    <a href="#">1-3 triệu</a>
                                </li>
                                <li>
                                    <a href="#">3-5 triệu</a>
                                </li>
                                <li>
                                    <a href="#">5-11 triệu</a>
                                </li>
                                <li>
                                    <a href="#">11-20 triệu</a>
                                </li>
                                <li>
                                    <a href="#">Cao cấp</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navBar">
                    <a href="#">Điện thoại</a>
                    <div class="sub-menu">
                        <div class="box-sub-menu">
                            <h5>HÃNG SẢN XUÁT</h5>
                            <ul>
                            <?php

                                for($i=0;$i<$countProducers;$i++){
                                    echo "<li>
                                    <a href='#'>".$arrayPrs[$i]['TENNSX']."</a>
                                </li>";
                                }
                                ?>
 
                            </ul>
                        </div>
                        <div class="box-sub-menu">
                            <h5>MỨC GIÁ</h5>
                            <ul class="suggested-price">
                                <li>
                                    <a href="#">1-3 triệu</a>
                                </li>
                                <li>
                                    <a href="#">3-5 triệu</a>
                                </li>
                                <li>
                                    <a href="#">5-11 triệu</a>
                                </li>
                                <li>
                                    <a href="#">11-20 triệu</a>
                                </li>
                                <li>
                                    <a href="#">Cao cấp</a>
                                </li>

                            </ul>
                        </div>
                        <div class="box-sub-menu">
                            <h5>MỨC GIÁ</h5>
                            <ul class="suggested-price">
                                <li>
                                    <a href="#">1-3 triệu</a>
                                </li>
                                <li>
                                    <a href="#">3-5 triệu</a>
                                </li>
                                <li>
                                    <a href="#">5-11 triệu</a>
                                </li>
                                <li>
                                    <a href="#">11-20 triệu</a>
                                </li>
                                <li>
                                    <a href="#">Cao cấp</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navBar">
                    <a href="#">Phần mềm</a>
                </li>
                <li class="navBar">
                    <a href="#">Sales</a>
                </li>
                <li class="navBar">
                    <a href="#">Phụ kiện</a>
                </li>
            </ul>
            </div>

    </nav>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Đăng nhập tại đây</h5> -->
                    <h3 class="form-signin-heading">Đăng nhập ở đây</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times-circle" aria-hidden="true" style="color:red"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrap-sign">
                        <form class="form-signin" method="POST" action="include/user_login_sign.php">
                            <!-- <h2 class="form-signin-heading">Đăng nhập ở đây</h2> -->
                            <label for="inputEmail" class="sr-only">Địa chỉ mail</label>
                            <input type="email" name="user_name" id="inputEmail" class="form-control" placeholder="Đia chỉ Email" value="<?php if(isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>" required autofocus>
                            <label for="inputPassword" class="sr-only">Mật khẩu</label>
                            <input type="password" name="pass-word" id="inputPassword" class="form-control" placeholder="Mật khẩu" value="<?php //if(isset($_COOKIE['pass'])) echo $_COOKIE['pass']; ?>" required>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="remember-me">Lưu mật khẩu
                              </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="sign" id="sign-in">Đăng nhập</button>
                            
                          </form>
                    </div>
                    </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button> -->
                    <!-- <button type="button" class="btn btn-primary">Lưu thay đổi</button> -->
                </div>
            </div>
        </div>
    </div>
