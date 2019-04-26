<?php
require_once("baglanti.php");
date_default_timezone_set('Europe/Istanbul');
if(isset($_POST["username"])){
    $name = $_POST["username"];

}
if(isset($_POST["parola"])){
    $parola =$_POST["parola"];
}
if(isset($_POST["remember"])){
$remember = $_POST["remember"];
}
@$parola = md5($parola);
@$giris_sorgusu = $db->query("SELECT * FROM uyeler WHERE username = '$name' AND sifre='$parola'");
if(@$giris_sorgusu){
    @$giris_sorgusu_kontrol = $giris_sorgusu->num_rows;
    if(@$giris_sorgusu_kontrol > 0){
        $_SESSION["Kullanici"] = $name;
        $date = date('d.m.Y H:i:s');
        $songiris_sorgu=$db->query("UPDATE uyeler SET songiris = '$date' WHERE username = '$name' AND sifre='$parola' ");
        if($remember == 1){
            $giris_verileri = array("kullaniciadi"=>"$name","parola"=>"$parola");
            $giris_verileri = json_encode($giris_verileri);
            setcookie("giris",$giris_verileri,time()+8400);
        }
        header("Location:index.php");
    }
    elseif(!isset($_POST["username"]) || !isset($_POST["parola"]) ){
        $girishata = 0;
    }
    else{
        $girishata = 1;
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
                header("Location:index.php");
            }
                ?>
            

            <div class="clear"></div>

        </div>
        <div id="govde">
            <div id="zemingovde">
                <form action="uyegiris.php" method="POST">
                    <div id="girisblogu">
                        <div id="girisbaslik">
                            <h5>
                                Kullanıcı Girşi
                            </h5>
                        </div>
                        <div id="girisformu">
                            <?php
                            if($girishata == 1){?> 
                            <span style="font-size:18px;color:red;"><strong>Kullanıcı Adı veya Şifre Hatalı</strong></span><br>
                            <?php
                            $girishata = 0;
                             }
                            ?>

                            <span style="font-size:14px"><strong>Kullanıcı Adı:</strong></span><br>
                            <input type="text" name="username" class="input" maxlength="25"><br>
                            <span style="font-size:14px"><strong>Parola:</strong></span><br>
                            <input type="password" name="parola" class="input" maxlength="25"><br>

                            <div style="margin-top:10px">
                                <div style="float:left;">
                                  <label style="display: block;padding-left: 15px;text-indent: -15px;">  
                                    <input type="checkbox" name="remember" value="1" style="width: 17px; height: 16px;padding: 0;margin: 0;vertical-align: bottom;position: relative;top: -1px;">
                                 Beni Hatırla
                                </label>
                                </div>
                            </div>
                            <div style="float:left;margin-left:124px;">
                                    <input type="submit" name="login" style="width:80px;" value="Giriş" class="ggiriş">
                            </div>   
                        </div>
                    </div>
                </form>
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