var ust_menu_yazı = document.getElementsByClassName("ust-menu-yazı");
var text_place = document.getElementsByClassName("text-place");
var yazı = document.getElementsByClassName("menu-bas-yazı");
var orta_menu_liste = document.getElementsByClassName("orta-menu-liste");
var b = 0;
var yuk = document.getElementById("yukari");
var ust_menu = document.getElementsByClassName("ust-menu");
var girispaneli = document.getElementById("girispaneli");
var girispaneli2 = document.getElementById("girispaneli2");
var girisler = document.getElementsByClassName("girisler");
var oyuncu_ad = document.getElementsByClassName("oyuncu-ad");
var anket_soru = document.getElementsByClassName("anket-soru");
var anket_cevap = document.getElementsByClassName("anket-cevap");
window.addEventListener('mouseup', function(event){
    if(girispaneli != null){
        if(event.target != girispaneli && event.target != girisler[0] && event.target != girisler[1]){
            if(girispaneli.style.display == "block"){
                girispaneli.style.display = "none";
            }
                
            
        }
    }
});
window.addEventListener('mouseup', function(event){
    if(girispaneli2 != null){
        if(event.target != girispaneli2 && event.target.parentNode != girispaneli2){
            girispaneli2.style.display = "none";
        }
    }
});

function anketAc(a,b){
    if(a == 1){
        if(anket_soru[b].style.display == "none"){
            anket_soru[b].style.display = "block";
        }
        else{
            anket_soru[b].style.display = "none";
        }
    }
    else if(a == 2){
        if(anket_cevap[b].style.display == "none"){
            anket_cevap[b].style.display = "block";
        }
        else{
            anket_cevap[b].style.display = "none";
        }
    }
}

function karart(a){
    if(a == 0){
        oyuncu_ad[0].style.background = "url(../img/baslik.png) 0 -631px";
    }
    if(a == 1){
        oyuncu_ad[1].style.background = "url(../img/baslik.png) 0 -631px";
    }
    if(a == 2){
        oyuncu_ad[2].style.background = "url(../img/baslik.png) 0 -631px";
    }
    if(a == 3){
        oyuncu_ad[3].style.background = "url(../img/baslik.png) 0 -631px";
    }
    if(a == 4){
        oyuncu_ad[4].style.background = "url(../img/baslik.png) 0 -631px";
    }
}
function rengiac(a){
    
        oyuncu_ad[a].style.background = "none";
    
}

function gpaneliAc(){
    if(girispaneli.style.display == "none")
        girispaneli.style.display = "block";
}
function gpaneliAc2(){
    girispaneli2.style.display = "block";
}


    
function ortamenuac(a){
    if(b != a){
        orta_menu_liste[b].style.display="none";
    }
    b =a;
    orta_menu_liste[a].style.display = "block";
}

    function yaz(a){
        yazı[0].innerHTML=ust_menu_yazı[a].innerHTML;
        if(a == 1){
            text_place[0].placeholder="Sanatçı adı giriniz";
        }
       else if(a == 2){
            text_place[0].placeholder="Çevirmen adı giriniz";
        }
       else if(a == 3){
            text_place[0].placeholder="Kelime giriniz";
        }
        else if(a == 0){
            text_place[0].placeholder="Film / Dizi adı ya da IMDb linki giriniz";
        }
    }

    function menuac(){
        if(ust_menu[0].style.display== "block"){
            ust_menu[0].style.display= "none";
        }
        else{ust_menu[0].style.display= "block";}
        
    }
    function kapat(){
        ust_menu[0].style.display= "none";
    }
    function ac(){
        ust_menu[0].style.display= "block";
    }

   function yukari(){
    if(window.scrollY > 100){
        yuk.style.display = "block";
    }
    else{
        yuk.style.display = "none";
    }
   }
   function yac(e){
    $sonyorum = document.getElementById("sonyorum");
    $yorumbazlar = document.getElementById("yorumbazlar");
       if(e == 1){
           $sonyorum.style.display = "block";
           $yorumbazlar.style.display = "none";
       }
       else if(e == 2){
        $sonyorum.style.display = "none";
        $yorumbazlar.style.display = "block";
       }
   }
   
