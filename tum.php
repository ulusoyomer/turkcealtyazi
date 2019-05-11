<?php
require_once("baglanti.php");
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
        <div id="header">
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
                echo '
          <script>
          if (typeof(Storage) !== "undefined") {
            sessionStorage.clear();
          }
           
          </script>      
                
                ';
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
                $k_adi = $_SESSION["Kullanici"];
                $uye_veri_sorgu = $db->query("SELECT * from uyeler WHERE username = '$k_adi'");
                $uye_veri = $uye_veri_sorgu->fetch_assoc();
                $uye_id = $uye_veri["id"];
                echo '
          <script>
                    if (typeof(Storage) !== "undefined") {
                        // Store
                        sessionStorage.setItem("Kullanici", "'.$k_adi.'");
                    
                    }
           
          </script>      
                
                ';

            ?> <ul>
                <li class="ok orta-menu">
                    <a id="giris" class="ok" onclick="gpaneliAc2()"><?php echo $name; ?>&nbsp;</a>
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
                        <a href="members/<?php echo $uye_id; ?>.php">
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
                        <a href="setting.php">
                            <i class="r19"></i>
                            Ayarlarım</a>
                    </li>
                    <li style="background: #c30;">
                        <a href="cikis.php">
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
                                <div id="bodyicerik">
                                        <div id="icerik" style="height: auto;">
                                        <?php
                                        $film_sorgu = $db->query("SELECT * FROM yildizoy ORDER BY id DESC");
                                        $film_sorgu_kontrol = $film_sorgu->num_rows;
                                        if($film_sorgu_kontrol > 0){
                                            while($film_verileri = $film_sorgu->fetch_assoc()){
                                                $name = $film_verileri["isim"];
                                                $poster =$film_verileri["poster"];
                                                $yol = $film_verileri["yol"];
                                                $tur = $film_verileri["tur"];
                                                echo'
                                                <a href="'.$yol.'">
                                                <img src="'.$poster.'" alt="'.$name.'" width="148" height="198">
                                                <span class="FilmName">'.$name.'</span>
                                                <span class="FilmYılı">LOREM / '.$tur.'</span>
                                                <span class="Ustbaslik">Yönetmen</span>
                                                <span class="alticerik">Lorem</span>
                                                <span class="Ustbaslik">Tür</span>
                                                <span class="alticerik">LOREM</span>
                                                <span class="Ustbaslik">Çevirmen</span>
                                                <span class="alticerik">Ömer Ulusoy</span>
                                                <span class="alticerik">
                                                    <span class="puan">PUAN</span>
                                                    <span class="sayı">LOREM</span>
                                                </span>
                                                <span class="Ustbaslik">Zaman</span>
            
            
                                            </a>
                                                    
                                                    ';
                                            }
                                        }
                                        ?>
                                            
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                        </div>
                </div>
                <div id="sag-govde">
                <div class="kisa-sol">
                            <div class="baslik" style="border-bottom:1px solid gray;">
                                <h2><a href="#" title="Son Eklenen Altyazılar">Son Eklenen Altyazılar</a></h2>
                            </div>
                            <div class="alt-menu-icerik">
                                <ul>
                                <?php
                                $altyazı_sorgu = $db->query("SELECT * FROM subs WHERE onay = '1' ORDER BY id DESC LIMIT 5");
                                while($veri = $altyazı_sorgu->fetch_assoc()){
                                    $diziname = $veri["diziname"];
                                    $sezon = $veri["sezon"];
                                    $bolum = $veri["bolum"];
                                    $g_adi= $veri["username"];
                                    $dizi_sorgu = $db->query("SELECT * FROM yildizoy WHERE isim = '$diziname'");
                                    $dizi_veri = $dizi_sorgu->fetch_assoc();
                                    $dizi_yol = $dizi_veri["yol"];
                                    echo '
                                        <li>
                                            <a href="'.$dizi_yol.'">'.$diziname.' S '.$sezon.' / B '.$bolum.' <span style="color:gray;font-size:10px;"> Gönderici '.$g_adi.' </span></a>
                                        </li>
                                        ';
                                }
                            ?>
                                </ul>
                            </div>
                        </div>

                        <div class="kisa-sol">
                                <div class="baslik">
                                    <h2><a href="#" title="Pek Yakında">AltYazı Gönderenler</a></h2>
                                </div>
                                <div class="alt-menu-icerik">
                                    <ul>
                                        <?php
                                        $altyazı_sorgu = $db->query("SELECT * FROM subs WHERE onay = '1' ORDER BY id DESC LIMIT 5");
                                            while($veri = $altyazı_sorgu->fetch_assoc()){
                                                $g_name = $veri["username"];
                                                $diziname = $veri["diziname"];
                                                $sezon = $veri["sezon"];
                                                $bolum = $veri["bolum"];
                                                $kullanici_sorgu = $db->query("SELECT * FROM uyeler WHERE username = '$g_name' ");
                                                $kullanici_veri = $kullanici_sorgu->fetch_assoc();
                                                $kullanici_id = $kullanici_veri["id"];
                                                echo '
                                                    <li>
                                                        <a href="members/'.$kullanici_id.'.php">'.$g_name.' <span style="font-size:10px;color:gray"> '.$diziname.' S '.$sezon.'/ B '.$bolum.'</span></a>
                                                    </li>
                                                    ';
                                            }
                                        ?>
                                    </ul>
                                </div>
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
    <script src="slider.js"></script>
</body>

</html>
<?php
$db->close();
?>