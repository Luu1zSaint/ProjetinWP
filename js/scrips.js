function mostrarMenu(){
    let removerRel = document.getElementById("menu-externo")
    removerRel.classList.remove("classRel")
    let removerAbs = document.getElementById("menu-oculto")
    removerAbs.classList.remove("nav-menu-interno", "classAbs")
    let add = document.getElementById("menu-oculto")
    add.classList.add('interno-abaixo')
}
function recolherMenuLat(){
    let btnRecolher = document.getElementById("recolher-menu")
    btnRecolher.classList.toggle("active")
}
