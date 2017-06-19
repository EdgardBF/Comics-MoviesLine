$( document ).ready(function(){
    //Se inicializan los componentes
    $(".button-collapse").sideNav();
    $('.collapsible').collapsible();
    $('select').material_select();
    $(".dropdown-button").dropdown();
    $('.slider').slider({
        //Se le cambia el alto al Slider
        height: 400
    });
    $('.materialboxed').materialbox();
    $('ul.tabs').tabs();
    $('.modal').modal();
})
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {zoom: 16});
  var geocoder = new google.maps.Geocoder;
  geocoder.geocode({'address': 'Multiplaza, San Salvador'}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
    } else {
      window.alert('Geocode was not successful for the following reason: ' +
          status);
    }
  });
}
window.fbAsyncInit = function() {
    FB.init({
      appId      : '113362692514424',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "../js/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function eliminar (id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminar.php?id="+id;
}
function eliminarT (id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminar_tipo.php?id="+id;
}
function eliminardis (id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminar_distribucion.php?id="+id;
}
function eliminarTP(id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminar_tipo_producto.php?id="+id;
}
function eliminarPro(id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminar_productos.php?id="+id;
}
function eliminarN(id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminar_noticias.php?id="+id;
}
function eliminarP(id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminarcompag.php?id="+id;
}
function eliminarP(id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminarcompag.php?id="+id;
}
function actupag(id){
  console.log(id);
  window.location="./../../dashboard/main_admin/actualizar_compagina.php?id="+id;
}
function agrecar(id, cantidad){
  console.log(id);
  console.log(cantidad)
  window.location="./../dashboard/main_admin/agrecarrito.php?id="+id;
}
function coment_pro(usuario,comentario,producto,calificacion,tipo){
  console.log(usuario);
  console.log(comentario);
  console.log(producto);
  console.log(calificacion);
  console.log(tipo);
  window.location="./../../dashboard/main_public/comentarios_producto.php.php?id="+producto;
}
function eliminarD (id){
  console.log(id);
  window.location="./../../dashboard/main_admin/eliminar_admin.php?id="+id;
}
