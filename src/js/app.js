console.log("Desde JS");

/*Como comentar varias lineas de codigo*/

document.addEventListener('DOMContentLoaded', function() {
  eventListeners();
});

function eventListeners() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click', menuresponsive);
}

function menuresponsive () {
  const navegacion = document.querySelector('.navegacion');

  /* Metodo para nuevos usuarios
  if(navegacion.classList.contains('mostrar')) {
    navegacion.classList.remove('mostrar');
  } else {
    navegacion.classList.add('mostrar');
  }

  */

  //Metodo para ususarios un poco mas experimentados
  navegacion.classList.toggle('mostrar');
}