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
                    <div class="col s12 m12 l12 center-align">
                        <p><h5 class="tipografia">PRODUCTOS EN COMICS AND MOVIES LINE"</h5></p>
                    </div>
                </div>
                    <!--Se dice que tamaño del grid se usara-->
                    <form method='post'>
                        <div class='row'>
                            <div class='input-field col s6 m4'>
                                <input id='buscar' type='text' name='buscar'/>
                                <label for='buscar'>Buscar</label>
                            </div>
                                <div class='input-field col s6 m4'>
                                    <button type='submit' class='btn waves-effect #00838f cyan darken-3'>Buscar<i class='material-icons left'>search</i></button> 	
                                </div>
                        </div>
                    </form>
                
                <!---->
                <div class='container'>
                    <div class='row'>
                    <?php
                        try 
                        {
                            //Obtiene los datos de la Busqueda
                            if(!empty($_POST))
                            {
                                $search = trim($_POST['buscar']);
                                $sql = "SELECT * FROM productos WHERE nombre_producto LIKE ? OR precio_producto LIKE ? ORDER BY fecha ";
                                $params = array("%$search%", "%$search%");
                            }
                            else
                            {
                                $sql = "SELECT  * FROM productos ORDER BY fecha ";
                                $params = null;
                            }
                            //Cuenta la cantidad de registros mostrados
                            $registros = Database::numRows($sql,$params);
                            //Numero de registros para mostrar en pantalla
                            $resultados = 4;
                            //Iniciar clase Zebra
                            $pagination = new Zebra_Pagination();
                            //Funciones de Zebra
                            $pagination->records($registros);
                            $pagination->records_per_page($resultados);
                            //Modificar Select y Limitar por pagina
                            $sql .= "LIMIT ".(($pagination->get_page()-1)*$resultados).",".$resultados;
                            $data = Database::getRows($sql, $params);
                            if($data != null)
                            {
                                //Muestra los datos en cartas
                                foreach ($data as $row) 
                                {
                                    print("
                                        <div class='col s12 m6 l6'>
                                            <div class='card'>
                                                <div class='card-image waves-effect waves-block waves-light'>
                                                    <img class='materialboxed' src='data:image/*;base64,$row[imagen]' width='300' height='150'>
                                                </div>
                                                <div class='card-content row'>
                                                    <span class='card-title activator grey-text text-darken-4'>$row[nombre_producto] $ $row[precio_producto]<i class='material-icons right'>keyboard_arrow_down</i></span>
                                                    <p>Clasificacion Promedio de: $row[clasificacion]</p>
                                                    <p><button type='submit' class='waves-effect waves-light btn  #00838f cyan darken-3 col s12' onclick='agrecar(".$row['id_producto'].")'><i class='material-icons right'>shopping_cart</i>Agregar al Carrito</button> </p>
                                                    <div class='input-field col s12'>
                                                        <input id='precio' type='number' name='cantidad' class='validate' required/>
                                                        <label for='precio' class='cyan-text text-darken-3'>cantidad</label><!--El cuadro de texto donde se pondra el precio-->
                                                    </div>
                                                </div>
                                                <div class='card-reveal'>
                                                    <span class='card-title grey-text text-darken-4'>$row[nombre_producto] $$row[precio_producto]<i class='material-icons right'>close</i></span>
                                                    <p>$row[descripcion]</p>
                                                </div>
                                                <div class='card-action'>
                                                    <div class='center-align'>
                                                            <a class='waves-effect waves-light btn cyan darken-3 separar' href='coment_product.php?id=".$row['id_producto']."'> <span class='reponsivo'>comentarios</span> <i class='material-icons'><span class='icono-boton'>comment</span></i></a>
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
                        }
                        catch (Exception $error)
                        {
                            master::showMessage(2, $error->getMessage(), null);
                        }
                    ?>
                    </div><!-- Fin de row -->
                </div>
            </div>
        </div>
    </div>
  </section>
<?php
master::footer("Productos");
?>