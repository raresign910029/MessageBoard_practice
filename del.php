<?php
header("content-type:text/html;charset=utf-8");
session_start();
require_once "connet.php";
require_once 'mysqlconfig.php';
$ma1 = new DB();
$link = $ma1->connect();
$id = $_GET['id'];
//session_start();
//$id=$_SESSION["uid"];
if ($link) {
    $sql = "delete from tbl_ms1 where id =$id ";
    //echo "$sql";
    $que = mysqli_query($link, $sql);
    if ($que) {
        echo "<script>alert('刪除成功，返回首頁');location='show.php';</script>";
    } else {
        echo "<script>alert('刪除失敗');location='show.php'</script>";
        exit;
    }
}
