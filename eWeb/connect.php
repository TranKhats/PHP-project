<?php
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


// Create connection
  function connect(){
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
    return $conn;
  }

?>