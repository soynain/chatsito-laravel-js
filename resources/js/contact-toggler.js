function mostrarContactos() {
    const listgroup = document.getElementsByClassName('list-group')[0];
    if(listgroup.getAttribute('style')!==null){
        listgroup.removeAttribute('style');
    }else{
        listgroup.setAttribute('style', 'display:none !important')
    }
}