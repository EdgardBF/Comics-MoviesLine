<?php
require("../lib/master.php");
master::header("Productos");
//Libreria Zebra IMPORTANTE para paginación
require_once '../lib/Zebra_Pagination.php';
?>
    <!--Se manda a llamar un archivo maestro del Slider -->
    <section>
      <?php
        include ('../archivosmaestros/slider.php')
      ?>
  </section>
  <section>
    <div class="row">
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m12 l12" >
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text">
                <div class="row">
                    <!--Se dice que tamaño del grid se usara-->
                    <div class="col s12 m6 l6 center-align">
                        <p><h5 class="tipografia">PRODUCTOS EN COMICS AND MOVIES LINE</h5></p>
                    </div>
                    <!--Se dice que tamaño del grid se usara-->
                    <div class="col s12 m6 l6" >
                        <nav>
                            <div class="nav-wrapper ">
                                <form>
                                    <div class="input-field cyan darken-3 z-depth-4">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <!--<img class='materialboxed' src='data:image/*;base64,$row[imagen]'>-->
                <div class='container'>
                    <div class='row'>
                    <?php
                    $total = "SELECT *  FROM productos";
                    $registros = Database::numRows($total,null);
                    //Numero de registros para mostrar en pantalla
                    $resultados = 10;
                    //Iniciar clase Zebra
                    $pagination = new Zebra_Pagination();
                    //Funciones de Zebra
                    $pagination->records($registros);
                    $pagination->records_per_page($resultados);
                    //Modificar Select
                    $sql = "SELECT productos.id_producto, productos.nombre_producto, productos.precio_producto, tipo_producto.tipo_producto, productos.descripcion, distribucion.distribucion, imagen  FROM productos, tipo_producto, distribucion  WHERE  productos.id_tipo_producto = tipo_producto.id_tipo_producto AND productos.id_distribucion = distribucion.id_distribucion AND productos.id_imagen = imagenes.id_imagen LIMIT ".(($pagination->get_page()-1)*$resultados).",".$resultados;

                    $data = Database::getRows($sql, null);
                    if($data != null)
                    {
                        foreach ($data as $row) 
                        {
                            print("
                                <div class='col s12 m6 l6'>
                                    <div class='card'>
                                        <div class='card-image waves-effect waves-block waves-light'>
                                            
                                        </div>
                                            <div class='card-content'>
                                                <span class='card-title activator grey-text text-darken-4'>$row[nombre_producto] $ $row[precio_producto]<i class='material-icons right'>keyboard_arrow_down</i></span>
                                                <p><a onclick='Materialize.toast('Agregado al Carrito', 4000)'>Agregar al Carrito</a></p>
                                                <a class='btn-floating btn-small waves-effect cyan darken-3'><i class='material-icons'>star</i></a>
                                                <a class='btn-floating btn-small waves-effect cyan darken-3'><i class='material-icons'>star</i></a>
                                                <a class='btn-floating btn-small waves-effect cyan darken-3'><i class='material-icons'>star</i></a>
                                                <a class='btn-floating btn-small waves-effect cyan darken-3'><i class='material-icons'>star_half</i></a>
                                                <a class='btn-floating btn-small waves-effect cyan darken-3'><i class='material-icons'>star_border</i></a>
                                            </div>
                                        <div class='card-reveal'>
                                            <span class='card-title grey-text text-darken-4'>$row[nombre_producto] $$row[precio_producto]<i class='material-icons right'>close</i></span>
                                            <p>$row[descripcion]</p>
                                        </div>
                                        <div class='card-action'>
                                            <div class='center-align'>
                                                    <a class='waves-effect waves-light btn cyan darken-3 separar' href='#modal1'> <span class='reponsivo'>comentarios</span> <i class='material-icons'><span class='icono-boton'>comment</span></i></a>
                                            </div>
                                            <!-- Modal Structure -->
                                            <div id='modal1' class='modal bottom-sheet modal-fixed-footer'>
                                                <div class='modal-content'>
                                                <h4>Comentarios</h4>
                                                <div class='input-field col s12'>
                                                    <input id='last_name' type='text' class='validate'>
                                                    <label for='last_name' class='cyan-text text-darken-3'>Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                                                </div>
                                                <h5>Nombre_usaurio</h5>
                                                <p>
                                                    Lugar donde ira el comentario de los clientes
                                                </p>
                                                <hr>
                                                <h5>Nombre_usaurio</h5>
                                                <p>
                                                    Lugar donde ira el comentario de los clientes
                                                </p>
                                                <hr>
                                                <h5>Nombre_usaurio</h5>
                                                <p>
                                                    Lugar donde ira el comentario de los clientes
                                                </p>
                                                <hr>
                                                <h5>Nombre_usaurio</h5>
                                                <p>
                                                    Lugar donde ira el comentario de los clientes
                                                </p>
                                                </div>
                                                <div class='modal-footer'>
                                                    <a href='#!' class=' modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4'>Enviar</a>
                                                    <a href='registro.php' class=' modal-action modal-close waves-effect waves-green btn-flat grey-text text-darken-4'>Registrate</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                            ");
                        }
                        $pagination->render();
                    }
                    else
                    {
                        print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
                    }
                    ?>
                    </div><!-- Fin de row -->
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--<section>
    <ul class="pagination center-align texto tipografia ">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active cyan darken-3"><a href="#!">1</a></li>
        <li class="waves-effect cyan darken-3"><a href="#!">2</a></li>
        <li class="waves-effect cyan darken-3"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
  </section>-->
<?php
master::footer("Productos");
?>