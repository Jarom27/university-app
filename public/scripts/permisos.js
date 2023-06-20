let roles = document.querySelectorAll(".role");
let states = document.querySelectorAll(".state");
roles.forEach(role => {
    if(role.textContent == "Administrador"){
        role.classList.add("text-bg-warning");
    }
    if(role.textContent == "Maestro"){
        role.classList.add("text-bg-info");
    }
    if(role.textContent == "Alumno"){
        role.classList.add("text-bg-secondary");
    }
});
states.forEach(state=>{
    if(state.textContent == "Activo"){
        state.classList.add("text-bg-success");
    }
    if(state.textContent == "Inactivo"){
        state.classList.add("text-bg-danger");
    }
})