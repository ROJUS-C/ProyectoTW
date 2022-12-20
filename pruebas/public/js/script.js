//CAMBIAR COLOR DE LAS OPCIONES DEL MENU

let lista = document.querySelectorAll('.navItem');
for(let i=0; i<lista.length; i++){
  lista[i].onclick = function(){
    let j = 0;
    while(j<lista.length){
      lista[j].className = 'nav-item';
      j++;
    }
    lista[i].className = 'nav-item active';
  }
}