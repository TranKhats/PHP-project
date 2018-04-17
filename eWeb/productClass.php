<?php

    class Product 
    {
        public static function connect(){
            $servername='localhost';
            $username='root';
            $password='';
            $conn=new mysqli($servername,$username,$password,"muabansuachualaptop");
            $conn->set_charset("utf8");
            if($conn->connect_error){
              die("Kết nối thất bại".$conn->connect_err);
            }
            else{
              //echo "Kết nối thành công!";
            }
        }
        public static function deleteProduct($idProduct){
            Product::connect();
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
    }
    $conn->close();
    
?>