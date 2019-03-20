var dizi_ozet = document.getElementById("dizi-ozet");
var dizi_yorumlari = document.getElementById("dizi-yorumlari");
var dizi_detay = document.getElementsByClassName("dizi-detay");
var yorum_poster = document.getElementById("yorum-poster");
var cevapla_alani = document.getElementsByClassName("cevapla-alani");
var alt_yorumlar = document.getElementsByClassName("alt-yorumlar");
var giris_yap =document.getElementsByClassName("giris-yap");
function diziozetAc(){
    if(dizi_yorumlari.style.display == "block"){
        yorum_poster.style.display ="none";
        dizi_yorumlari.style.display = "none";
        dizi_ozet.style.display ="block";
        dizi_detay[0].style.display ="block";
    }
}

function diziyorumAc(){
    if(dizi_ozet.style.display == "block"){
        dizi_detay[0].style.display ="none";
        dizi_ozet.style.display = "none";
        dizi_yorumlari.style.display = "block";
        yorum_poster.style.display ="block";
    }

}
function altyorumekleAc(e){
    if(cevapla_alani[e].style.display == "block"){
        if(giris_yap[0].style.display == "block"){
            giris_yap[0].style.display="none";
        }
        cevapla_alani[e].style.display = "none";
    }
    else{
        if(giris_yap[0].style.display == "block"){
            giris_yap[0].style.display="none";
        }
        cevapla_alani[e].style.display = "block";
    }
}
function altCevapAc(e){
    if(alt_yorumlar[e].style.display == "none"){
        if(giris_yap[0].style.display == "block"){
            giris_yap[0].style.display="none";
        }
        alt_yorumlar[e].style.display = "block";
    }
    else{
        if(giris_yap[0].style.display == "block"){
            giris_yap[0].style.display="none";
        }
        alt_yorumlar[e].style.display = "none";
    }

}
function uyegiris(e){
    giris_yap[e].style.display="block";
}
function yaz(){
    alert("naber");
}