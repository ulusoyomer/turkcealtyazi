<?php
require_once("baglanti.php");


if(isset($_POST["cevap"])){
    $gelencevap = filtre($_POST["cevap"]);
    $oyekle = $db->query("SELECT * FROM oykullananlar WHERE ipadresi = '$ip_adres' AND tarih >= '$zaman'");
    $oykontrol = $oyekle->num_rows;
    if($oykontrol > 0){
                
        header("refresh:0.1;url=index.php");
        echo '<script>
        alert("Oy Verme Süreniz Henüz Geçmemiştir.");
        </script>';
            exit();
              
    }
    else{
        if($gelencevap == 1){
            $guncelle = $db->query("UPDATE anket set sonucbir = sonucbir + 1, toplamsonuc = toplamsonuc + 1");
        }
        elseif($gelencevap == 2){
            $guncelle = $db->query("UPDATE anket set sonuciki = sonuciki + 1, toplamsonuc = toplamsonuc + 1");
        }
        elseif($gelencevap == 3){
            $guncelle = $db->query("UPDATE anket set sonucuc = sonucuc + 1, toplamsonuc = toplamsonuc + 1");
        }
        elseif($gelencevap == 4){
            $guncelle = $db->query("UPDATE anket set sonucdort = sonucdort + 1, toplamsonuc = toplamsonuc + 1");
        }
        elseif($gelencevap == 5){
            $guncelle = $db->query("UPDATE anket set sonucbes = sonucbes + 1, toplamsonuc = toplamsonuc + 1");
        }
        elseif($gelencevap == 6){
            $guncelle = $db->query("UPDATE anket set sonucalti = sonucalti + 1, toplamsonuc = toplamsonuc + 1");
        }
        elseif($gelencevap == 7){
            $guncelle = $db->query("UPDATE anket set sonucyedi = sonucyedi + 1, toplamsonuc = toplamsonuc + 1");
        }
        elseif($gelencevap == 8){
            $guncelle = $db->query("UPDATE anket set sonucsekiz = sonucsekiz + 1, toplamsonuc = toplamsonuc + 1");
        }
        else{
            echo '<script>
              alert("Teknik bir azrıza");
              </script>';
        }
    
        $kayitekle = $db->query("INSERT INTO oykullananlar (ipadresi,tarih) values ('$ip_adres','$kullanici_zaman')");
        if($kayitekle){
            header("Location:index.php");
            exit();
        }
        else{
            echo "kayit eklemede sorun ";
        }
    
    
    
    }
}
else{
    header("Location:index.php");
}


?>
<?php
$db->close();
?>