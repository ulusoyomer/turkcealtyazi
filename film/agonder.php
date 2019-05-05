
<?php
require_once("../baglanti.php");
function bosluk_sil($veri)
{
$veri = str_replace("/s+/","",$veri);
$veri = str_replace(" ","",$veri);
$veri = str_replace(" ","",$veri);
$veri = str_replace(" ","",$veri);
$veri = str_replace("/s/g","",$veri);
$veri = str_replace("/s+/g","",$veri);		
$veri = trim($veri);
return $veri; 
};
if(isset($_SESSION["Kullanici"])){
  if(isset($_GET["diziname"])){
    $name = $_SESSION["Kullanici"];
      $diziname = $_GET["diziname"];
      $dizi_sorgu = $db->query("SELECT * FROM yildizoy WHERE isim = '$diziname'");
      $dizi_sorgu_kontrol = $dizi_sorgu->num_rows;
      if($dizi_sorgu_kontrol <= 0){
        header("Location:../index.php");
      }
      else{
          $dizi_verileri = $dizi_sorgu->fetch_assoc();
          $dizi_resim = $dizi_verileri["poster"];
          $altyazi_sorgu = $db->query("SELECT * FROM subs WHERE diziname = '$diziname' AND username = '$name'");
          $altyazi_sorgu_say = $altyazi_sorgu->num_rows;
      }
  }
  else{ 
        header("Location:../index.php");
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
                <div class="sblock" style="width:992px;">
                    <div class="baslik">
                        <h2>
                            <a href="#"><?php echo $diziname; ?></a>
                        </h2>
                    </div>
                    <table style="width:992px;border-top: 1px solid #eee;" border="0" cellspacing="0" cellpadding="4">
                        <form enctype="multipart/form-data" method="POST" action="agonder.php?diziname=<?php echo $diziname; ?>" style="margin:0; padding:0;">
                            <tbody>
                                    <tr class="tr15" style="width:992px;">
                                            <td class="td15" rowspan="5" style="width:110px;">
                                                <img src="../<?php echo $dizi_resim; ?>" width="100" height="140">
                                            </td>
                                            <td class="td15">
                                                <strong>Dil</strong>
                                            </td>
                                            <td class="td15">
                                                    <select name="alt_dili" style="width:150px;">
                                                            <option value="">---Seçiniz---</option>
                                                            <option value="TR">Türkçe</option>
                                                            <option value="EN">İngilizce</option>
                                                            <option value="AZ">Azerice</option>
                                                            <option value="SP">İspanyolca</option>
                                                            <option value="DE">Almanca</option>
                                                            <option value="FR">Fransızca</option>
                                                            <option value="ITA">İtalyanca</option>
                                                            <option value="UNK">Diğer</option>
                                                        </select>
                                            </td>
                                        </tr>
                                        <tr style="height:50px;">
                                            <td class="td15"><strong>Sezon</strong></td>
                                            <td class="td15">
                                                    <select name="sezon" style="width:75px;">
                                                            <option value="">---Sezon---</option>
                                                            <option value="0">Film</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                        </select>
                                            </td>
                                            
                                        </tr>
                                        <tr class="tr15">
                                            <td class="td15"><strong>Bölüm</strong></td>
                                                <td class="td15">
                                                        <select name="bölüm" style="width:75px;">
                                                        <option value="">---Bölüm---</option>
                                                        <option value="0">Film</option>
                                                            <?php
                                                                for($i = 1 ; $i<=50; $i++){
                                                                    echo'<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                            ?>
                                                            </select>
                                                </td>
                                        </tr>
                                        <tr class="tr15">
                                            <td class="td15">
                                                <strong>Açıklama</strong>
                                            </td>
                                            <td class="td15">
                                                <textarea rows="5" cols="100" placeholder="Dil kısmı diğer ise mutlaka bu alanı doldurunuz." style="resize : none;" name="yorum"></textarea>
                                            </td>
                                        </tr>
                                        <tr class="tr15">
                                            <td class="td15">
                                                <strong>Dosya Seç</strong><br>
                                                <span style="font-size:11px; color:gray;">Dosya uzantısı srt olmalıdır</span>
                                            </td>
                                            <td class="td15">
                                                <input type="file" name="file">
                                            </td>
                                        </tr>
                                        <tr class="tr15">
                                            <td colspan="3" class="td15" align="center">
                                                <input type="submit" value="Gönder">
                                            </td>
                                        </tr>

                            </tbody>
                        </form>
                    </table>
                    <?php
            if(isset($_FILES["file"]) && isset($_POST["bölüm"]) && isset($_POST["sezon"]) && isset($_POST["alt_dili"])){
                if($_POST["alt_dili"] == "" || $_POST["sezon"] == "" || $_POST["bölüm"] == "" || $_FILES["file"]  == ""){
                    echo'
                        <div style="margin:0 auto; color :red; font-size:16px;">
                            Boş Bırakılna Yerleri Tamamlayınız
                        </div>
                        ';
                }
                else{
                    if($_POST["alt_dili"] == "TR"){
                        $dil = "Türkçe";
                    }
                    else if($_POST["alt_dili"] == "EN"){
                        $dil = "İngilizce";
                    }
                    else if($_POST["alt_dili"] == "AZ"){
                        $dil = "Azerice";
                    }
                    else if($_POST["alt_dili"] == "SP"){
                        $dil = "İspanyolca";
                    }
                    else if($_POST["alt_dili"] == "DE"){
                        $dil = "Almanca";
                    }
                    else if($_POST["alt_dili"] == "FR"){
                        $dil = "Fransızca";
                    }
                    else if($_POST["alt_dili"] == "ITA"){
                        $dil = "İtalyanca";
                    }
                    if($_POST["alt_dili"] == "UNK"){
                        if($_POST["yorum"] != ""){
                            $yorum_alt = filtre($_POST["yorum"]);
                            $sezon_alt = $_POST["sezon"];
                            $bolum_alt = $_POST["bölüm"];
                            $gelen_dosya = $_FILES["file"];
                            $dosya_uzanti = $gelen_dosya["name"];
                            $dosya_ismi_kontrol = mb_substr_count($dosya_uzanti,".");
                            if($dosya_ismi_kontrol == 1){
                                $dosya_uzanti = explode(".",$dosya_uzanti);
                                $dosya_tmp_adi = $gelen_dosya["tmp_name"];
                                $diziname2 = $diziname;
                                $diziname2 = bosluk_sil($diziname2);
                                if($dosya_uzanti[1] == "srt"){
                                    $dosya_yolu = "sub/";
                                    $dosya_adi = $name.$diziname2.$sezon_alt."X".$bolum_alt."-".$altyazi_sorgu_say.".".$dosya_uzanti[1];
                                    $dosya_yolu = $dosya_yolu.$dosya_adi;
                                    if(move_uploaded_file($dosya_tmp_adi,$dosya_yolu)){
                                        $subs_ekle = $db->query("INSERT INTO subs (diziname,username,diziyolu,diziyorum,sezon,bolum,dil,onay) values ('$diziname','$name','$dosya_yolu','$yorum_alt','$sezon_alt','$bolum_alt','UNK',0)");
                                        if($subs_ekle){
                                            echo'
                                            <div style="margin:0 auto; color :red; font-size:16px;">
                                                Gönder Tamamlandı Ana Sayfaya Gönderiliyorsunuz.
                                            </div>
                                                ';
                                                header('Refresh: 3; ../index.php');
                                        }
                                        else{
                                            echo'
                                            <div style="margin:0 auto; color :red; font-size:16px;">
                                                Dosya Göndermede Hata oldu Sonra Tekrar Dene.
                                            </div>
                                                ';
                                                header('Refresh: 3; ../index.php');
                                        }
                                    }
                                    else{
                                        echo'
                                                <div style="margin:0 auto; color :red; font-size:16px;">
                                                Dosya Göndermede Hata oldu Sonra Tekrar Dene.
                                                </div>
                                                    ';
                                    }
                                }
                                else{
                                    echo'
                                            <div style="margin:0 auto; color :red; font-size:16px;">
                                            Dosya Türü Uymuyor.
                                            </div>
                                                ';
                                }
                            
                            }
                            else{
                                 echo'
                                <div style="margin:0 auto; color :red; font-size:16px;">
                                Dosya İsminiz Hatalıdır. Dosya isminde bir nokta olmal.
                                </div>
                                ';
                            }
                        }
                        else{
                            echo'
                            <div style="margin:0 auto; color :red; font-size:16px;">
                                Dil seçenegi diğer ise yorumda belirtmelisiniz.
                            </div>
                            ';
                        }
                    }
                    else{
                            $yorum_alt = filtre($_POST["yorum"]);
                            $sezon_alt = $_POST["sezon"];
                            $bolum_alt = $_POST["bölüm"];
                            $gelen_dosya = $_FILES["file"];
                            $dosya_uzanti = $gelen_dosya["name"];
                            $dosya_ismi_kontrol = mb_substr_count($dosya_uzanti,".");
                            if($dosya_ismi_kontrol == 1){
                                $dosya_uzanti = explode(".",$dosya_uzanti);
                                $dosya_tmp_adi = $gelen_dosya["tmp_name"];
                                $diziname2 = $diziname;
                                $diziname2 = bosluk_sil($diziname2);
                                if($dosya_uzanti[1] == "srt"){
                                    $dosya_yolu = "sub/";
                                    $dosya_adi = $name.$diziname2.$sezon_alt."X".$bolum_alt."-".$altyazi_sorgu_say.".".$dosya_uzanti[1];
                                    $dosya_yolu = $dosya_yolu.$dosya_adi;
                                    if(move_uploaded_file($dosya_tmp_adi,$dosya_yolu)){
                                        $subs_ekle = $db->query("INSERT INTO subs (diziname,username,diziyolu,diziyorum,sezon,bolum,dil,onay) values ('$diziname','$name','$dosya_yolu','$yorum_alt','$sezon_alt','$bolum_alt','$dil',0)");
                                        if($subs_ekle){
                                            echo'
                                            <div style="margin:0 auto; color :red; font-size:16px;">
                                                Gönder Tamamlandı Ana Sayfaya Gönderiliyorsunuz.
                                            </div>
                                                ';
                                                header('Refresh: 3; ../index.php');
                                        }
                                        else{
                                            echo'
                                            <div style="margin:0 auto; color :red; font-size:16px;">
                                                Dosya Göndermede Hata oldu Sonra Tekrar Dene
                                            </div>
                                                ';
                                                header('Refresh: 3; ../index.php');
                                        }
                                    }
                                }
                                else{
                                    echo'
                                <div style="margin:0 auto; color :red; font-size:16px;">
                                    Dosya Türü Uymuyor.
                                </div>
                                ';
                                }
                            }
                            else{
                                echo'
                                <div style="margin:0 auto; color :red; font-size:16px;">
                                    Dosya İsmi Hatalıdır. Bir tane . olmalıdır.
                                </div>
                                ';
                            }
                            
                        
                        
                    }
                }
                
            }
            else{
                echo'
                <div style="margin:0 auto; color :red; font-size:16px;">
                    * Alanları Doldurunuz ve dosyanızda uzantı adı önü hariç . olmamalıdır.
                </div>
                ';
            }
        ?>
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
}
else{
    header("Location:../index.php");
}
$db->close();
?>
