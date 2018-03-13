<?php
session_start();
 //4.获取用户数据 uname upwd
require_once("01_init.php");
 //获取系统生成验证码内容
$uname=$_REQUEST["uname"];
$upwd=$_REQUEST["upwd"];
$uyzm=$_REQUEST["yzm"];
  //获取系统生成验证码内容
  if($uyzm!=$_SESSION["captcha"]){
    echo '{"验证码不正确"}';
    exit;
  }
 //5.创建sql语句并且执行sql语句
$sql=" SELECT * FROM user_admin";
$sql .=" WHERE uname='$uname' AND upwd=md5('$upwd')";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
 //6.判断输出结果
if($row===null){
    rcho'{"用户密码有错误"}';
}else{
    echo'{"登录成功"}';
}
 ?>