<?php
header('Access-Control-Allow-Origin: http://192.168.1.73:3000');  
header('Access-Control-Allow-Methods: POST, GET,HEAD,PTIONS,TRACE,CONNECT PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Expose-Headers: x-ripple-user-agent, content-type,x-ripple-user-agent, authorization,x-ripple-user-agent');
session_start();
$_SESSION['rem']= $_POST['env'];//2
$_SESSION['nom']=$_POST['nom'];//1

//echo $_SESSION['rem'];

?>