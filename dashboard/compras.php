<?php
require("../lib/master.php");
master::header("Compras");
?>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
        <div class="row">
            <!--Se dice que tamaño del grid se usara-->
            <div class="col s12 m12 l12" >
            <!--Crea un menu de Tabs-->
                <ul id="tabs-swipe-demo" class="tabs z-depth-4">
                    <li class="tab col s5 "><a class="active" href="#test-swipe-1">Paso 1</a></li>
                    <li class="tab col s5"><a href="#test-swipe-2">Paso 2</a></li>
                </ul>
                <div id="test-swipe-1" class="col s12 cyan darken-3 z-depth-4">
                    <div class="center-align">
                        <p><h5 class="tipografia">PRODUCTOS A COMPRAR EN LA TIENDA</h5></p>
                    </div>
                    <!--Tarjetas-->
                    <div class="row">
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="../img/slider2.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="Materialize.toast('Eliminado del Carrito', 4000)"><i class="material-icons">close</i></a>
                                </div>
                                <div class="card-content">
                                    <p class="grey-text text-darken-4"><h5>Doctor Strange  $39.00</h5></p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="../img/producto1.png">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="Materialize.toast('Eliminado del Carrito', 4000)"><i class="material-icons">close</i></a>
                                </div>
                                <div class="card-content">
                                    <p class="grey-text text-darken-4"><h5>Star Wars: The Force Awakens $46.00</h5></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light button-compra" type="submit" name="action">Siguiente
                        <i class="material-icons right">keyboard_arrow_right</i>
                    </button><br><br>
                </div>
                <div id="test-swipe-2" class="col s12 cyan darken-3 z-depth-4">
                    <div class="center-align">
                        <p><h5 class="tipografia">COMPRA ONLINE</h5></p>
                    </div>
                     <div class="row">
                     <!--Formulario para la compra de Articulos-->
                        <form class="col s12">
                            <div class="row ">
                                <div class="input-field col s6">
                                <input id="first_name" type="text" class="validate ">
                                <label for="first_name" class="black-text">Nombres</label>
                                </div>
                                <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name" class="black-text">Apellidos</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="email" type="email" class="validate">
                                <label for="email" class="black-text">Correo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="cod" type="text" class="validate">
                                <label for="cod" class="black-text">Codigo Postal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="number" type="text" class="validate">
                                <label for="number" class="black-text">Numero</label>
                                </div>
                            </div>
                            <p><h5 class="tipografia">FORMAS DE PAGO</h5></p>
                            <div class="center-align">
                                <a href="#!"><img height="100" src="../img/paypal.png"></a>
                                <a href="#!"><img height="100" src="../img/visa-otros.png"></a>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="tarjeta" type="text" class="validate">
                                <label for="tarjeta" class="black-text">Tarjeta de Credito</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Terminos y Condiciones</a>
                    <!-- Modal Structure -->
                    <div id="modal1" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h4>Terminos Y Condiciones</h4>
                            <p>Al Comprar en esta Tienda Online acepta, el producto de compra, y que los respectivos derechos de autor de cada articulo estan ligados a sus unicos propietarios.<br>
                            Esta Tienda solo es un medio por el cual se puede obtener el producto por un precio anteriormente estimado.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Acepto</a>
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Rechazo</a>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light button-compra disabled" type="submit" name="action">Comprar
                        <i class="material-icons right">shopping_cart</i>
                    </button><br><br>
                </div>
            </div>
        </div>    
  </section>
<?php
master::footer();
?>