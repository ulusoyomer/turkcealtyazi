<?php
session_start(); ob_start();

session_destroy();
setcookie("giris",$giris_verileri,time()-3600);
header("Location:index.php");
?>