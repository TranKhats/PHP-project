<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tạo tài khoản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/sign-in.css">

    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/index.js"></script>

</head>
<?php
            include_once 'connect.php';
            $errName=$errEmail=$errPass='';
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $fist=$_POST['fist'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                check_name($fist,$errName);
                check_name($name,$errName);
                check_mail($email,$errEmail);
                if(isset($_POST['pass-word1'])&&isset($_POST['pass-word2'])){
                    $pass1=$_POST['pass-word1'];
                    $pass2=$_POST['pass-word2'];
                    if(empty($pass1)||empty($pass2)){
                        $errPass='Mật khẩu không được để trống';
                    }
                    if($pass1!=$pass2){
                        $errPass='Mật khẩu phải trùng khớp nhau';
                    }
                }
                //-----------sign-up-------------
                if(empty($errName)&&empty($errEmail)&&empty(($errPass))){
                    //signUp($email,$pass1,$fist.$name);
                    $pass = md5($pass1);
                    $query="insert into user (user_name,password,full_name) values ('$email','$pass','".$name.$fist."')";
                    $conn->query($query);
                    header("Location:index.php");
                    setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
                }
            }
            function check_name(&$data,&$errName){
                $data=trim(preg_replace('/\s+/', ' ',$data));
                if(empty($data)){
                    $errName='Tên, họ của bạn không được để trống';
                    return false;
                }
                if(preg_match('/\s/',$data)||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $data)
                    ||preg_match('~[0-9]~', $data)){
                        $errName='Tên, họ không được chứa khoảng trắng, số, các kí tự đặc biệt';
                        return false;
                    }   
                $data=stripslashes(htmlspecialchars($data));
                return true;
            }
            

            function check_mail($email,&$errEmail){
                if(empty($email)){
                    $errEmail='Email không để trống';
                    return false;
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errEmail='Email không đúng định dạng';
                    return false;
                }
                return true;
            }
            // ------------------SIGN-UP---------------------
            function signUp($email,$pass,$name){

            }
?>
<body>
    <?php
                    include_once 'header.php';

    ?>
    <div class="container">
        <div class='content'>
            <div id="introduce-sign" class="col-lg-8 col-xs-7">
                    <h4 style='color:red;'>Là thành viên của chúng tôi, bạn sẽ nhận được hiều ưu đãi hơn!</h4>
                    <ul>
                        <li>Đăng kí đơn giản</li>
                        <li>Xác thực dễ dàng</li>
                        <li>Bảo mật hai lớp thông minh </li>
                    </ul>
            </div>
            <div id="sign-in" class="col-lg-4 col-xs-5">    
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" id="signature">
                            <h2 class='title'>Đăng kí tại đây</h2>
                            <fieldset>
                                <legend>
                                    <strong>Name</strong>
                                </legend>
                                <input type="text" placeholder="Họ" name="fist" class="name fist-name">
                                <input type="text" placeholder="Tên" name="name" class="name full-name">
                                <span class="err"><?php echo $errName?></span>
                            </fieldset>

                            <fieldset>
                                <legend>
                                    <strong>Email người dùng</strong>
                                </legend>
                                <input type="text" name="email" placeholder="Email của bạn" class="user-name">
                                <span class="err"><?php echo $errEmail?></span>
                            </fieldset>
                            <fieldset>
                                <legend>
                                    <strong>Mật khẩu</strong>
                                </legend>
                                <input type="password" name="pass-word1" placeholder="Mật khẩu" class="password">
                                <span class="err"></span>
                            </fieldset>
                            <fieldset>
                                <legend>
                                    <strong>Xác nhận mật khẩu</strong>
                                </legend>
                                <input type="password" name="pass-word2" placeholder="Xác nhận lại" class="re-password">
                                <span class="err"><?php echo $errPass ?></span>
                            </fieldset>
                            <button type="submit" onclick="showErrRegister()">Đăng ký</button>

                    </form>
            </div>
        </div>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>

</html>