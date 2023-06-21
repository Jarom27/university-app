let modalEditar = document.querySelectorAll(".edit");
let tabla_contenido = document.getElementById("table-content");
modalEditar.forEach(boton => {
    boton.addEventListener("click",e =>{
        console.log(e.target);
        console.log(tabla_contenido)
        let dato = e.target.parentElement.id;
        
        let array = tabla_contenido.children[dato-1];
        console.log(array);
        console.log(array.children[2].textContent)
        let email = document.getElementById("editar_email");
        let nombre = document.getElementById("editar_nombre");
        let apellidos = document.getElementById("editar_apellido");
        let direccion = document.getElementById("editar_direccion");
        let fecha = document.getElementById("editar_fecha")
        let nombre_real = array.children[1].children[0].textContent;
        console.log(nombre_real);
        let apellidos_real = array.children[1].children[1].textContent;
        
        nombre.value = nombre_real;
        apellidos.value = apellidos_real;
        email.value = array.children[2].textContent;
        direccion.value = array.children[3].textContent;
        fecha.value = array.children[4].textContent;



    })
})
let modalEliminar = document.querySelectorAll(".trash");
modalEliminar.forEach(boton=>{
    boton.addEventListener("click",e =>{
        let email = document.getElementById("eliminar_email");
        let dato = e.target.parentElement.id;
        
        let array = tabla_contenido.children[dato-1];
        email.value = array.children[2].textContent;
    });
});