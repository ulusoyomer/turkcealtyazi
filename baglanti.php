<?php
session_start(); ob_start();
$db = new mysqli("localhost","root","","turkcealtyazi");
$db->set_charset("UTF8");

if($db->connect_errno){
    echo $db->connect_error;
    die("Veritabanı bağlantı hatası");
}



function filtre($deger){
    $bir = trim($deger);
    $iki = strip_tags($bir);
    $uc = htmlspecialchars($iki, ENT_QUOTES);
    return $uc;

}


$ip_adres=$_SERVER["REMOTE_ADDR"];
$zaman = time();
$anket_suresi = 8400;
$kullanici_zaman = $zaman + $anket_suresi;

if(isset($_SESSION["Kullanici"])){
    $name = $_SESSION["Kullanici"];
    $uyesorgu = $db->query("SELECT * FROM uyeler WHERE username ='$name'");
    $uyesorgu_kontrol = $uyesorgu->num_rows;
    if($uyesorgu_kontrol > 0){
        $uye_bilgiler = $uyesorgu->fetch_assoc();
        $eposta = $uye_bilgiler["eposta"];
    }

}


?>