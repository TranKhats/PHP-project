<?php
            // $cars = array("Volvo", "BMW", "Toyota");
            // echo json_encode($cars);
            echo json_encode(array("Volvo", "BMW", "Toyota"));
            
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $errUser=$errName=$errPhone='';
                $signature=isset($_POST['signature'])?(array)($_POST['signature']):false;
                if($signature){
                    check_name($signature['fistname']);
                    check_name($signature['fullname']);
                    check_username($signature['username']);
                    check_phone($signature['phone']);

                }
            }
            function check_name(&$data){
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
            function check_username($user){
                $user=trim(preg_replace('/\s+/', ' ',$user));
                if(empty($user)){
                    $errUser='Tên đăng nhập không được rỗng';
                    return false;
                }
                if(preg_match('/\s/',$user)||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user)){
                    $errUser='Tên đăng nhập không được chứa khoảng trắng, các kí tự đặc biệt';
                    return false;
                }
                return true;
            }
            function check_phone($phone){
                if(empty($phone)){
                    $errPhone='Số điện thoại không để trống';
                    return false;
                }
                if(!is_numeric($phone)||strlen($phone)<9){
                    $errPhone='Số điện thoại chỉ có thể là số và ít nhất 9 số';
                }
                return true;
            }
            function check_mail($mail){
                if(empty($phone)){
                    $errPhone='Email không để trống';
                    return false;
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    return false;
                }
                return true;
            }
            $errList=array($errUser,$errName,$errPhone);
?>