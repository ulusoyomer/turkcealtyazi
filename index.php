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
                    <input type="text" class="text-place" placeholder="Film / Dizi adı ya da IMDb linki giriniz"
                        name="find">
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
                        <a>
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
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Vizyonda Bu Hafta</a></h2>
                        </div>
                        <div id="slider">
                            <div class="slayt"><span class="yazı"><a href="#"><strong>Alita: Savaş
                                            Meleği</strong></a></span><img src="img/deneme1.jpg"></div>
                            <div class="slayt"><span class="yazı"><a href="#"><strong>Asla Gözlerini
                                            Kaçırma</strong></a></span><img src="img/deneme2.jpg"></div>
                            <div class="slayt"><span class="yazı"><a href="#"><strong>Lego Film
                                            2</strong></a></span><img src="img/deneme3.jpg"></div>
                            <div class="slayt"><span class="yazı"><a href="#"><strong>Asteriks Sihirli İksirin
                                            Sırrı</strong></a></span><img src="img/deneme4.jpg"></div>
                            <div class="slayt"><span class="yazı"><a href="#"><strong>Adaline</strong></a></span><img
                                    src="img/deneme5.jpg"></div>
                            <div id="sliderkontrol">
                                <a class="kontrolslayt" href="javascript:birinci()"></a>
                                <a class="kontrolslayt" href="javascript:ikinci()"></a>
                                <a class="kontrolslayt" href="javascript:ucuncu()"></a>
                                <a class="kontrolslayt" href="javascript:dorduncu()"></a>
                                <a class="kontrolslayt" href="javascript:besinci()"></a>
                                <a class="onceki" href="javascript:onceki()"></a>
                                <a class="sonraki" href="javascript:sonraki()"></a>
                            </div>
                        </div>
                    </div>
                    <div class="sblock">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Türkçe Altyazısı Yeni Çıkanlar</a></h2>
                        </div>
                        <div id="bodymenu">
                            <a href="#">Hepsi</a>
                            <a href="#">Filmler</a>
                            <a href="#">Diziler</a>
                            <a href="#">Animeler</a>
                            <a href="#">2019</a>
                            <a href="#">2018</a>
                            <a href="#">2017</a>
                            <a href="#">2016 ve Öncesi</a>
                            <a href="#">Türkçe(1)Altyazı</a>
                            <a href="#">Son Yüklenenler</a>
                        </div>
                        <div id="bodyicerik">
                            <div id="icerik">
                                <?php
                            $film_sorgu = $db->query("SELECT * FROM yildizoy ORDER BY id DESC LIMIT 8");
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
                            <a href="tum.php" id="icerikson">Listenin Devamı »</a>
                        </div>
                    </div>
                    <div class="sblock">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Son Eklenen Filmler</a></h2>
                        </div>
                        <div id="portre">
                            <ul>
                                <li>
                                    <span>Matrix</span>
                                    <a href="#" title="Matrix">
                                        <img src="film/filmPoster/matrix.jpg" alt="Matrix" width="120" height="100">
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="sblock">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Film İncelemeleri</a></h2>
                        </div>
                        <ul id="inceleme">
                            <li>
                                <div class="resimalanı" style="background:url(film/filmPoster/matrix.jpg) no-repeat">
                                </div>
                                <a herf="#">Matrix</a>
                                <span>2004</span>
                                -
                                <span style="text-decoration:none; color:#A26C6C;">Ömer Ulusoy</span>
                                <div class="incelemeicerik">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi aspernatur
                                    blanditiis,
                                    cumque dolores est eum exercitationem facilis maiores minus neque non perspiciatis
                                    quaerat qui quis sint vel?
                                    Aspernatur, culpa cupiditate eveniet illum quae quis ratione voluptate. Aut
                                    doloremque maiores quae sunt tempore.
                                    Beatae, eos ex! Alias aliquam, aliquid consequuntur cum cupiditate delectus,
                                    ducimus
                                    eius et ex incidunt laudantium
                                    maxime necessitatibus nostrum optio quod, reiciendis soluta unde voluptatem!
                                    Accusantium, asperiores assumenda distinctio
                                    fugiat illum nulla perferendis quas quos, reiciendis saepe sed temporibus vitae.
                                    <a href="#">
                                        <span class="ozet"></span>
                                    </a>

                                </div>
                            </li>
                            <li>
                                <div class="resimalanı" style="background:url(film/filmPoster/sherlock.jpg) no-repeat">
                                </div>
                                <a herf="#">Sherlock</a>
                                <span>2004</span>
                                -
                                <span style="text-decoration:none; color:#A26C6C;">Ömer Ulusoy</span>
                                <div class="incelemeicerik">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi aspernatur
                                    blanditiis,
                                    cumque dolores est eum exercitationem facilis maiores minus neque non perspiciatis
                                    quaerat qui quis sint vel?
                                    Aspernatur, culpa cupiditate eveniet illum quae quis ratione voluptate. Aut
                                    doloremque maiores quae sunt tempore.
                                    Beatae, eos ex! Alias aliquam, aliquid consequuntur cum cupiditate delectus,
                                    ducimus
                                    eius et ex incidunt laudantium
                                    maxime necessitatibus nostrum optio quod, reiciendis soluta unde voluptatem!
                                    Accusantium, asperiores assumenda distinctio
                                    fugiat illum nulla perferendis quas quos, reiciendis saepe sed temporibus vitae.
                                    <a href="#">
                                        <span class="ozet"></span>
                                    </a>

                                </div>
                            </li>
                            <li>
                                <div class="resimalanı" style="background:url(film/filmPoster/house.jpg) no-repeat">
                                </div>
                                <a herf="#">House M.D.</a>
                                <span>2004</span>
                                -
                                <span style="text-decoration:none; color:#A26C6C;">Ömer Ulusoy</span>
                                <div class="incelemeicerik">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi aspernatur
                                    blanditiis,
                                    cumque dolores est eum exercitationem facilis maiores minus neque non perspiciatis
                                    quaerat qui quis sint vel?
                                    Aspernatur, culpa cupiditate eveniet illum quae quis ratione voluptate. Aut
                                    doloremque maiores quae sunt tempore.
                                    Beatae, eos ex! Alias aliquam, aliquid consequuntur cum cupiditate delectus,
                                    ducimus
                                    eius et ex incidunt laudantium
                                    maxime necessitatibus nostrum optio quod, reiciendis soluta unde voluptatem!
                                    Accusantium, asperiores assumenda distinctio
                                    fugiat illum nulla perferendis quas quos, reiciendis saepe sed temporibus vitae.
                                    <a href="#">
                                        <span class="ozet"></span>
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sblock">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Yeni Eklenen Sanatçılar</a></h2>
                        </div>
                        <div id="portre">
                            <ul>
                                <li>
                                    <span>Keanu Reeves</span>
                                    <a href="#" title="Keanu Reeves">
                                        <img src="film/filmOyuncu/keanu.jpg" alt="Keanu Reeves" width="120"
                                            height="100">
                                    </a>
                                </li>
                                <li><span>Bryan Cranston</span>
                                    <a href="#" title="Bryan Cranston">
                                        <img src="film/filmOyuncu/Brayn.jpg" alt="Bryan Cranston" width="120"
                                            height="100">
                                    </a>
                                </li>
                                <li>
                                    <span>Hugh Laurie </span>
                                    <a href="#" title="Hugh Laurie ">
                                        <img src="film/filmOyuncu/hugh.jpg" alt="Hugh Laurie " width="120" height="100">
                                    </a>
                                </li>
                                <li><span>Aaron Paul</span>
                                    <a href="#" title="Aaron Paulr">
                                        <img src="film/filmOyuncu/aaron.jpg" alt="Aaron Paul" width="120" height="100">
                                    </a>
                                </li>
                                <li class="m"><span>Martin Freeman</span>
                                    <a href="#" title="Martin Freeman">
                                        <img src="film/filmOyuncu/martin.jpg" alt="Martin Freeman" width="120"
                                            height="100">
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="kisa-blok-sol">
                        <div class="kisa-sol">
                            <div class="baslik">
                                <h2><a href="#" title="Pek Yakında">Forumdan</a></h2>
                            </div>
                            <div class="alt-menu">
                                <a>Son iletiler</a>
                                <a>Yeni Başlıklar</a>
                                <a>Forumbazlar</a>
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
                                <h2><a href="#" title="Pek Yakında">Film Çevirileri</a></h2>
                            </div>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                        </div>
                        <div class="kisa-sol">
                            <div class="baslik">
                                <h2><a href="#" title="Pek Yakında">Gözde Çevirmenler</a></h2>
                            </div>
                            <div class="alt-menu">
                                <a>Bu Gün</a>
                                <a>Bu Hafta</a>
                                <a>Bu Ay</a>
                                <a>Bu Yıl</a>
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
                    <div class="orta-kisa-sag">
                        <div class="kisa-sol">
                            <div class="baslik">
                                <h2><a href="#" title="Pek Yakında">Film Yorumları</a></h2>
                            </div>
                            <div class="alt-menu">
                                <a>Son Yorumlar</a>
                                <a>Yorumcular</a>
                                <a>Yorumbazlar</a>
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
                                <h2><a href="#" title="Pek Yakında">Dizi Çevirileri</a></h2>
                            </div>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                            <span class="ceviri-durumu">
                                <a>Chasing the Dragon</a>
                                by
                                <span>Ömer Ulusoy</span>
                                <span class="ceviri-durumu-gosterge">
                                    <span style="width:95%;" class="ceviri-durumu-gosterge-ic"></span>
                                </span>
                                <span class="ceviri-durumu-yazı">%95</span>
                            </span>
                        </div>
                        <div class="kisa-sol">
                            <div class="baslik">
                                <h2><a href="#" title="Pek Yakında">Fragmanlar</a></h2>
                            </div>
                            <div class="alt-menu">
                                <a>Yeni Eklenenler</a>
                                <a>Çok İzlenenler</a>
                                <a>Gönderneler</a>
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
                            <h2><a href="#" title="Pek Yakında">Anket</a></h2>
                        </div>
                        <div class="alt-menu-icerik">
                            <?php
                                    $anketkayit = $db->query("SELECT * FROM anket");
                                    $anketkayitsayisi = $anketkayit->num_rows;
                                    $anketkayitdeger = $anketkayit->fetch_assoc();
                                    if($anketkayitsayisi > 0){

                    
                            ?>
                            <div class="soru">
                                <a>
                                    <?php echo $anketkayitdeger["soru"] ?></a>
                            </div>
                            <form method="POST" action="anketsonuc.php">
                                <ul>

                                    <li>
                                        <span>
                                            <input type="radio" value="1" name="cevap">
                                            <?php echo $anketkayitdeger["cevapbir"] ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <input type="radio" value="2" name="cevap">
                                            <?php echo $anketkayitdeger["cevapiki"] ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <input type="radio" value="3" name="cevap">
                                            <?php echo $anketkayitdeger["cevapuc"] ?>
                                        </span>

                                    </li>
                                    <li>
                                        <span>
                                            <input type="radio" value="4" name="cevap">
                                            <?php echo $anketkayitdeger["cevapdort"] ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <input type="radio" value="5" name="cevap">
                                            <?php echo $anketkayitdeger["cevapbes"] ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <input type="radio" value="6" name="cevap">
                                            <?php echo $anketkayitdeger["cevapalti"] ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <input type="radio" value="7" name="cevap">
                                            <?php echo $anketkayitdeger["cevapyedi"] ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <input type="radio" value="8" name="cevap">
                                            <?php echo $anketkayitdeger["cevapsekiz"] ?>
                                        </span>
                                    </li>
                                    <li align="center">
                                        <span>
                                            <input type="submit" value="Gönder">
                                        </span>
                                    </li>
                                    <?php
                                    }
                                    else{
                                        echo "Anket Bulunamadı";
                                    }
                                 ?>
                                </ul>
                            </form>

                        </div>
                    </div>
                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Anket Sonuçları</a></h2>
                        </div>
                        <div class="alt-menu-icerik-anket">
                            <?php
                            $anketkayit = $db->query("SELECT * FROM anket");
                                    $anketkayitsayisi = $anketkayit->num_rows;
                                    $anketkayitdeger = $anketkayit->fetch_assoc();
                                    $birincioy = $anketkayitdeger["sonucbir"];
                                    $ikincioy = $anketkayitdeger["sonuciki"];
                                    $ucuncuoy = $anketkayitdeger["sonucuc"];
                                    $dorduncuoy = $anketkayitdeger["sonucdort"];
                                    $besincioy = $anketkayitdeger["sonucbes"];
                                    $altincioy = $anketkayitdeger["sonucalti"];
                                    $yedincioy = $anketkayitdeger["sonucyedi"];
                                    $sekizincioy = $anketkayitdeger["sonucsekiz"];
                                    $toplamsonuc = $anketkayitdeger["toplamsonuc"];
                                    $birinciyuzde = @($birincioy/$toplamsonuc)*100;
                                    $birinciyuzde = number_format($birinciyuzde,0,",","");
                                    $ikinciyuzde = @($ikincioy/$toplamsonuc)*100;
                                    $ikinciyuzde = number_format($ikinciyuzde,0,",","");
                                    $ucuncuyuzde = @($ucuncuoy/$toplamsonuc)*100;
                                    $ucuncuyuzde = number_format($ucuncuyuzde,0,",","");
                                    $dorduncuyuzde = @($dorduncuoy/$toplamsonuc)*100;
                                    $dorduncuyuzde = number_format($dorduncuyuzde,0,",","");
                                    $besyuzde = @($besincioy/$toplamsonuc)*100;
                                    $besyuzde = number_format($besyuzde,0,",","");
                                    $altiyuzde = @($altincioy/$toplamsonuc)*100;
                                    $altiyuzde = number_format($altiyuzde,0,",","");
                                    $yediyuzde = @($yedincioy/$toplamsonuc)*100;
                                    $yediyuzde = number_format($yediyuzde,"0",",","");
                                    $sekizyuzde = @($sekizincioy/$toplamsonuc)*100;
                                    $sekizyuzde = number_format($sekizyuzde,0,",","");
                                    if($anketkayitsayisi > 0){
                                        ?>
                            <div class="soru">
                                <a>
                                    <?php echo $anketkayitdeger["soru"] ?></a>
                            </div>

                            <ul>

                                <li>
                                    <span>
                                        <?php echo $anketkayitdeger["cevapbir"] ?>



                                    </span>
                                    <span>

                                        <span class="ceviri-durumu-gosterge-anket">
                                            <span style="width:<?php echo $birinciyuzde?>%;background: green;"
                                                class="ceviri-durumu-gosterge-ic-anket"></span>
                                        </span>
                                        <span class="ceviri-durumu-yazı-anket" style="color:green">%
                                            <?php echo $birinciyuzde?></span>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <?php echo $anketkayitdeger["cevapiki"] ?>



                                    </span>
                                    <span>

                                        <span class="ceviri-durumu-gosterge-anket">
                                            <span style="width:<?php echo $ikinciyuzde?>%;background: red;"
                                                class="ceviri-durumu-gosterge-ic-anket"></span>
                                        </span>
                                        <span class="ceviri-durumu-yazı-anket" style="color:red">%
                                            <?php echo $ikinciyuzde ?></span>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <?php echo $anketkayitdeger["cevapuc"] ?>



                                    </span>
                                    <span>

                                        <span class="ceviri-durumu-gosterge-anket">
                                            <span style="width:<?php echo $ucuncuyuzde?>%;background: #c0c15b;"
                                                class="ceviri-durumu-gosterge-ic-anket"></span>
                                        </span>
                                        <span class="ceviri-durumu-yazı-anket" style="color:#c0c15b">%
                                            <?php echo $ucuncuyuzde?></span>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <?php echo $anketkayitdeger["cevapdort"] ?>



                                    </span>
                                    <span>

                                        <span class="ceviri-durumu-gosterge-anket">
                                            <span style="width:<?php echo $dorduncuyuzde?>%;background: gray;"
                                                class="ceviri-durumu-gosterge-ic-anket"></span>
                                        </span>
                                        <span class="ceviri-durumu-yazı-anket" style="color:gray">%
                                            <?php echo $dorduncuyuzde?></span>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <span>
                                            <?php echo $anketkayitdeger["cevapbes"] ?>



                                        </span>
                                        <span>

                                            <span class="ceviri-durumu-gosterge-anket">
                                                <span style="width:<?php echo $besyuzde?>%;background: blue;"
                                                    class="ceviri-durumu-gosterge-ic-anket"></span>
                                            </span>
                                            <span class="ceviri-durumu-yazı-anket" style="color:blue">%
                                                <?php echo $besyuzde?></span>
                                        </span>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <span>
                                            <?php echo $anketkayitdeger["cevapalti"] ?>



                                        </span>
                                        <span>

                                            <span class="ceviri-durumu-gosterge-anket">
                                                <span style="width:<?php echo $altiyuzde?>%;background: pink;"
                                                    class="ceviri-durumu-gosterge-ic-anket"></span>
                                            </span>
                                            <span class="ceviri-durumu-yazı-anket" style="color:pink">%
                                                <?php echo $altiyuzde?></span>
                                        </span>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <?php echo $anketkayitdeger["cevapyedi"] ?>



                                    </span>
                                    <span>

                                        <span class="ceviri-durumu-gosterge-anket">
                                            <span style="width:<?php echo $yediyuzde?>%;background: orange;"
                                                class="ceviri-durumu-gosterge-ic-anket"></span>
                                        </span>
                                        <span class="ceviri-durumu-yazı-anket" style="color:orange">%
                                            <?php echo $yediyuzde?></span>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <span>
                                            <?php echo $anketkayitdeger["cevapsekiz"] ?>



                                        </span>
                                        <span>

                                            <span class="ceviri-durumu-gosterge-anket">
                                                <span style="width:<?php echo $sekizyuzde?>%;background: aqua;"
                                                    class="ceviri-durumu-gosterge-ic-anket"></span>
                                            </span>
                                            <span class="ceviri-durumu-yazı-anket" style="color:aqua">%
                                                <?php echo $sekizyuzde?></span>
                                        </span>
                                    </span>
                                </li>

                                <?php
                                    }
                                    else{
                                        echo "Anket Bulunamadı";
                                    }
                                 ?>


                            </ul>

                        </div>
                    </div>
                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Alt Yazıgönderenler</a></h2>
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
                    <div class="kisa-sol">
                        <div class="baslik">
                            <h2><a href="#" title="Pek Yakında">Ne var ne yok!</a></h2>
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
    <script src="slider.js"></script>
</body>

</html>
<?php
$db->close();
?>