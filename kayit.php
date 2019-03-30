<?php
require_once("baglanti.php");
date_default_timezone_set('Europe/Istanbul');
    if(@$_POST["username"]){
        $username = filtre($_POST["username"]);
    }
    else{
        $username = "";
    }
    if(@$_POST["sifre"]){
        $sifre = $_POST["sifre"];
    }
    else{
        $sifre = "";
    }
    if(@$_POST["sifre2"]){
        $sifre2 = $_POST["sifre2"];
    }
    else{
        $sifre2 = "";
    }
    if(@$_POST["eposta"]){
        $eposta = $_POST["eposta"];
    }
    else{
        $eposta = "";
    }
    if($username == "" || $sifre== "" || $sifre2 == "" || $eposta == ""){

    }
    else{
        if($sifre == $sifre2){
            $kullanici_adi_sorgu = $db->query("SELECT * FROM uyeler WHERE username='$username'");
            $eposta_sorgu = $db->query("SELECT * FROM uyeler WHERE eposta='$eposta'");
            $kullanici_adi_kontrol = $kullanici_adi_sorgu->num_rows;
            $eposta_kontrol = $eposta_sorgu->num_rows;
            if(!(@$kullanici_adi_kontrol > 0) && !(@$eposta_kontrol > 0) && !(@$sifre_esitligi == 1)){
                $sifre = md5($sifre);
                $date = date('d.m.Y H:i:s');
                $kullaniciEkle = $db->query("INSERT INTO uyeler (username,sifre,eposta,songiris) values ('$username','$sifre','$eposta','$date')");
                        if(!$kullaniciEkle){
                            echo "Eklemede bir sorun oluştu";
                        }
                        else{
                $k_adi = $username;
                $uye_veri_sorgu = $db->query("SELECT * from uyeler WHERE username = '$k_adi'");
                $uye_veri = $uye_veri_sorgu->fetch_assoc();
                $uye_id = $uye_veri["id"];
                $uye_resim = $uye_veri["uyeresim"];
                $uye_name = $uye_veri["username"];
                $uye_kayit_tarih = $uye_veri["tarih"];
                $uye_son_giris= $uye_veri["songiris"];
                $kullanici_sayfa_icerik = '<?php
                                                require_once("../baglanti.php");
                                                $uye_veri_sorgu = $db->query("SELECT * from uyeler WHERE username = \''.$k_adi.'\'");
                                                $uye_veri = $uye_veri_sorgu->fetch_assoc();
                                                $uye_resim = $uye_veri["uyeresim"];
                                            ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>TürkçeAltyazı</title>
    <link rel="stylesheet" href="../main.css">
</head>

<body onscroll="yukari()">

    <div id="cerceve">
        <div id="header" onscroll="yukari()">
            <a id="hlogo" href="../index.php" title="Altyazı"></a>
            <div id="Find">
                <ul>
                    <li onclick="menuac()" onmouseout="kapat()">
                        <a class="menu-bas-yazı">Altyazı</a>
                        <ul class="ust-menu" onmouseover="ac()">
                            <li><a class="ust-menu-yazı" onclick="yaz(0)">Altyazı</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(1)">Sanatçı</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(2)">Çevirmen</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(3)">Kelime</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(4)">Forum</a></li>
                        </ul>
                    </li>
                </ul>
                <form method="POST" action="../arama.php">
                    <input type="text" class="text-place" placeholder="Film / Dizi adı ya da IMDb linki giriniz" name="find">
                    <input type="submit" value="">
                </form>
            </div>
            <div id="social">
                <a id="Facebook"></a>
                <a id="Twitter"></a>
                <a id="Google"></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div id="menu">
                <ul>
                    <li class="orta-menu" onmouseover="ortamenuac(0)"><a href="../index.php">Anasayfa</a>
                        <ul class="orta-menu-liste" style="display: block;">
                            <li><a href="" #>TA 250 Film</a></li>
                            <li><a href="" #>Imdb 250 Film</a></li>
                            <li><a href="" #>1001 Film</a></li>
                            <li><a href="" #>Yeni Çıkanlar</a></li>
                            <li><a href="" #>Beklenenler</a></li>
                            <li><a href="" #>Gelişmiş Film Arama</a></li>
                            <li><a href="" #>Dizi Takvimi</a></li>
                            <li><a href="" #>Gruplar</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(1)"><a>Forum</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Forum İçinde Ara</a></li>
                            <li><a href="#">Çeviri Duyuruları</a></li>
                            <li><a href="#">Kullanıcı Grupları</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(2)"><a>Altyazı</a>
                        <ul class="orta-menu-liste">
                            <li><a href="" #>Yeni Çıkanlar</a></li>
                            <li><a href="" #>Beklenenler</a></li>
                            <li><a href="" #>Son 100 Altyazı</a></li>
                            <li><a href="" #>Top 100 Altyazı</a></li>
                            <li><a href="" #>Altyazı Arama</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(3)"><a>Filmler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">TA 250 Film Listesi</a></li>
                            <li><a href="#">Imdb 250 Film Listesi</a></li>
                            <li><a href="#">1001 Film</a></li>
                            <li><a href="#">Gelişmiş Film Arama</a></li>
                            <li><a href="#">Pek Yakında</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(4)"><a>Diziler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Dizi Takvimi</a></li>
                            <li><a href="#">TA 50 Dizi Listesi</a></li>
                            <li><a href="#">IMDb 250 Dizi Listesi</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(5)"><a>Haberler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Sinema</a></li>
                            <li><a href="#">Dizi</a></li>
                            <li><a href="#">Film Kriterleri</a></li>
                            <li><a href="#">Özel Dosyalar</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(6)"><a>Listeler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Film Listeleri</a></li>
                            <li><a href="#">Kullanıcı Listeleri</a></li>
                        </ul>
                    </li>
                    <li><a>Senkronizeler</a></li>
                    <li><a>Altyazı Gönder</a></li>
                    <li><a>Rastgele Film</a></li>
                </ul>
            </div>
            <?php 
                                                        if(!isset($_SESSION["Kullanici"])){
                                            
                                                        
                                                        ?>
            <a id="giris" onclick="gpaneliAc()">Giriş</a>
            <a id="register" href="../kayit.php">Kayıt</a>
            <div id="girispaneli" onclick="gpaneliAc()" style="display:none;">
                <form method="POST" action="../uyegiris.php">
                    <input class="girisler" type="text" placeholder="Kullanıcı Adı" name="username" required="required">
                    <input class="girisler" type="password" placeholder="Parola" name="parola" required="required">
                    <input type="submit" value="Giriş">
                    <span>
                        <input type="checkbox" name="remember">Beni Hatırla
                    </span>
                </form>
            </div>
            <?php
                                                        }
                                                        else{
                                                        ?>
            <ul>
                <li class="ok orta-menu">
                    <a id="giris" class="ok" onclick="gpaneliAc2()">
                        '.$username.'&nbsp;</a>
                </li>
            </ul>
            <div id="girispaneli2" onclick="gpaneliAc2()">
                <ul id="kullanici-menu">
                    <li>
                        <a>
                            <i class="r1"></i>
                            Özel Mesaj</a>
                    </li>
                    <li>
                        <a href="../members/'.$uye_id.'.php">
                            <i class="r2"></i>
                            Kullanıcı Sayfam</a>
                    </li>
                    <li>
                        <a>
                            <i class="r3"></i>
                            Listelerim</a>
                    </li>
                    <li>
                        <a>
                            <i class="r4"></i>
                            Takip Listem</a>
                    </li>
                    <li>
                        <a>
                            <i class="r5"></i>
                            İzleme listem</a>
                    </li>
                    <li>
                        <a>
                            <i class="r6"></i>
                            İzleyeceklerim</a>
                    </li>
                    <li>
                        <a>
                            <i class="r7"></i>
                            Favorilerim</a>
                    </li>
                    <li>
                        <a>
                            <i class="r8"></i>
                            Son Baktıklarım</a>
                    </li>
                    <li>
                        <a>
                            <i class="r9"></i>
                            Altyazılarım</a>
                    </li>
                    <li>
                        <a>
                            <i class="r10"></i>
                            Çeviri Duyurularım</a>
                    </li>
                    <li>
                        <a>
                            <i class="r11"></i>
                            Fragmanlarım</a>
                    </li>
                    <li>
                        <a>
                            <i class="r12"></i>
                            Oyladıklarım</a>
                    </li>
                    <li>
                        <a>
                            <i class="r13"></i>
                            Forum Başlıklarım</a>
                    </li>
                    <li>
                        <a>
                            <i class="r14"></i>
                            Forum İletilerim</a>
                    </li>
                    <li>
                        <a>
                            <i class="r15"></i>
                            Arkadaş Listem</a>
                    </li>
                    <li>
                        <a>
                            <i class="r16"></i>
                            Yorumlarım</a>
                    </li>
                    <li>
                        <a>
                            <i class="r17"></i>
                            Özetlerim</a>
                    </li>
                    <li>
                        <a>
                            <i class="r18"></i>
                            Bölüm Takibi</a>
                    </li>
                    <li>
                        <a href="../setting.php">
                            <i class="r19"></i>
                            Ayarlarım</a>
                    </li>
                    <li style="background: #c30;">
                        <a href="../cikis.php">
                            <i class="r20"></i>
                            Çıkış Yap</a>
                    </li>
                </ul>
            </div>
            <?php
                                                        }
                                                            ?>

            <div class="clear"></div>
        </div>

        <div id="govde">
            <div id="zemingovde">
                <div id="solgovde">
                    <div class="sblock">
                        <table>
                            <tr>
                                <td valign="top" style="border-right:1px solid #e8e8e8; width: 150px;">
                                    <div style="text-align: center; width:150px;">
                                        <img src="../<?php echo $uye_resim; ?>" width="100" height="104">
                                    </div>
                                    <div style="text-align: center; width:150px;">
                                        <a><img src="../img/profil_pm.png"></a>
                                    </div>
                                    <div class="kullanicipaneli">
                                        <ul>
                                            <li><a>İzleyici Biyografisi</a></li>
                                            <li><a>Forum Başlıkları</a></li>
                                            <li><a>Oylar</a></li>
                                            <li><a>İzleme Listesi</a></li>
                                            <li><a>IMDb Top250 ile karşılaştır</a></li>
                                            <li><a>TA Top250 ile karşılaştır</a></li>


                                        </ul>
                                    </div>
                                </td>
                                <td style="vertical-align: top; width: 100%;">
                                    <table style="width:100%;">
                                        <tr>
                                            <td style="border-bottom:1px solid black; width:20%;">
                                                <h1 style="font-weight: bold;font-size: 20px;display: inline;">
                                                    '.$uye_name.'</h1>
                                            </td>
                                            <td style="border-bottom:1px solid black;"></td>
                                            <td style="border-bottom:1px solid black;"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kayıt</b></td>
                                            <td>:</td>
                                            <td>'.$uye_kayit_tarih.'</td>
                                        </tr>
                                        <tr>
                                            <td><b>Son Giriş</b></td>
                                            <td>:</td>
                                            <td>'.$uye_son_giris.'</td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid black; width:26%;">
                                                <h1 style="font-weight: bold;font-size: 20px;display: inline;">İzleme
                                                    Listesi</h1>
                                            </td>
                                            <td style="border-bottom:1px solid black; width:5%;">
                                                <?php
                                                                        $izleme_list_sorgu = $db->query("SELECT * FROM izlemeliste WHERE userid = '.$uye_id.' ");
                                                                        $sayi = $izleme_list_sorgu->num_rows;
                                                                        if($sayi > 0){
                                                                      echo \'  <h1 style="font-weight: bold;font-size: 20px;display: inline;">(\'.$sayi.\')</h1>\';
                                                                       }
                                                                        ?>
                                            </td>
                                            <td style="border-bottom:1px solid black;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:100%;">
                                                <div>
                                                    <ul style="width:100%;">
                                                        <?php
                                                                                $izleme_list_sorgu = $db->query("SELECT * FROM izlemeliste WHERE userid = '.$uye_id.' ");
                                                                                
                                                                                while($izleme_list_dizi = $izleme_list_sorgu->fetch_assoc()){
                                                                                    $dizi_name = $izleme_list_dizi["diziadi"];
                                                                                    $sorgu2 = $db->prepare("SELECT * FROM yildizoy WHERE isim =?");
                                                                                    $sorgu2->bind_param("s",$dizi_name);
                                                                                    $sorgu2->execute();
                                                                                    $sorgu2->bind_result($id,$isim,$oy,$toplam,$poster,$yol,$tur,$yorum_pos);
                                                                                    while($sorgu2->fetch()){
                                                                                        $dizi_poster = $poster;
                                                                                        $dizi_adi = $isim;
                                                                                    }
                                                                                    echo \'
                                                                                    <li style="float:left;display:inline-block;margin-right:4px;">
                                                                                        <img style="width:95px; height :140px;" src="../\'.$dizi_poster.\'" >
                                                                                        <span style="display:block; text-align:center; font-size:11px;">\'.$dizi_adi.\'</span>
                                                                                    </li>
                                                                                    \';
                                                                                 }
                                                                                ?>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div id="sag-govde">
                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Film Altyazıları</a></h2>
                        </div>
                        <div class="alt-menu">
                            <a>Bugün</a>
                            <a>Bu Hafta</a>
                            <a>Bu Ay</a>
                            <a>Bu Yıl</a>
                            <a>Geçen Yıl</a>
                        </div>
                        <div class="alt-menu-icerik">
                            <ul>
                                <li>
                                    <a>Lorem ipsum dolor sit amet.</a>
                                </li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Dizi Altyazıları</a></h2>
                        </div>
                        <div class="alt-menu">
                            <a>Bugün</a>
                            <a>Bu Hafta</a>
                            <a>Bu Ay</a>
                            <a>Bu Yıl</a>
                            <a>Geçen Yıl</a>
                        </div>
                        <div class="alt-menu-icerik">
                            <ul>
                                <li>
                                    <a>Lorem ipsum dolor sit amet.</a>
                                </li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                            </ul>
                        </div>
                    </div>



                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Yakında</a></h2>
                        </div>
                        <div class="alt-menu">
                            <a>Bugün</a>
                            <a>Bu Hafta</a>
                            <a>Bu Ay</a>
                            <a>Bu Yıl</a>
                            <a>Geçen Yıl</a>
                        </div>
                        <div class="alt-menu-icerik">
                            <ul>
                                <li>
                                    <a>Lorem ipsum dolor sit amet.</a>
                                </li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div id="footer">
            <span id="eposta"></span>
            <span id="son">Türkçe Altyazı © 2007 - 2019</span>
        </div>
        <a id="yukari" href="#header" style="display:none;"></a>







    </div>
    <script src="../index.js"></script>
</body>

</html>
<?php
                                                    $db->close();
                                            ?>
';
chdir("members");
$DosyaAdi = $uye_id.".php";
touch($DosyaAdi);
$dosya_Ac = fopen($DosyaAdi,"w");
fwrite($dosya_Ac,$kullanici_sayfa_icerik);
fclose($dosya_Ac);
chdir("..");
header("Location:index.php");
}

}

}
else{
$sifre_esitligi=1;
}
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>TürkçeAltyazı</title>
    <link rel="stylesheet" href="main.css">
</head>

<body onscroll="yukari()">

    <div id="cerceve">
        <div id="header" onscroll="yukari()">
            <a id="hlogo" href="index.php" title="Altyazı"></a>
            <div id="Find">
                <ul>
                    <li onclick="menuac()" onmouseout="kapat()">
                        <a class="menu-bas-yazı">Altyazı</a>
                        <ul class="ust-menu" onmouseover="ac()">
                            <li><a class="ust-menu-yazı" onclick="yaz(0)">Altyazı</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(1)">Sanatçı</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(2)">Çevirmen</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(3)">Kelime</a></li>
                            <li><a class="ust-menu-yazı" onclick="yaz(4)">Forum</a></li>
                        </ul>
                    </li>
                </ul>
                <form method="POST" action="arama.php">
                    <input type="text" class="text-place" placeholder="Film / Dizi adı ya da IMDb linki giriniz" name="find">
                    <input type="submit" value="">
                </form>
            </div>
            <div id="social">
                <a id="Facebook"></a>
                <a id="Twitter"></a>
                <a id="Google"></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div id="menu">
                <ul>
                    <li class="orta-menu" onmouseover="ortamenuac(0)"><a href="index.php">Anasayfa</a>
                        <ul class="orta-menu-liste" style="display: block;">
                            <li><a href="" #>TA 250 Film</a></li>
                            <li><a href="" #>Imdb 250 Film</a></li>
                            <li><a href="" #>1001 Film</a></li>
                            <li><a href="" #>Yeni Çıkanlar</a></li>
                            <li><a href="" #>Beklenenler</a></li>
                            <li><a href="" #>Gelişmiş Film Arama</a></li>
                            <li><a href="" #>Dizi Takvimi</a></li>
                            <li><a href="" #>Gruplar</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(1)"><a>Forum</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Forum İçinde Ara</a></li>
                            <li><a href="#">Çeviri Duyuruları</a></li>
                            <li><a href="#">Kullanıcı Grupları</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(2)"><a>Altyazı</a>
                        <ul class="orta-menu-liste">
                            <li><a href="" #>Yeni Çıkanlar</a></li>
                            <li><a href="" #>Beklenenler</a></li>
                            <li><a href="" #>Son 100 Altyazı</a></li>
                            <li><a href="" #>Top 100 Altyazı</a></li>
                            <li><a href="" #>Altyazı Arama</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(3)"><a>Filmler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">TA 250 Film Listesi</a></li>
                            <li><a href="#">Imdb 250 Film Listesi</a></li>
                            <li><a href="#">1001 Film</a></li>
                            <li><a href="#">Gelişmiş Film Arama</a></li>
                            <li><a href="#">Pek Yakında</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(4)"><a>Diziler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Dizi Takvimi</a></li>
                            <li><a href="#">TA 50 Dizi Listesi</a></li>
                            <li><a href="#">IMDb 250 Dizi Listesi</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(5)"><a>Haberler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Sinema</a></li>
                            <li><a href="#">Dizi</a></li>
                            <li><a href="#">Film Kriterleri</a></li>
                            <li><a href="#">Özel Dosyalar</a></li>
                        </ul>
                    </li>
                    <li class="ok orta-menu" onmouseover="ortamenuac(6)"><a>Listeler</a>
                        <ul class="orta-menu-liste">
                            <li><a href="#">Film Listeleri</a></li>
                            <li><a href="#">Kullanıcı Listeleri</a></li>
                        </ul>
                    </li>
                    <li><a>Senkronizeler</a></li>
                    <li><a>Altyazı Gönder</a></li>
                    <li><a>Rastgele Film</a></li>
                </ul>
            </div>
            <?php 
            if(isset($_COOKIE["giris"]) && !isset($_SESSION["Kullanici"]) ){
                $giris_verileri = json_decode($_COOKIE["giris"]);
                $kadi=$giris_verileri->kullaniciadi;
                $sifre = $giris_verileri->parola;
                $giris_sorgusu = $db->query("SELECT * from uyeler WHERE username='$kadi' AND sifre='$sifre'");
                $giris_sorgusu_kontrol = $giris_sorgusu->num_rows;
                if($giris_sorgusu_kontrol > 0){
                    $_SESSION["Kullanici"] = $kadi;
                    header("Location:index.php");
                }
            
            
            
            }
            if(!isset($_SESSION["Kullanici"])){

            
            ?>
            <a id="giris" onclick="gpaneliAc()">Giriş</a>
            <a id="register" href="kayit.php">Kayıt</a>
            <div id="girispaneli" onclick="gpaneliAc()" style="display:none;">
                <form method="POST" action="uyegiris.php">
                    <input class="girisler" type="text" placeholder="Kullanıcı Adı" name="username" required="required">
                    <input class="girisler" type="password" placeholder="Parola" name="parola" required="required">
                    <input type="submit" value="Giriş">
                    <span>
                        <input type="checkbox" name="remember" value="1">Beni Hatırla
                    </span>
                </form>
            </div>
            <?php
            }
            else{
            ?> <ul>
                <li class="ok orta-menu">
                    <a id="giris" class="ok" onclick="gpaneliAc()"><?php echo $name; ?>&nbsp;</a>
                </li>
            </ul>

            <?php
            }
                ?>


            <div class="clear"></div>

        </div>
        <div id="govde">
            <div id="zemingovde">
                <div id="solgovde">
                    <div id="hata">
                        <?php
                                if(@$kullanici_adi_kontrol > 0){
                                    echo "Kullanici Adı Daha Önce Alınmış <br>";
                                    echo '<script>
                                        var hata = document.getElementById("hata");
                                        hata.style.display = "block";
                                        </script>';
                                }
                                if(@$eposta_kontrol > 0){
                                    echo "Eposta Daha Önce Kullanılmış <br>";
                                    echo '<script>
                                        var hata = document.getElementById("hata");
                                        hata.style.display = "block";
                                        </script>';
                                    
                                }
                                if(@$sifre_esitligi == 1){
                                    echo "Girdiğiniz Şifreler Birbirine Uyuşmuyor <br>";
                                    echo '<script>
                                        var hata = document.getElementById("hata");
                                        hata.style.display = "block";
                                        </script>';
                                    
                                }
                                ?>
                    </div>
                    <div class="sblock">

                        <?php
                    if(!$_GET){


                        ?>
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Türkçe Altyazı - Kayıt Anlaşması</a></h2>
                        </div>
                        <div style="padding:10px;">Bu sitenin yöneticileri ve bölüm yetkilileri her ne kadar itiraz
                            edilebilecek her türlü
                            materyali mümkün olduğu kadar kısa sürede siteden kaldıracak da olsa, bütün iletilerin
                            incelenmesi mümkün
                            olmamaktadır. Bu durumda siz buraya gönderilen her iletinin, onu gönderen kullanıcının
                            görüşlerini yansıttığını,
                            bölüm yetkililerinin, site yöneticilerinin (kendilerine ait iletiler dışında) sorumlu
                            tutulamayacağını peşinen
                            kabul etmiş bulunuyorsunuz.<br><br>Aşağılayıcı, müstehcen, kaba, iftira niteliğinde, nefret
                            dolu, tehdit edici,
                            sekse yönelik ya da kanunlarla çelişecek içerikler göndermeyeceğinizi kabul ediyorsunuz.
                            Bunları dikkate almamanız
                            durumunda hemen ve süresizce siteden uzaklaştırılırsınız (ve servis sağlayıcınız da haberdar
                            edilir). Her
                            iletinin IP adresi bunları engellemek için kaydedilmektedir. Bu sitenin yöneticileri veya
                            bölüm yetkililerini
                            kendi iradeleri doğrultusuna herhangi bir başlığı silme, taşıma, kilitleme yetkisi olduğunu
                            kabul ediyorsunuz.
                            Bir kullanıcı olarak her girdiğiniz bilginin veritabanında saklanacağını kabul ediyorsunuz.
                            Her ne kadar bu
                            bilgiler sizin bilginiz dışında 3. şahıslara verilmeyecek olsa da, herhangi bir 'hack' olayı
                            sonucunda bu
                            bilgiler 3. şahıslara dağılırsa bundan, Forum ya da Site Yöneticilerini sorumlu
                            tutamazsınız.<br><br>Bu site
                            sistemi, bazı bilgileri bilgisayarınızda saklamak için çerez'leri (cookie) kullanmaktadır.
                            Girdiğiniz özel
                            bilgilerin hiçbiri bu çerez'lerde (cookie) bulunmamaktadır, bunların tek amacı sitede daha
                            rahat bir gezinti
                            yapabilmenizdir. E-Posta adresiniz sadece kaydınızı onaylamak ve parolanızı yollamak içindir
                            (unuttuğunuz zaman
                            parolanızı yeniden yollamak için).<br><br>Aşağıdaki, kabul ediyorum linkine basmak sureti
                            ile yukarıdaki bütün
                            koşulların bağlayıcılığını kabul edersiniz.
                        </div>
                        <div id="ortala">
                            <a class="onaybut" href="kayit.php?gonder=kabul">Kabul Ediyorum</a>
                            <br><br>
                            <a class="onaybut" href="index.php">Bu Koşulları Kabul Etmiyorum</a>
                        </div>
                        <?php
                    }else{
                        $gelen = $_GET["gonder"];
                        if($gelen == "kabul"){
                            ?>
                        <div class="baslik">
                            <h2><a href="#" title="Hesap Bilgileri">Hesap bilgileri</a></h2>
                        </div>
                        <form method="POST" action="kayit.php?gonder=kabul">
                            <table border="0" width="100%">
                                <tr>
                                    <td class="soltab" width="38%">
                                        <span class="solic">
                                            Kullanıcı Adı: *
                                            <br>
                                        </span>
                                    </td>
                                    <td class="sagtab">
                                        <input type="text" maxlength="25" size="25" name="username" class="bilgi"
                                            style="border: 1px solid rgb(204, 204, 204);" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="soltab" width="38%">
                                        <span class="solic">
                                            E-Posta: *<br>
                                        </span>
                                    </td>
                                    <td class="sagtab">
                                        <input type="email" maxlength="25" size="25" name="eposta" class="bilgi"
                                            required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="soltab" width="38%">
                                        <span class="solic">
                                            Parola: *<br>
                                        </span>
                                    </td>
                                    <td class="sagtab">
                                        <input type="password" maxlength="25" size="25" name="sifre" class="bilgi"
                                            required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="soltab" width="38%">
                                        <span class="solic">
                                            Parolanızı Tekrar Girin: *<br>
                                        </span>
                                    </td>
                                    <td class="sagtab">
                                        <input type="password" maxlength="25" size="25" name="sifre2" class="bilgi"
                                            required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="28" align="center">
                                        <input type="image" src="img/submit.gif" value="Submit">
                                    </td>

                                </tr>

                            </table>
                        </form>

                        <?php
                        }
                        if($gelen != "kabul"){
                            echo "<a href='index.php'>&nbspAnasayfaya Dön</a>";
                        }
                    }
                    ?>

                    </div>
                    <!--SBLOCK SON-->

                </div>
                <div id="sag-govde">
                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Film Altyazıları</a></h2>
                        </div>
                        <div class="alt-menu">
                            <a>Bugün</a>
                            <a>Bu Hafta</a>
                            <a>Bu Ay</a>
                            <a>Bu Yıl</a>
                            <a>Geçen Yıl</a>
                        </div>
                        <div class="alt-menu-icerik">
                            <ul>
                                <li>
                                    <a>Lorem ipsum dolor sit amet.</a>
                                </li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Dizi Altyazıları</a></h2>
                        </div>
                        <div class="alt-menu">
                            <a>Bugün</a>
                            <a>Bu Hafta</a>
                            <a>Bu Ay</a>
                            <a>Bu Yıl</a>
                            <a>Geçen Yıl</a>
                        </div>
                        <div class="alt-menu-icerik">
                            <ul>
                                <li>
                                    <a>Lorem ipsum dolor sit amet.</a>
                                </li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                            </ul>
                        </div>
                    </div>



                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Yakında</a></h2>
                        </div>
                        <div class="alt-menu">
                            <a>Bugün</a>
                            <a>Bu Hafta</a>
                            <a>Bu Ay</a>
                            <a>Bu Yıl</a>
                            <a>Geçen Yıl</a>
                        </div>
                        <div class="alt-menu-icerik">
                            <ul>
                                <li>
                                    <a>Lorem ipsum dolor sit amet.</a>
                                </li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                                <li><a>Lorem ipsum dolor sit amet.</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div id="footer">
            <span id="eposta"></span>
            <span id="son">Türkçe Altyazı © 2007 - 2019</span>
        </div>
        <a id="yukari" href="#header" style="display:none;"></a>







    </div>
    <script src="index.js"></script>
</body>

</html>
<?php
$db->close();
?>