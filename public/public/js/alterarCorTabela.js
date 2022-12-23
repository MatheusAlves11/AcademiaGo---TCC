const todasAsTabelas=document.querySelectorAll("tr");
const posicao=document.querySelector("[data-posicao]").value;
if(posicao=="A"){
    var posicaoes=1;
}else if(posicao=="B"){
    var posicaoes=2;
}else{
    var posicaoes=3;
}
var contador=0;
for (const tabelaTreino of todasAsTabelas) {
     if(contador===posicaoes && contador!=0){
         tabelaTreino.classList.add('destacar');
         break;
    }
     contador++; 
}