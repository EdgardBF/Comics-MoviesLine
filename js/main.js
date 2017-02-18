$( document ).ready(function(){
    //Se inicializan los componentes
    $(".button-collapse").sideNav();
    $('.slider').slider({
        //Se le cambia el alto al Slider
        height: 400
    });
    $('.materialboxed').materialbox();
    $('ul.tabs').tabs();
    $('.modal').modal();
})

