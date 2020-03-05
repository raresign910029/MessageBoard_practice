<?php
require_once "connet.php";
require_once 'mysqlconfig.php';
$ma1=new DB();
$link=$ma1->connect();
$id=$_POST['id'];
$password=$_POST['password'];
$confirmPassword=$_POST['confirmPassword'];
if($password!=$confirmPassword){
	echo "<script>alert('輸入的密碼和確認的密碼不相等');location='register.php';</script>";;
}
$alt="select * from tbl_ms where username='$id'";
$res = $ma1->print1($link,$alt);
if($id!=null&&$password!=null){
   $ma=new DB();
   $link=$ma->connect();
   $sql = "insert into tbl_ms (username,password) values('$id','$password')"; 
   for ($i=0; $i < count($res); $i++) {
	   if($id!=$res[$i]['username']){
	   $res = $ma->insert($link,$sql);
	   };
       if($id==$res[$i]['username']){
           echo "<script>alert('註冊失敗，該賬號已被註冊！');location='register.php';</script>";
       }
   }
}
else{
    echo "<script>alert('註冊失敗，請輸入賬號和密碼');location='register.php';</script>";
}
?>