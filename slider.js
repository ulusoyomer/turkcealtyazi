var slayt = document.getElementsByClassName("slayt");
var kontrolsayısı = document.getElementsByClassName("kontrolslayt");
var slaytSayısı = slayt.length;
var slaytNo = 0;

    function onceki(){
    slaytNo--;

    slaytGoster(slaytNo);
}

slaytGoster(slaytNo);
    function sonraki(){
    slaytNo++;

    slaytGoster(slaytNo);
}
    function birinci(){
        slaytNo=0;

        slaytGoster(slaytNo);
    }
    function ikinci(){
        slaytNo=1;

        slaytGoster(slaytNo);
    }
    function ucuncu(){
        slaytNo=2;

        slaytGoster(slaytNo);
    }
    function dorduncu(){
        slaytNo=3;

        slaytGoster(slaytNo);
    }
    function besinci(){
        slaytNo=4;

        slaytGoster(slaytNo);
    }
    setInterval(function() {
        slaytNo++;
        slaytGoster(slaytNo);
    },5000);
function slaytGoster(slaytNumarası){
    slaytNo = slaytNumarası;

    if(slaytNumarası >= slaytSayısı){
        slaytNo = 0;
    }
    if(slaytNumarası < 0){
        slaytNo = slaytSayısı-1;
    }

    for(i = 0 ; i<slaytSayısı;i++){
        slayt[i].style.display = "none";
        kontrolsayısı[i].style.background="rgba(255,255,255,0.5)";
    }

    slayt[slaytNo].style.display= "block";
    kontrolsayısı[slaytNo].style.background="rgba(255,255,255,0.9)";
    

}