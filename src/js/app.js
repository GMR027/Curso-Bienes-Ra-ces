console.log("Desde JS");

/*Como comentar varias lineas de codigo*/

document.addEventListener('DOMContentLoaded', function() {
  eventListeners();

  darkMode();
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


function darkMode () {

  //configuracion automatica de dark mode mediante la lectura de las preferencias del sistema
  const aparienciaDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
  //console.log(aparienciaDarkMode);

  if (aparienciaDarkMode.matches) {
    document.body.classList.add('dark-mode');
  } else {
    document.body.classList.remove('dark-mode');
  }

  aparienciaDarkMode.addEventListener('change', () => {
    if (aparienciaDarkMode.matches) {
      document.body.classList.add('dark-mode');
      } else {
        document.body.classList.remove('dark-mode');
    }
  });



  const botonDarckMode = document.querySelector('.dark-mode-boton');

    botonDarckMode.addEventListener('click', function() {
      document.body.classList.toggle('dark-mode');
      console.log('Click en icono darkmode')
  });
}

