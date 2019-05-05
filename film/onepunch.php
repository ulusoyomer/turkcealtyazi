
<?php
require_once("../baglanti.php");
if(isset($_SESSION["Kullanici"])){
    $k_adi = $_SESSION["Kullanici"];
                $uye_veri_sorgu = $db->query("SELECT * from uyeler WHERE username = '$k_adi'");
                $uye_veri = $uye_veri_sorgu->fetch_assoc();
                $uye_id = $uye_veri["id"];
                $uye_resim = $uye_veri["uyeresim"];
                $uye_name = $uye_veri["username"];
                $uye_kayit_tarih = $uye_veri["tarih"];
                $uye_son_giris= $uye_veri["songiris"];
}
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
                        <?php echo $name; ?>&nbsp;</a>
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
                        <a href="../members/<?php echo $uye_id; ?>.php">
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
                        <div id="Baslik">
                            <h1>
                                One Punch Man </h1>
                            <h2>
                                One Punch Man </h2>
                            <span>50 dk</span>
                        </div>
                        <div class="alt-menu">
                            <a href="../film/onepunch.php?sayfa=dizidetay">Dizi Detay</a>
                            <a>Fragman</a>
                            <a>Görsel</a>
                            <a href="../film/onepunch.php?sayfa=yorum">Yorum</a>
                            <a>Tavsiye</a>
                            <a>Liste</a>
                            <a>Altyazılar</a>
                        </div>
                        <div class="dizi-detay"
                            style="display:<?php if(@$_GET["sayfa"] != "yorum" ||@$_GET["yorum"] == "dizidetay" || @!$_GET){ echo "block";}else{ echo "none";} ?>;">
                            <div id="sosyal">
                                <a class="facebook" href="#">&nbsp;</a>
                                <a class="twitter" href="#">&nbsp;</a>
                                <a class="google" href="#">&nbsp;</a>
                            </div>
                            <?php
                                $toplamsonucsorgusu = $db->query("SELECT * FROM yildizoy WHERE isim = 'One Punch Man'");
                                $toplamsonucverileri = $toplamsonucsorgusu->fetch_assoc();
                                $dizi_poster = $toplamsonucverileri["poster"];
                                $dizi_id = $toplamsonucverileri["id"];
                            ?>
                            <div class="afis-bolgesi">
                                <div class="afis">
                                    <div id="poster">
                                        <a>
                                            <img width="203" height="304" src="../<?php echo $dizi_poster; ?>">
                                        </a>
                                    </div>
                                    <div id="filminfo">
                                        <div class="awards">1 Golden Globe ödülü. 246 farklı ödül ve 419 adaylık. </div>
                                        <div class="top-list">TA Top 50 Dizi: <a href="">#1</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="dizi-bilgi">
                                <div class="rate">
                                    <div>
                                        
                                        <?php
                                        $toplamsonucsorgusu = $db->query("SELECT * FROM yildizoy WHERE isim = 'One Punch Man'");
                                        $kisi_sorgusu = $db->query("SELECT * FROM yildizoyatanlar WHERE diziname = 'One Punch Man'");
                                        $kisi_sayisi = $kisi_sorgusu->num_rows;
                                        if($kisi_sayisi > 0){
                                        $toplamsonucverileri = $toplamsonucsorgusu->fetch_assoc();
                                        $toplamsonuc = $toplamsonucverileri["oy"]/$toplamsonucverileri["toplam"];
                                        $yazısonuc = number_format($toplamsonuc,1,",","");
                                        $toplamsonuc = round($toplamsonuc);
                                        ?>
                                        <span class="dizi-puan" title="Oy"><?php echo "$yazısonuc";?></span>
                                        <?php
                                        }
                                        else{
                                            $toplamsonuc = 0;
                                            $yazısonuc = 0;
                                        }
                                        function oylayanlar($db){
                                            $oylayan_sorgu = $db->query("SELECT * FROM yildizoyatanlar WHERE diziname = 'One Punch Man' ORDER BY id DESC LIMIT 3");
                                            while($oylayan_veri = $oylayan_sorgu->fetch_assoc()){
                                                $oylayan_ad=$oylayan_veri["username"];
                                                echo "$oylayan_ad".", ";
                                            }
                                        }
                                        if(isset($_SESSION["Kullanici"])){
                                            $k_adi = $_SESSION["Kullanici"];
                                            $k_adiSorgusu = $db->query("SELECT * FROM yildizoyatanlar WHERE username ='$k_adi' AND diziname = 'One Punch Man'");
                                            $k_adiBilgileri = $k_adiSorgusu->fetch_assoc();
                                            $k_adiKontrol = $k_adiSorgusu->num_rows;
                                            if($k_adiKontrol > 0){
                                                $oyu = $k_adiBilgileri["puan"];

                                                ?>
                                        <div class="yıldızlar">
                                            <ul class="yıldızlar-rate">
                                                <li style="width:<?php echo $oyu*20; ?>px;"
                                                    class="kullanici-yildiz-sonuc">
                                                </li>

                                            </ul>
                                            <div style="font-size:12px;padding-left:2px;">
                                                <strong>
                                                    <?php echo $yazısonuc?></strong>/10 puan
                                                <a id="sayac" title="<?php oylayanlar($db);?>...">
                                                    <span>
                                                        <?php echo $kisi_sayisi; ?></span> kullanıcı
                                                </a>
                                                oyladı

                                            </div>

                                        </div>
                                        <!--Yıldızlar divi sonu-->
                                        <?php
                                            }
                                            else{
                                        ?>
                                        <div class="yıldızlar">
                                            <ul class="yıldızlar-rate">
                                                <li style="margin-left:0px;">
                                                    <a class="yildiz-1" href="../film/onepunch.php?puan=1">1</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-2" href="../film/onepunch.php?puan=2">2</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-3" href="../film/onepunch.php?puan=3">3</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-4" href="../film/onepunch.php?puan=4">4</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-5" href="../film/onepunch.php?puan=5">5</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-6" href="../film/onepunch.php?puan=6">6</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-7" href="../film/onepunch.php?puan=7">7</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-8" href="../film/onepunch.php?puan=8">8</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-9" href="../film/onepunch.php?puan=9">9</a>
                                                </li>
                                                <li>
                                                    <a class="yildiz-10" href="../film/onepunch.php?puan=10">10</a>
                                                </li>
                                            </ul>
                                            <div style="font-size:12px;padding-left:2px;">
                                                <strong>
                                                    <?php echo $yazısonuc?></strong>/10 puan
                                                <a id="sayac" title="<?php oylayanlar($db);?>...">
                                                    <span>
                                                        <?php echo $kisi_sayisi; ?></span> kullanıcı
                                                </a>
                                                oyladı

                                            </div>

                                        </div>
                                        <!--Yıldızlar divi sonu-->
                                        <?php
                                         } }
                                        else{
                                        ?>
                                        <div class="yıldızlar">
                                            <ul class="yıldızlar-rate">
                                                <li style="width:<?php echo $toplamsonuc*20 ?>px;" class="yildiz-sonuc">
                                                </li>
                                            </ul>
                                            <div style="font-size:12px;padding-left:2px;">
                                                <strong>
                                                    <?php echo $yazısonuc?></strong>/10 puan
                                                <a id="sayac" title="<?php oylayanlar($db);?>...">
                                                    <span>
                                                        <?php echo $kisi_sayisi; ?></span> kullanıcı
                                                </a>
                                                oyladı

                                            </div>

                                        </div>
                                        <!--Yıldızlar divi sonu-->
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="infos">
                                    <div class="linfos">Yönetmen:</div>
                                    <div class="rinfos">
                                        <a title="Alan Taylor" itemprop="url"><span itemprop="name">Alan
                                                Taylor</span></a>,
                                        <a title="David Nutter" itemprop="url"><span itemprop="name">David
                                                Nutter</span></a>,
                                        <a title="Alex Graves" itemprop="url"><span itemprop="name">Alex
                                                Graves</span></a>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Senaryo:</div>
                                    <div class="rinfos">
                                        <a title="Alan Taylor" itemprop="url"><span itemprop="name">Alan
                                                Taylor</span></a>,
                                        <a title="David Nutter" itemprop="url"><span itemprop="name">David
                                                Nutter</span></a>,
                                        <a title="Alex Graves" itemprop="url"><span itemprop="name">Alex
                                                Graves</span></a>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Ülke</div>
                                    <div class="rinfos">
                                        <a title="Alan Taylor" itemprop="url"><span itemprop="name">Alan
                                                Taylor</span></a>,
                                        <a title="David Nutter" itemprop="url"><span itemprop="name">David
                                                Nutter</span></a>,
                                        <a title="Alex Graves" itemprop="url"><span itemprop="name">Alex
                                                Graves</span></a>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Sezon</div>
                                    <div class="rinfos">
                                        <span itemprop="name">8</span>

                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Gelecek Bölüm</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>

                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Tür:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Rating:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Vizyon Tarihi</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Dil:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Müzik:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Web Sitesi:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Çekim Yeri:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Kelimeler:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="linfos">Nam-ı Diğer:</div>
                                    <div class="rinfos">
                                        <span itemprop="name">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit.</span>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <?php
                            if(isset($_SESSION["Kullanici"])){  
                            ?>
                            <div id="alt-butonlar">
                                <a href="agonder.php?diziname=One Punch Man">Altyazı Gönder</a>
                                <?php
                                $k_adi = $_SESSION["Kullanici"];
                                $secenek_sorgu = $db->query("SELECT * FROM izlemeliste WHERE userid = '$uye_id' AND diziadi = 'One Punch Man'");
                                $secenek_kontrol = $secenek_sorgu->num_rows;
                                if($secenek_kontrol > 0){
                                ?>
                                <a href="../film/onepunch.php?altsecenek=leklecik">Listemden Çıkar</a>
                                <?php
                                }
                                else{
                                ?>
                                <a href="../film/onepunch.php?altsecenek=lekle">Listeme Ekle</a>
                                <?php
                                }
                                ?>
                                <a>Altyazı Takibi</a>
                                <a>İzledim</a>
                                <a>Tavsiye Ekle</a>
                                <a>İzleyeceğim</a>
                            </div>
                            <?php
                            if(isset($_GET["altsecenek"])){
                                if($_GET["altsecenek"] == "lekle"){
                                    $k_adi = $_SESSION["Kullanici"];
                                    $liste_ekle_sorgu = $db->query("INSERT INTO izlemeliste (diziadi,userid) values ('One Punch Man','$uye_id')");
                                    header("Location:../film/onepunch.php");
                                }
                                elseif($_GET["altsecenek"] == "leklecik"){
                                    $liste_ekle_kaldir_sorgu = $db->query("DELETE from izlemeliste WHERE userid = '$uye_id' AND diziadi = 'One Punch Man'");
                                    header("Location:../film/onepunch.php");
                                }
                                else{
                                    header("Location:../film/onepunch.php");
                                }
                            }
                            }
                            ?>
                        </div>

                    </div>
                    <div id="dizi-ozet"
                        style="display:<?php if(@$_GET["sayfa"] != "yorum" ||@$_GET["yorum"] == "dizidetay" || @!$_GET){ echo "block";}else{ echo "none";} ?>;">
                        <div class="sblock">
                            <div class="alt-Baslik">
                                <h5>
                                    Oyuncular
                                </h5>
                            </div>
                            <div id="portre2">
                                <ul>
                                    <li>
                                        <span class="oyuncu-ad">Aaron Paul</span>
                                        <a href="" title="Aaron Paul" onmouseover="karart(0)" onmouseout="rengiac(0)">
                                            <img src="filmOyuncu/aaron.jpg" alt="Aaron Paul" width="100" height="120"
                                                class="oyuncu-resim">
                                        </a>
                                    </li>
                                    <li><span class="oyuncu-ad">Brayn Craston</span>
                                        <a href="" title="Brayn Craston" onmouseover="karart(1)"
                                            onmouseout="rengiac(1)">
                                            <img src="filmOyuncu/Brayn.jpg" alt="Bryan Cranston" width="100"
                                                height="120">
                                        </a>
                                    </li>
                                </ul>
                            </div>



                        </div>
                        <!--SBLOCK SON-->
                        <div class="sblock">
                            <div class="alt-Baslik">
                                <h5>
                                    Özet
                                </h5>
                            </div>
                            <div class="ozet-goster" style="border-bottom:1px solid #dbdbdb;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat praesentium magni
                                repudiandae illo itaque assumenda eius error, temporibus atque nihil repellat id sed
                                dicta
                                laborum eligendi. Blanditiis ratione maiores tenetur repellendus reiciendis consectetur
                                repudiandae provident vitae officia quidem odio reprehenderit, ex possimus optio ipsam
                                architecto! Asperiores, dignissimos amet? Eveniet dignissimos animi ducimus molestiae
                                libero
                                recusandae itaque dolorum expedita quaerat sed qui error minima eum ut vero minus,
                                dolores,
                                alias amet veniam enim, optio suscipit. Necessitatibus sed rerum tempora, placeat
                                maxime
                                modi nesciunt qui neque, ex expedita aliquam facere dolore voluptatibus, voluptatem
                                officiis
                                esse asperiores iusto labore nisi unde libero ullam!
                            </div>
                            &nbsp;<a class="ozet-gonder" href="">Özet Gönderin</a>
                            <span class="inceleme-gonder"><a class="ozet-gonder" href="">Özet Gönderin</a></span>



                        </div>
                    </div>

                    <div id="dizi-yorumlari"
                        style="display:<?php if(@$_GET["sayfa"] == "yorum"){echo "block";}else{echo "none";}?>;">
                        <?php
                            if(isset($_SESSION["Kullanici"])){
                                $k_adi = $_SESSION["Kullanici"];
                            ?>
                        <div class="sblock comment-block">
                            <form method="POST" action="../film/onepunch.php">
                                <div class="alt-Baslik">
                                    <h5>
                                        <img class="avatar" src="../<?php echo $uye_resim; ?>" width="40" height="40">
                                        <span><?php echo $k_adi; ?></span>
                                        <span style="float:right;font-size:12px;">
                                            Bir Bölüm için Yorum Yapınız
                                            <select name="dizi_sezon" style="text-align:right;padding:1px 4px;">
                                                <option value="0">Sezon</option>
                                                <option value="1">1.Sezon</option>
                                                <option value="2">2.Sezon</option>
                                                <option value="3">3.Sezon</option>
                                                <option value="4">4.Sezon</option>
                                                <option value="5">5.Sezon</option>
                                                <option value="6">6.Sezon</option>
                                                <option value="7">7.Sezon</option>
                                                <option value="8">8.Sezon</option>
                                            </select>
                                            <select name="dizi_bolum" style="text-align:right;padding:1px 4px;">
                                                <option value="0">Bölüm</option>
                                                <option value="1">1.Bölüm</option>
                                                <option value="2">2.Bölüm</option>
                                                <option value="3">3.Bölüm</option>
                                                <option value="4">4.Bölüm</option>
                                                <option value="5">5.Bölüm</option>
                                                <option value="6">6.Bölüm</option>
                                                <option value="7">7.Bölüm</option>
                                                <option value="8">8.Bölüm</option>
                                                <option value="9">9.Bölüm</option>
                                                <option value="10">10.Bölüm</option>
                                            </select>
                                        </span>
                                    </h5>
                                </div>
                                <div class="comment-alt">
                                    <textarea maxlength="420" name="comments"
                                        style="padding:4px;font-size:14px;width:680px;height:100px;box-sizing: border-box;resize: none;"
                                        required="required"></textarea>
                                    <input type="submit" value="YORUM GÖNDER">
                                </div>
                            </form>

                        </div>
                        <?php
                        if(isset($_POST["comments"])){
                            $comment = filtre($_POST["comments"]);
                            if($_POST["dizi_sezon"] > 0){
                                $dizi_sezon = $_POST["dizi_sezon"];
                            }
                            else{
                                $dizi_sezon = 0;
                            }
                            if($_POST["dizi_bolum"] > 0){
                                $dizi_bolum = $_POST["dizi_bolum"];
                            }
                            else{
                                $dizi_bolum = 0;
                            }
                            if(($dizi_bolum > 0 && $dizi_sezon == 0) || ($dizi_bolum == 0 && $dizi_sezon > 0)){
                                $dizi_bolum = 0;
                                $dizi_sezon = 0;
                            }
                            $yorumyapan_adi = $_SESSION["Kullanici"];
                            $yorumekleme_sorgusu = $db->query("INSERT INTO yorumlar (username,yorum,diziadi,begeni,dizibolum,dizisezon) values('$yorumyapan_adi','$comment','One Punch Man',0,'$dizi_bolum',' $dizi_sezon')");
                            $yorum_say_sorgu = $db->query("SELECT * FROM yorumlar WHERE diziadi = 'One Punch Man'");
                            $yorum_say_sayfa = $yorum_say_sorgu->num_rows;
                            $son_sayfa = $yorum_say_sayfa / 5;
                            $son_sayfa = ceil($son_sayfa);   
                            header("Location:../film/onepunch.php?sayfa=yorum");
                            
                        }
                                }
                                    ?>
                        <!--SBLOCK SON-->
                        <div class="yorumlar-baslik">
                            <div style="float: left;color: #fff;font-weight: bold;">
                                Yorumlar
                            </div>
                        </div>

                        <?php
                        if(isset($_GET["yorums"])){
                            if($_GET["yorums"] > 0){
                                $sayfa = $_GET["yorums"]-1;
                                $sayfa = $sayfa * 5;
                                $sayfa_num = $_GET["yorums"];
                            }
                            else{
                                $sayfa = 0;
                                $sayfa_num = 1;
                            }
                            
                        }
                        else{
                            $sayfa = 0;
                            $sayfa_num = 1;
                        }
                        $sayfa_yorum_yazdirma_sorgusu = $db->query("SELECT * FROM yorumlar WHERE diziadi='One Punch Man' ORDER BY id DESC LIMIT $sayfa,5");
                        $sayfa_yorum_yazdirma_kontrol = $sayfa_yorum_yazdirma_sorgusu->num_rows;
                        $son_sayfa_sorgu = $db->query("SELECT * FROM yorumlar WHERE diziadi='One Punch Man'");
                        $yorum_num = $son_sayfa_sorgu->num_rows;
                        $son_sayfa = $yorum_num;
                        $son_sayfa/=5;
                        $son_sayfa = ceil($son_sayfa);
                        $div_id=0;
                        if($sayfa_yorum_yazdirma_kontrol > 0){
                            while($yorumun_verileri = $sayfa_yorum_yazdirma_sorgusu->fetch_assoc()){
                                $yorum_metni = $yorumun_verileri["yorum"];
                                $yorumcunun_adi = $yorumun_verileri["username"];
                                $yorumcu_resim_sorgu = $db->query("SELECT * FROM uyeler WHERE username = '$yorumcunun_adi'");
                                $yorumcu_resim_veri = $yorumcu_resim_sorgu->fetch_assoc();
                                $uye_resim = $yorumcu_resim_veri["uyeresim"];
                                $uye_id = $yorumcu_resim_veri["id"];
                                $yorum_tarih = $yorumun_verileri["tarih"];
                                $yorum_begeni = $yorumun_verileri["begeni"];
                                $yorum_id = $yorumun_verileri["id"];
                                $yorum_kacinci = $yorum_id-1;
                                $yorum_dizi_bolum = $yorumun_verileri["dizibolum"];
                                $yorum_dizi_sezon = $yorumun_verileri["dizisezon"];
                                echo '
                                <div class="sblock yorumcu-yorumlari" style="display:block">
                            <div class="yorumcu-avatar" style="width: 45px;float: left;">
                                <img style="width: 40px;" src="../'.$uye_resim.'" alt="avatar">
                            </div>
                            <div class="yorumcu-bilgi-yorum" style="width: 620px; float: left;">
                                <div>
                                    <a style="color: #069;text-decoration: none;font-size: 14px;display:inline;" href="../members/'.$uye_id.'.php">
                                        <b>
                                            <span style="color: #808000;display:inline;">'.$yorumcunun_adi.'</span>
                                        </b>
                                    </a>
                                    <span style="color:#888;display:inline;">'.$yorum_tarih.'</span>
                                    ';
                                    if($yorum_dizi_bolum > 0 && $yorum_dizi_sezon > 0){
                                    echo'
                                    <span style="color:#888;display:inline;">Sezon : '.$yorum_dizi_sezon.'</span>
                                    <span style="color:#888;display:inline;">Bölüm : '.$yorum_dizi_bolum.'</span>
                                    ';
                                    }
                                    echo'
                                </div>

                            </div>
                            <div class="yorumcu-yorumu">
                            '.$yorum_metni.'
                            </div>
                            ';
                            $altyorumbul_sorgu = $db->query("SELECT * FROM altyorum WHERE ustyorumid = '$yorum_id'");
                            $altyorumbul_kontol = $altyorumbul_sorgu->num_rows;
                            if(isset($_SESSION["Kullanici"])){
                                $altyorumekleAc = "altyorumekleAc($div_id)";
                            }
                            else{
                                
                                $altyorumekleAc = "uyegiris($div_id)";
                            }
                            if($altyorumbul_kontol >=0){
                                echo '<div class="alt-yorum" style="margin-top:15px;margin-left:50px;display:block;">
                                <a class="a-cevaplar" style="float:none;" onclick="altCevapAc('.$div_id.')">Cevaplar&nbsp;('.$altyorumbul_kontol.')</a>
                                <div class="alt-yorumlar" style="display:none;" id="alt-yorumlar'.$div_id.'">';
                                while(@$altyorum_verileri = $altyorumbul_sorgu->fetch_assoc()){
                                    $altyorum_comment = $altyorum_verileri["yorum"];
                                    $altyorum_username = $altyorum_verileri["username"];
                                    $alt_yorum_id = $altyorum_verileri["id"];
                                    $alt_yorum_begeni = $altyorum_verileri["begeni"];
                                    $altyorum_resim = $db->query("SELECT * FROM uyeler WHERE username = '$altyorum_username'");
                                    $veri = $altyorum_resim->fetch_assoc();
                                    $uye_resim = $veri["uyeresim"];
                                    $uye_id = $veri["id"];
                                    $altyorum_tarih = $altyorum_verileri["tarih"];
                                    echo '<div class="a-yorum">
                                    <div class="yorumcu-avatar" style="width: 45px;float: left;">
                                        <img style="width: 40px;" src="../'.$uye_resim.'" alt="avatar">
                                    </div>
                                    <div class="yorumcu-bilgi-yorum" style="float: left; width: 510px;">
                                        <div>
                                            <a
                                                style="color: #069;text-decoration: none;font-size: 14px;display:inline;" href="../members/'.$uye_id.'.php">
                                                <b>
                                                    <span style="color: #808000;display:inline;">'.$altyorum_username.'</span>
                                                </b>
                                            </a>
                                            <span style="color:#888;display:inline;">'.$altyorum_tarih.'</span>
                                        </div>
                                    </div>
                                    <div class="yorumcu-yorumu">
                                        '.$altyorum_comment.'
                                    </div>
                                    <div style="margin-top:10px; margin-left:20px;">';
                                    if(@isset($_SESSION["Kullanici"])){ 
                                        if(isset($_GET["yorums"])){
                                            if($_GET["yorums"] > 0){
                                                $sayfa = $_GET["yorums"];
                                            }
                                        }
                                        else{
                                            $sayfa = 1;
                                        }
                                        $begeni_sorgu=$db->query("SELECT * FROM aybegeni WHERE username = '$uye_name' AND ayid = '$alt_yorum_id' AND begeni = '1'");
                                        $begeni_sorgu_kontrol = $begeni_sorgu->num_rows;
                                        if($begeni_sorgu_kontrol > 0){
                                            echo'
                                        <a href="../film/onepunch.php?sayfa=yorum&like2=1&yorum='.$alt_yorum_id.'&yorums='.$sayfa.'"><span class="unlike-butonu"></span></a> 
                                       
                                        ';
                                        }
                                        else{
                                            echo'
                                        <a href="../film/onepunch.php?sayfa=yorum&like2=1&yorum='.$alt_yorum_id.'&yorums='.$sayfa.'"><span class="like-butonu"></span></a>
                                        ';
                                        }
                                    }
                                    else{
                                        echo'
                                        <span class="like-butonu" onclick="uyegiris('.$div_id.')"></span>
                                        ';
                                    }
                                    
                                   echo'
                                   <a><span class="like-sayac" alt="">'.$alt_yorum_begeni.'</span></a>
                                    <div class="clear"></div> 
                                   </div>
                                    <div style="margin-top:10px; margin-left:20px;">
                                    ';
                                    $begenenler_sorgu = $db->query("SELECT * FROM aybegeni WHERE ayid = '$alt_yorum_id' AND begeni = '1' ORDER BY id DESC LIMIT 3");
                                $begenenler_sorgu_kontrol = $begenenler_sorgu->num_rows;
                                if($begenenler_sorgu_kontrol > 0){
                                    while($veri = $begenenler_sorgu->fetch_assoc()){
                                        $b_adi = $veri["username"];
                                        echo'
                                             <span style=" display:inline-block;background:#F3F3F3; color:#111111; padding:2px 8px; font-size:15px;">'.$b_adi.'</span>&nbsp;
                                             
                                            ';
                                    }
                                    echo '
                                    <a style="display:inline-block;" href="likeatanlar.php?likeslist=2&yorumid='.$alt_yorum_id.'">...</a>
                                    ';
                                }
                                    echo '
                                    
                                    </div>                                       
                                </div>';
                                }
                                echo '</div>
                                </div>';
                            }
                            echo '
                            <div class="yorum-alt-secenekler" style="width:510px;margin-left: 50px;margin-top: 25px;">';
                            if(@isset($_SESSION["Kullanici"])){ 
                                if(isset($_GET["yorums"])){
                                    if($_GET["yorums"] > 0){
                                        $sayfa = $_GET["yorums"];
                                    }
                                }
                                else{
                                    $sayfa = 1;
                                }
                                $begeni_sorgu=$db->query("SELECT * FROM ybegeni WHERE username = '$uye_name' AND yid = '$yorum_id' AND begeni = '1'");
                                $begeni_sorgu_kontrol = $begeni_sorgu->num_rows;
                                if($begeni_sorgu_kontrol > 0){
                                    echo'
                                <a href="../film/onepunch.php?sayfa=yorum&like=1&yorum='.$yorum_id.'&yorums='.$sayfa.'"><span class="unlike-butonu"></span></a> 
                                ';
                                }
                                else{
                                    echo'
                                <a href="../film/onepunch.php?sayfa=yorum&like=1&yorum='.$yorum_id.'&yorums='.$sayfa.'"><span class="like-butonu"></span></a> 
                                ';
                                }
                            }
                            else{
                                echo'
                                <span class="like-butonu" onclick="uyegiris('.$div_id.')"></span>
                                ';
                            }
                                echo'
                               <a><span class="like-sayac" alt="">'.$yorum_begeni.'</span></a>
                                <span style="float:left;margin-top: 5px;margin-left: 5px;">|';
                                echo'
                                    <a class="alt-cevap-ekle" onclick="'.$altyorumekleAc.'">
                                        Cevapla
                                    </a>
                                </span>
                                <div>&nbsp;</div>
                            </div>
                            <div class="clear"></div>
                            <div style="margin-left:50px;">
                                ';
                                $begenenler_sorgu = $db->query("SELECT * FROM ybegeni WHERE yid = '$yorum_id' AND begeni = '1' ORDER BY id DESC LIMIT 3");
                                $begenenler_sorgu_kontrol = $begenenler_sorgu->num_rows;
                                if($begenenler_sorgu_kontrol > 0){
                                    while($veri = $begenenler_sorgu->fetch_assoc()){
                                        $b_adi = $veri["username"];
                                        echo'
                                             <span style=" display:inline-block;background:#F3F3F3; color:#111111; padding:2px 8px; font-size:15px;">'.$b_adi.'</span>&nbsp;
                                            ';
                                    }
                                    echo '
                                    <a style="display:inline-block;" href="likeatanlar.php?likeslist=1&yorumid='.$yorum_id.'">...</a>
                                    ';
                                }
                                echo'
                            </div>
                            <div class ="giris-yap" style="color:red;font-size:14px;display:none;margin-left:50px;"><strong>Lütfen Giriş Yapınız</strong></div>
                            <div class="cevapla-alani" style="display:none;" id="alt_yor'.$div_id.'">
                                <form action="../film/onepunch.php" method="POST">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                            <td colspan="2" align="center">';
                                            if(isset($_GET["yorums"])){
                                                if($_GET["yorums"] > 0){
                                                    $sayfa = $_GET["yorums"];
                                                }
                                                else{
                                                    $sayfa = 1;
                                                }
                                            }
                                            echo'
                                                <input type="radio" style="display:none" name="ust-yorum-id" value="'.$yorum_id.'" checked>
                                                <input type="radio" style="display:none" name="yorums" value="'.$sayfa.'" checked>
                                                <textarea maxlength="370" name="a-comments"
                                                    style="padding: 4px;font-size: 14px;width: 598px;height: 100px;box-sizing: border-box;resize: none;"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <div class="alt-yorum-gonder">
                                                    <input type="submit" value="Gönder"
                                                        style="border:1px solid gray;background:white;padding:3px; cursor: pointer;">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                        </div>
                                
                                ';
                                $div_id++;
                            }
                        }
                        ?>
                        <?php
                            if(isset($_POST["a-comments"])){
                                $alt_yorum = filtre($_POST["a-comments"]);
                                if(isset($_POST["ust-yorum-id"])){
                                    $ust_yorum_id = $_POST["ust-yorum-id"];
                                    $yorumcunun_adi =$_SESSION["Kullanici"];
                                    $altyorumekle_sorgu = $db->query("INSERT INTO altyorum (ustyorumid,username,yorum,ididizi) values ('$ust_yorum_id','$yorumcunun_adi','$alt_yorum','$dizi_id')");
                                    $sayfa = $_POST["yorums"];
                                    header("Location:../film/onepunch.php?sayfa=yorum");
                                    
                                    
                                    
                                }
                                
                            }
                            
                            
                        ?>

                    </div>
                    <?php
                        if($son_sayfa > 1 && @($_GET["sayfa"] == "yorum") ){

                        
                    ?>
                    <div class="sblock page" style="background: none; border: none;">
                        <div style="width: 50%; margin:5px auto;">
                            <?php
                        if($son_sayfa > 3){
                            if($sayfa_num < 3 ){
                        ?>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php if($sayfa_num != 1){echo $sayfa_num-1;}  ?>">
                                < Önceki</a> <a
                                    class="<?php if($sayfa_num == 1){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                    <?php if($sayfa_num != 1){echo 'href="../film/onepunch.php?sayfa=yorum&yorums=1"';} ?>>
                                    1
                            </a>
                            <a class="<?php if($sayfa_num == 2){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                <?php if($sayfa_num != 2){echo 'href="../film/onepunch.php?sayfa=yorum&yorums=2"';} ?>>2</a>
                            <a class="sayfalama" href="../film/onepunch.php?sayfa=yorum&yorums=3">3</a>
                            ...
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php echo $son_sayfa;  ?>"><?php echo $son_sayfa;  ?></a>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php if($sayfa_num != $son_sayfa){echo $sayfa_num+1;}  ?>">Sonraki
                                ></a>

                            <?php
                            }
                            elseif($sayfa_num > $son_sayfa-2){
                           ?>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php if($sayfa_num != 1){echo $sayfa_num-1;}  ?>">
                                < Önceki</a> <a class="sayfalama" href="../film/onepunch.php?sayfa=yorum&yorums=1">1
                            </a>
                            ...
                            <a class="<?php if($sayfa_num == $son_sayfa-2){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                <?php if($sayfa_num != $son_sayfa-2){echo 'href="../film/onepunch.php?sayfa=yorum&yorums='.($son_sayfa-2).'"';} ?>><?php echo $son_sayfa-2;  ?></a>
                            <a class="<?php if($sayfa_num == $son_sayfa-1){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                <?php if($sayfa_num != $son_sayfa-1){echo 'href="../film/onepunch.php?sayfa=yorum&yorums='.($son_sayfa-1).'"';} ?>><?php echo $son_sayfa-1;  ?></a>
                            <a class="<?php if($sayfa_num == $son_sayfa){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                <?php if($sayfa_num != $son_sayfa){echo 'href="../film/onepunch.php?sayfa=yorum&yorums='.$son_sayfa.'"';} ?>><?php echo $son_sayfa;  ?></a>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php if($sayfa_num != $son_sayfa){echo $sayfa_num+1;}  ?>">Sonraki
                                ></a>
                            <?php
                            }elseif($sayfa_num >= 3){
                           ?>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php if($sayfa_num != 1){echo $sayfa_num-1;}  ?>">
                                < Önceki</a> <a class="sayfalama" href="../film/onepunch.php?sayfa=yorum&yorums=1">1
                            </a>
                            ...
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php echo $sayfa_num-1; ?>"><?php echo $sayfa_num-1;  ?></a>
                            <a class="aktifsayfa"><?php echo $sayfa_num;  ?></a>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php echo $sayfa_num+1;  ?>"><?php echo $sayfa_num+1;  ?></a>
                            ...
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php echo $son_sayfa;  ?>"><?php echo $son_sayfa;  ?></a>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php if($sayfa_num != $son_sayfa){echo $sayfa_num+1;}  ?>">Sonraki
                                ></a>
                            <?php
                            }
                           ?>
                            <?php
                        }else{
                        ?>
                            <a class="sayfalama"
                                href="../film/onepunch.php?sayfa=yorum&yorums=<?php if($sayfa_num != 1){echo $sayfa_num-1;}  ?>">
                                < Önceki</a> <a
                                    class="<?php if($sayfa_num == 1){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                    <?php if($sayfa_num != 1){echo 'href="../film/onepunch.php?sayfa=yorum&yorums=1"';} ?>>
                                    1
                            </a>
                            <a class="<?php if($sayfa_num == 2){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                <?php if($sayfa_num != 2){echo 'href="../film/onepunch.php?sayfa=yorum&yorums=2"';} ?>>2</a>
                            <?php
                                if($son_sayfa == 3){
                            ?>
                            <a class="<?php if($sayfa_num == 3){echo "aktifsayfa";} else{echo "sayfalama";} ?>"
                                <?php if($sayfa_num != 3){echo 'href="../film/onepunch.php?sayfa=yorum&yorums=3"';} ?>>3</a>
                            <?php
                                }
                            ?>
                            <?php }
                        ?>
                        </div>
                    </div>
                    <?php
                        }
                        $subs_sorgu = $db->query("SELECT * FROM subs WHERE diziname='One Punch Man' AND onay = '1' ");
                        $subs_sorgu_kontrol = $subs_sorgu->num_rows;
                        $sezonlar = array();
                        if($subs_sorgu_kontrol > 0){
                            $sezon_kontrol = $db->query("SELECT DISTINCT sezon FROM subs WHERE diziname='One Punch Man' AND onay = '1' ORDER BY sezon DESC");
                            while($deger = $sezon_kontrol->fetch_assoc()){
                                array_push($sezonlar,$deger["sezon"]);
                            }
                            for($i = 0 ;$i<count($sezonlar);$i++){
                                $s = $sezonlar[$i];
                                $altyazı_bul = $db->query("SELECT * FROM subs WHERE sezon = '$s' AND onay = 1 AND diziname='One Punch Man' ORDER BY bolum ");
                                ?>
                                <div class="sblock" style="display:<?php if(@$_GET["sayfa"] != "yorum" ||@$_GET["yorum"] == "dizidetay" || @!$_GET){ echo "block";}else{ echo "none";} ?>">
                                    <div class="alt-Baslik" align="center">
                                        <h5 id="sezon-baslik">
                                        <a onclick="acAltyazi(<?php echo $s; ?>)" style="display:inline-block; width:100%;height:100%;"><?php 
                                        if($s == 0){echo "Film Altyazısı";} 
                                        else{echo $s .". Sezon";} 
                                        ?></a>
                                        </h5>
                                    </div>
                                    <div class="ozet-goster" id="<?php echo $s; ?>sezona" style="border-bottom:1px solid #dbdbdb;display:block;" >
                                        <table cellspacing="0" cellpadding="4" border="0" style="width:100%;">
                                            <tr class="tr15">
                                                <td class="td15" align="center">Alt Yazıyı Gönderen</td>
                                                <td class="td15" align="center">Bölüm</td>
                                                <td class="td15" align="center">Yorum</td>
                                                <td class="td15" align="center">Gönderilen Tarih</td>
                                                <td class="td15" align="center">Dil</td>
                                                <td class="td15" align="center">İndir</td>
                                            </tr>
                                            <?php
                                            while($a_degerler = $altyazı_bul->fetch_assoc()){
                                                $g_adi = $a_degerler["username"];
                                                $a_yolu = $a_degerler["diziyolu"];
                                                $a_yorum = $a_degerler["diziyorum"];
                                                $a_dil = $a_degerler["dil"];
                                                $a_tarih = $a_degerler["zaman"];
                                                $a_bolum = $a_degerler["bolum"];
                                                echo '
                                                <tr class="tr15">
                                                    <td class="td15" align="center"><strong>'.$g_adi.'</strong></td>
                                                    <td class="td15" align="center"><strgon>'.$a_bolum.'</strong></td>
                                                    <td class="td15" align="center"><strong>'.$a_yorum.'</strong></td>
                                                    <td class="td15" align="center"><strong>'.$a_tarih.'</strong></td>
                                                    <td class="td15" align="center"><strong>'.$a_dil.'</strong></td>
                                                    <td class="td15" align="center"><a href="../film/'.$a_yolu.'">TIKLA</a></td>
                                                </tr>
                                                ';
                                            }
                                            ?>
                                        </table>    
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                </div>
                <div id="sag-govde">
                    <div class="kisa-sol" id="yorum-poster"
                        style="display:<?php if(@$_GET["sayfa"] == "yorum"){ echo "block";}else{echo "none";} ?>">
                        <a href="../film/onepunch.php" style="margin-top:-4px; margin-bottom: -8px;">
                            <img src="../film/filmPoster/onepunchyorum.jpg" width="308" height="173" style="border-radius:4px;"
                                title="One Punch Man" alt="One Punch Man">
                        </a>
                    </div>
                    <div class="kisa-sol">
                            <div class="baslik" style="border-bottom:1px solid gray;">
                                <h2><a href="#" title="Son Eklenen Altyazılar">Son Eklenen Altyazılar</a></h2>
                            </div>
                            <div class="alt-menu-icerik">
                                <ul>
                                <?php
                                $altyazı_sorgu = $db->query("SELECT * FROM subs  WHERE onay = '1' ORDER BY id DESC LIMIT 5");
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
                                            <a href=../"'.$dizi_yol.'">'.$diziname.' S '.$sezon.' / B '.$bolum.' <span style="color:gray;font-size:10px;"> Gönderici '.$g_adi.' </span></a>
                                        </li>
                                        ';
                                }
                            ?>
                                </ul>
                            </div>
                    </div>

                    <div class="kisa-sol">
                                <div class="baslik" style="border-bottom:1px solid gray;">
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
                                                        <a href="../members/'.$kullanici_id.'.php">'.$g_name.' <span style="font-size:10px;color:gray"> '.$diziname.' S '.$sezon.' B '.$bolum.'</span></a>
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

        <div id="footer">
            <span id="eposta"></span>
            <span id="son">Türkçe Altyazı © 2007 - 2019</span>
        </div>
        <a id="yukari" href="#header" style="display:none;"></a>







    </div>
    <script src="../index.js"></script>
    <script src="dizi.js"></script>
</body>

</html>
<?php
if(isset($_GET["puan"])){
    $puan = filtre($_GET["puan"]);
    if(($puan == 1) || ($puan == 2) || ($puan == 3) || ($puan == 4) || ($puan == 5) || ($puan == 6) || ($puan == 7) || ($puan == 8) || ($puan == 9) || ($puan == 10)){
        $k_adi = $_SESSION["Kullanici"];
        $k_adiKayit = $db->query("INSERT INTO yildizoyatanlar (username,puan,diziname) values ('$k_adi','$puan','One Punch Man')");
        $puan_Kayit = $db->query("UPDATE yildizoy set oy = oy + '$puan',toplam = toplam + 1 WHERE isim = 'One Punch Man'");
        if($puan_Kayit){
            echo "hata";
        }
        header("Location:../film/onepunch.php");
    
    }
    else{
        header("Location:index.php");
    }
    }
?>
<?php
if(isset($_SESSION["Kullanici"])){
    if(isset($_GET["like"])){
        $k_adi = $_SESSION["Kullanici"];
        $yorum_id = $_GET["yorum"];
        $like = $_GET["like"];
        $sayfa = $_GET["yorums"];
        if($like == 1){
            $like_sorgu = $db->query("SELECT * FROM ybegeni WHERE username = '$k_adi' AND yid = '$yorum_id' ");
            $like_sorgu_kontrol = $like_sorgu->num_rows;
            if($like_sorgu_kontrol > 0){
                $like_varmi_kontrol = $db->query("SELECT * FROM ybegeni WHERE yid = '$yorum_id' AND username = '$k_adi' ");
                $like_varmi_kontrol_veri = $like_varmi_kontrol->fetch_assoc();
                if($like_varmi_kontrol_veri["begeni"] == 1){
                $likesi_sorgu = $db->query("UPDATE yorumlar SET begeni=begeni-1 WHERE id = '$yorum_id'");
                 $like_sıfırla = $db->query("UPDATE ybegeni SET begeni=0 WHERE yid = '$yorum_id' AND username = '$k_adi'");
                 header("Location:../film/onepunch.php?sayfa=yorum&yorums=$sayfa");
                }
                else if($like_varmi_kontrol_veri["begeni"] == 0){
                    $likesi_sorgu = $db->query("UPDATE yorumlar SET begeni=begeni+1 WHERE id = '$yorum_id'");
                 $like_sıfırla = $db->query("UPDATE ybegeni SET begeni=1 WHERE yid = '$yorum_id' AND username = '$k_adi'");
                 header("Location:../film/onepunch.php?sayfa=yorum&yorums=$sayfa");
                }
                
            }
            else{
                $like_ekle = $db->query("INSERT INTO ybegeni (yid,username,begeni,ididizi) values ('$yorum_id','$k_adi',1,'$dizi_id')");
                $yoruma_like_ekle = $db->query("UPDATE yorumlar SET begeni=begeni+1 WHERE id = '$yorum_id'");
                header("Location:../film/onepunch.php?sayfa=yorum&yorums=$sayfa");
            }
        }
        else{
            header("Location:../film/onepunch.php?sayfa=yorum");
        }
    }
}
?>
<?php
if(isset($_SESSION["Kullanici"])){
    if(isset($_GET["like2"])){
        $k_adi = $_SESSION["Kullanici"];
        $yorum_id = $_GET["yorum"];
        $like = $_GET["like2"];
        $sayfa = $_GET["yorums"];
        if($like == 1){
            $like_sorgu = $db->query("SELECT * FROM aybegeni WHERE username = '$k_adi' AND ayid = '$yorum_id' ");
            $like_sorgu_kontrol = $like_sorgu->num_rows;
            if($like_sorgu_kontrol > 0){
                $like_varmi_kontrol = $db->query("SELECT * FROM aybegeni WHERE ayid = '$yorum_id' AND username = '$k_adi' ");
                $like_varmi_kontrol_veri = $like_varmi_kontrol->fetch_assoc();
                if($like_varmi_kontrol_veri["begeni"] == 1){
                $likesi_sorgu = $db->query("UPDATE altyorum SET begeni=begeni-1 WHERE id = '$yorum_id'");
                 $like_sıfırla = $db->query("UPDATE aybegeni SET begeni=0 WHERE ayid = '$yorum_id' AND username = '$k_adi'");
                 header("Location:../film/onepunch.php?sayfa=yorum&yorums=$sayfa");
                }
                else if($like_varmi_kontrol_veri["begeni"] == 0){
                    $likesi_sorgu = $db->query("UPDATE altyorum SET begeni=begeni+1 WHERE id = '$yorum_id'");
                 $like_sıfırla = $db->query("UPDATE aybegeni SET begeni=1 WHERE ayid = '$yorum_id' AND username = '$k_adi'");
                 header("Location:../film/onepunch.php?sayfa=yorum&yorums=$sayfa");
                }
                
            }
            else{
                $like_ekle = $db->query("INSERT INTO aybegeni (ayid,username,begeni,iddizi) values ('$yorum_id','$k_adi',1,'$dizi_id')");
                $yoruma_like_ekle = $db->query("UPDATE altyorum SET begeni=begeni+1 WHERE id = '$yorum_id'");
                header("Location:../film/onepunch.php?sayfa=yorum&yorums=$sayfa");
            }
        }
        else{
            header("Location:../film/onepunch.php?sayfa=yorum");
        }
    }
}
?>
<?php
$db->close();
?>
