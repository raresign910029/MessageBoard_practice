<?php
require_once "connet.php";
require_once 'mysqlconfig.php';
$id=$_POST['uid'];
session_start();
$_SESSION["uid"]=$id;
$password=$_POST['password'];
$ma1=new DB();
   $link=$ma1->connect();
   $sql = "select * from tbl_ms where username='$id' and password='$password'";  
   $res = $ma1->CheckUser($link,$sql);
   if($res){
        header("Location:add.php");
   };
   if(!$res){
        echo "<script>alert('登入失敗，賬號或密碼錯誤');location='index.php';</script>";
   };
?>