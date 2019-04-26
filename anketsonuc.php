<?php
require_once("baglanti.php");


if(isset($_POST["cevap"])){
    if(isset($_POST["form1"])){
        $anket = 1;
    }
    else if(isset($_POST["form2"])){
        $anket = 2;
    }
    else if(isset($_POST["form3"])){
        $anket = 3;
    }
    $gelencevap = filtre($_POST["cevap"]);
    $oyekle = $db->query("SELECT * FROM oykullananlar WHERE ipadresi = '$ip_adres' AND tarih >= '$zaman' AND anketid = '$anket'");
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
            $guncelle = $db->query("UPDATE anket set sonucbir = sonucbir + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        elseif($gelencevap == 2){
            $guncelle = $db->query("UPDATE anket set sonuciki = sonuciki + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        elseif($gelencevap == 3){
            $guncelle = $db->query("UPDATE anket set sonucuc = sonucuc + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        elseif($gelencevap == 4){
            $guncelle = $db->query("UPDATE anket set sonucdort = sonucdort + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        elseif($gelencevap == 5){
            $guncelle = $db->query("UPDATE anket set sonucbes = sonucbes + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        elseif($gelencevap == 6){
            $guncelle = $db->query("UPDATE anket set sonucalti = sonucalti + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        elseif($gelencevap == 7){
            $guncelle = $db->query("UPDATE anket set sonucyedi = sonucyedi + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        elseif($gelencevap == 8){
            $guncelle = $db->query("UPDATE anket set sonucsekiz = sonucsekiz + 1, toplamsonuc = toplamsonuc + 1 WHERE id ='$anket'");
        }
        else{
            echo '<script>
              alert("Teknik bir azrıza");
              </script>';
        }
    
        $kayitekle = $db->query("INSERT INTO oykullananlar (ipadresi,tarih,anketid) values ('$ip_adres','$kullanici_zaman','$anket')");
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