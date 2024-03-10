document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
});
function eventListeners(){
    bar_menu();
    navegacionFija();
    darkmode();
    cerrarAlerta();
    ventanaModal();
    formulario();
}


// Funcion para el menu desplegable
function bar_menu(){
    const toggle_btn = document.querySelector('.toggle-btn');
    const toggle_btn_icon = document.querySelector('.toggle-btn i');
    const menu_desplegable = document.querySelector('.menu-desplegable');

    toggle_btn.onclick=function(){
        menu_desplegable.classList.toggle('open');
        const isOpen = menu_desplegable.classList.contains('open');
        toggle_btn_icon.classList = isOpen
        ? 'fa-solid fa-xmark'
        : 'fa-solid fa-bars'
    }
}
//funcion barra de navegacion fija
function navegacionFija(){
    const barra = document.querySelector('.barra-fija');
    window.addEventListener('scroll', function(){
        barra.classList.toggle('activo',window.scrollY > 0);
    })
}
//Boton darkmode
function darkmode(){
    const prefiereDarkmode = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(prefiereDarkmode.matches)
    const toggle = document.querySelector('.container');
    const body = document.querySelector('body');
    toggle.onclick = function(){
        console.log("Si");
        toggle.classList.toggle('active');
        toggle2.classList.toggle('active2');

        body.classList.toggle('dark-mode');
    }
    const toggle2 = document.querySelector('.container2');
    toggle2.onclick = function(){
        toggle2.classList.toggle('active2');
        toggle.classList.toggle('active');
        body.classList.toggle('dark-mode');
    }
    if(prefiereDarkmode.matches){
        body.classList.add('dark-mode');
        toggle.classList.add('active');
        toggle2.classList.add('active2');
    }
    else{
        body.classList.remove('dark-mode');
        toggle.classList.remove('active');
        toggle2.classList.remove('active2');
    }
    prefiereDarkmode.addEventListener('change',function(){
        if(prefiereDarkmode.matches){
            body.classList.add('dark-mode');
            toggle.classList.add('active');
            toggle2.classList.add('active2');
        }
        else{
            body.classList.remove('dark-mode');
            toggle.classList.remove('active');
            toggle2.classList.remove('active2');
        }
    })
}
function cerrarAlerta(){
    var alerta = document.querySelector('.alerta');
    const contalerta = document.querySelector(".contenedor-alertas");
    if(alerta !== null){
        const boton = document.querySelector('.alerta-btn-cerrar');
        setTimeout(() => {
            alerta.classList.add('alerta-cerrando');
            contalerta.classList.add("eliminar-def");
        }, 5000);
        boton.addEventListener('click', function(){
            alerta.classList.add('alerta-cerrando');
            contalerta.classList.add("eliminar-def");
        });
        
    }
    
}

function ventanaModal(){
    const modal = document.querySelectorAll(".contenedor-modal");

}
//Muestra campos condicionales
function formulario(){
    const metodocontacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    console.log(metodocontacto);
    metodocontacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto) );
    // metodocontacto.addEventListener('click', mostrarMetodosContacto());
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');
    // 
    if(e.target.id == "contactar-email"){
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]" >
        `;
    } else{
        contactoDiv.innerHTML = `
            <label for="telefono">Numero de telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]" >

            <p>Eliga fecha y hora en que desea ser contactado</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]" >

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" >
        `;
    }
}