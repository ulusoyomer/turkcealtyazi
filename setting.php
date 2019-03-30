<?php
require_once("baglanti.php");
?>
<?php
if(isset($_SESSION["Kullanici"])){

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>TürkçeAltyazı</title>
    <link rel="stylesheet" href="main.css">
    <style>
        .sblock table tr td {
            background-color: #fafafa;
            border-bottom: 1px solid #f4f4f4;
            padding: 6px 6px;
            line-height: 11px;
            border-right: 1px solid #f4f4f4
        }

        .inputlar {
            padding: 4px;
            border: #eee solid 1px;
            font-size: 12px;
            width: 270px;
            border-radius: 4px;
        }
    </style>
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
                    <div class="sblock" style="padding: 0;">
                        <table border="1" cellpadding="0" cellspacing="0"
                            style="width:100%;background: #fafafa; border-radius: 4px;">
                            <?php
                            if(isset($_POST["form1"])){
                                $eskip = filtre($_POST["eskiparo"]);
                                $eskip = md5($eskip);
                                $parola_sorgu = $db->query("SELECT * FROM uyeler WHERE sifre = '$eskip'");
                                $parola_sorgu_kontrol = $parola_sorgu->num_rows;
                                if($parola_sorgu_kontrol > 0){
                                    $yeni_parola = filtre($_POST["yeniparo1"]);
                                    $yeni_parola2 = filtre($_POST["yeniparo2"]);
                                    if($yeni_parola == $yeni_parola2){
                                        $yeni_parola = md5($yeni_parola);
                                        $name = $_SESSION["Kullanici"];
                                        $yeni_parola_sorgu = $db->query("UPDATE uyeler SET sifre = '$yeni_parola' WHERE username = '$name'");
                                        if($yeni_parola_sorgu){
                                            echo '
                                        <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                        <strong>Parola Değiştirme İşleminiz Tamamlandı..</strong>
                                    </td>
                                </tr>
                                        ';
                                        }
                                        else{
                                            echo '
                                        <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                        <strong>Teknik Bir hata oldu.</strong>
                                    </td>
                                </tr>
                                        ';
                                        }
                                    }
                                    else{
                                        echo '
                                        <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                        <strong>Yeni Parolalarınız birbiri ile Uyuşmuyor</strong>
                                    </td>
                                </tr>
                                        ';
                                    }
                                }
                                else{
                                    echo '
                                        <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                        <strong>Mevcut Parolanız Hatalı !</strong>
                                    </td>
                                </tr>
                                        ';
                                }
                            }
                            elseif(isset($_POST["form2"])){
                                if(isset($_POST["sil"])){
                                    if($_POST["sil"] == 1){
                                        $def_avatar = "members/avatar/default.png";
                                        $name = $_SESSION["Kullanici"];
                                        $avatar_sifirla = $db->query("UPDATE uyeler SET uyeresim = '$def_avatar' WHERE username = '$name'");
                                        if($avatar_sifirla){
                                            echo '
                                        <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                        <strong>Avatar Sıfırlanmıstır</strong>
                                    </td>
                                </tr>
                                        ';
                                        }
                                        else{
                                            echo '
                                        <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                        <strong>Teknik Bir Hata Oldu</strong>
                                    </td>
                                </tr>
                                        ';
                                        }
                                    }

                                }
                               elseif(isset($_FILES["file"])){
                                   $gelen_resim = $_FILES["file"];
                                   $dosya_uzanti = $gelen_resim["name"];
                                   $dosya_uzanti = explode(".", $dosya_uzanti);
                                   $dosya_temp_adi = $gelen_resim["tmp_name"];
                                   $name = $_SESSION["Kullanici"];
                                   if($dosya_uzanti[1] == "jpg" || $dosya_uzanti[1] == "jpeg" || $dosya_uzanti[1] == "png"){
                                     $dosya_yolu = "members/avatar/";
                                     $dosya_adi = $_SESSION["Kullanici"].".".$dosya_uzanti[1];
                                     $dosya_yolu = $dosya_yolu.$dosya_adi;
                                     chdir("members/avatar");
                                        @unlink($dosya_adi);
                                        chdir("../");
                                        chdir("../");
                                     if(move_uploaded_file($dosya_temp_adi , $dosya_yolu)){
                                        $resim_güncelle_sorgu = $db->query("UPDATE uyeler SET uyeresim = '$dosya_yolu' WHERE username = '$name'");
                                        if($resim_güncelle_sorgu){
                                            echo '
                                        <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                        <strong>Resminiz Güncelendi</strong>
                                    </td>
                                </tr>
                                        ';
                                        }
                                        else{
                                            echo '
                                            <tr>
                                        <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                            <strong>Sorgu Hatası !!</strong>
                                        </td>
                                    </tr>
                                            ';
                                        }
                                        
                                     }
                                   }
                                   else{
                                    echo '
                                    <tr>
                                <td colspan="2" align="center" style="background:#f0f4f7; color:red;">
                                    <strong>UYARI !!! JPG PNG JPEG uzatılı resimler yüklenebilir !!</strong>
                                </td>
                            </tr>
                                    ';
                                   }
                               } 
                            }
                            ?>
                            <form action="setting.php" method="POST">
                                <tr>
                                    <td colspan="2">
                                        <div class="baslik">
                                            <h2><a href="#" title="Hesap Bilgileri">Hesap Bilgileri</a></h2>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:35%;"><strong style="margin-left:5px;">Kullanıcı Adı:*</strong>
                                    </td>
                                    <td><?php echo $_SESSION["Kullanici"]; ?></td>
                                </tr>
                                <tr>
                                    <td style="width:35%;"><strong style="margin-left:5px;">Şimdiki Parolanız:*</strong>
                                        <p style="margin-left:5px;margin-top:3px;color: #888;font-size:11px;">Parolanızı
                                             değiştirmek için parolanızı tekrar girerek
                                            onaylamanız gerekmektedir.</p>
                                    </td>
                                    <td><input class="inputlar" type="password" name="eskiparo"></td>
                                </tr>
                                <tr>
                                    <td style="width:35%;"><strong style="margin-left:5px;">Yeni Parolaniz:*</strong>
                                        <p style="margin-left:5px;margin-top:3px;color: #888;font-size:11px;">Sadece
                                            değiştirmek istiyorsanız parolanızı yazmalısınız.</p>
                                    </td>
                                    <td><input class="inputlar" type="password" name="yeniparo1"></td>
                                </tr>
                                <tr>
                                    <td style="width:35%;"><strong style="margin-left:5px;">Yeni Parolanizi Tekrar
                                            Girin:*</strong>
                                        <p style="margin-left:5px;margin-top:3px;color: #888;font-size:11px;">Sadece
                                            parolanızı değiştirdiyseniz yeni parolanızı onaylamalısınız.</p>
                                    </td>
                                    <td><input class="inputlar" type="password" name="yeniparo2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" name="form1" value="Gönder">
                                    </td>
                                </tr>
                            </form>
                            <form enctype="multipart/form-data" action="setting.php" method="POST">
                                <tr>
                                    <td colspan="2" align="center" style="background:#f0f4f7; color:#3f3f3f;;">
                                        <strong>Profil Resmi Ayarları</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:35%;"><strong style="margin-left:5px;">Profil Resmini Sil</strong>
                                        <p style="margin-left:5px;margin-top:3px;color: #888;font-size:11px;">
                                            İletilerinizin
                                            yanındaki küçük resim. Bir seferde sadece bir resim gösterilebilir.
                                            </p>
                                    </td>
                                    <td><input type="checkbox" name="sil" value="1"></td>
                                </tr>
                                <tr>
                                    <td style="width:35%;"><strong style="margin-left:5px;">Bilgisayarınızdan Bir Avatar
                                            Yollayın:*</strong></td>
                                    <td><input type="file" name="file"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" name="form2" value="Gönder">
                                    </td>
                                </tr>
                            </form>
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
}
else{
    header("Location:index.php");
}
?>
<?php
$db->close();
?>