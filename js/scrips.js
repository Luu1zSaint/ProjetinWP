function ocutarMenu(){
    let navLateral = document.getElementById('recolher-menu');
    navLateral.classList.toggle('tamanhoNavLat');
    let navMenuInt = document.getElementsByClassName('nav-menu-interno');
    for (let i = 0; i < navMenuInt.length; i++) {
        const element = navMenuInt[i];
        element.classList.toggle('leftPosition');
    }
    let ocutar = document.getElementsByClassName('spanMsg');
    for (let i = 0; i < ocutar.length; i++) {
        const element = ocutar[i];
        element.classList.toggle('ocutarElemnt');
    }
}
