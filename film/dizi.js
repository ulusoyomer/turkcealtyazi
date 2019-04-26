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
    if(e == 0){
        var ac = document.getElementById("alt_yor0");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 1){
        var ac = document.getElementById("alt_yor1");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 2){
        var ac = document.getElementById("alt_yor2");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 3){
        var ac = document.getElementById("alt_yor3");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 4){
        var ac = document.getElementById("alt_yor4");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    
    
    
    
    
    
}
function altCevapAc(e){
    if(e == 0){
        var ac = document.getElementById("alt-yorumlar0");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 1){
        var ac = document.getElementById("alt-yorumlar1");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 2){
        var ac = document.getElementById("alt-yorumlar2");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 3){
        var ac = document.getElementById("alt-yorumlar3");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }
    if(e == 4){
        var ac = document.getElementById("alt-yorumlar4");
        if(ac.style.display == "none"){
            ac.style.display = "block";
        }
        else{
            ac.style.display = "none";
        }
    }

}
function acAltyazi(e){
    var ad = e+"sezona";
    var alt_yazı = document.getElementById(ad);
    if(alt_yazı.style.display == "none"){
        alt_yazı.style.display = "block";
    }
    else{
        alt_yazı.style.display = "none";
    }
}
function uyegiris(e){
    giris_yap[e].style.display="block";
}
function yaz(){
    alert("naber");
}