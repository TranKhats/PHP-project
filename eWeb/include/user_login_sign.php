<?php
	include_once '../connect.php';
	//mysqli_set_charset($connect,"utf8");
	session_start();
?>

	<!-- 'start thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->
	<?php

		if(isset($_POST["sign"])){
			$tk = $_POST["user_name"];
			$pass=$_POST["pass-word"];
			$pass_encode = md5($pass);
			$query="select * from user where user_name = '$tk' and password = '$pass_encode'";
			$rows = $conn->query($query);
			$count = mysqli_num_rows($rows);
			if($count==1){
				$_SESSION["loged"] = true;
				$perQuery="SELECT id_func from permision p, user u 
							where p.id_user=user_name and user_name='$tk'";//test type user
				$perResult=$conn->query($perQuery);
				if(count($perResult)==1){
					$permis=$perResult->fetch_assoc()['id_func'];
					if($permis==1){//is admin
						$_SESSION['typeUser']=1;
						header("location:../admin.php");
					}
					else {
						$_SESSION['typeUser']=0;
						header("location:../index.php");
					}
				}
				setcookie('user',$tk,time()+60*60,'/');
				setcookie('pass',$pass,time()+60*60,'/');
				echo "<script type='text/javascript'>alert('Đăng nhập thành công')</script>";
			}
			else{
				//header("location:../index.php");
				echo "<script type='text/javascript'>alert('Đăng nhập thất bại')</script>";
				header("location:../index.php");
				//setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
			}
			
		}
	?>
	<!-- 'end thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->

	