<?php
require("../../lib/master.php");
master::header("Compras");
$sql = "SELECT id_vista_carrito, productos.id_producto, registro.nombre, registro.id_registro, registro.usuario, productos.nombre_producto, productos.precio_producto, vista_carrito.cantidad, productos.imagen FROM vista_carrito, carrito, productos, registro WHERE carrito.id_registro = registro.id_registro AND vista_carrito.id_carrito = carrito.id_carrito AND productos.id_producto = vista_carrito.id_producto  AND  carrito.id_registro = ?";
$params = array($_SESSION['id_registro']);
$data = Database::getRows($sql, $params);
$data1 = Database::getRow($sql, $params);
$nombre = $data1['nombre'];
    $tot =0;
     $apagar = 0;
if(!empty($_POST))
{
    $time = time();
    $_POST = Validator::validateForm($_POST);
    $postal = $_POST['postal'];
    $numero = $_POST['numero'];
    $credito = $_POST['credito'];
    $direccion = $_POST['direccion'];
     $valida = strlen($numero); 
     $valida1 = strlen($credito); 
        try{
        //Valida que los datos no esten vacios
            foreach ($data as $row)
    {
                $apagar = $row['cantidad']*$row['precio_producto'];
                $tot = $apagar+$tot;
    }
    foreach ($data as $row)
    {

            if($postal != null && $valida == 8)
            {
                if($numero != null)
                {
                    if($credito != null && $valida1 == 16)
                    {
                        $fes = date("Y-m-d ", $time);
                        //Guarda los registros en la Base de Datos
                        $sql = "INSERT INTO compra(id_producto, cantidad, tarjeta, id_registro, fecha, numero, codigo_postal, direccion, pagado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $params = array($row['id_producto'], $row['cantidad'], $credito, $_SESSION['id_registro'], $fes, $numero, $postal, $direccion, $tot);
                        Database::executeRow($sql, $params);
                        $sql = "DELETE FROM vista_carrito WHERE id_vista_carrito = ?";
                        $params = array($row['id_vista_carrito']);
                        Database::executeRow($sql, $params);
                        master::showMessage(1, "Operación satisfactoria", "../../lib/reporte.php?id=".$_SESSION['id_registro']);

                    }
                    else
                    {
                         throw new Exception("Debe ingresar una tarjeta de credito valida");
                    }
                }
                else
                {
                     throw new Exception("Debe Ingresar un telefono valido");
                }
                
            }
            else
            {
                 throw new Exception("Debe ingresar un codigo postal");
            }
    } 
                            


            }
            catch(Exception $error){
                master::showMessage(2, $error->getMessage(), null);
            }
    
}
else
{
    $postal = null;
    $numero = null;
    $credito = null;
    $direccion = null;
    
}
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
                    <?php
                        //master::showMessage(1, $_SESSION['id_registro'], null);
                       
                          if($data != null)
                            {
                    foreach ($data as $row) 
                                {
                    print("
                    
                        <div class='col s12 m4'>
                            <div class='card'>
                                <div class='card-image'>
                                    <img class='materialboxed' src='data:image/*;base64,$row[imagen]' width='300' height='150'>
                                    <a class='btn-floating halfway-fab waves-effect waves-light red' href='#modal2-".$row['id_vista_carrito']."'><i class='material-icons'>close</i></a>
                                    <div id='modal2-".$row['id_vista_carrito']."' class='modal'>
                                    <div class='modal-content'>
                                    <h4>¡CUIDADO!</h4>
                                    <p>ESTA A PUNTO DE ELIMINAR UN PRODUCTO, ¿ESTA SEGURO?</p>
                                    </div>
                                    <div class='modal-footer'>
                                    <a href='#!' onclick='eliminarCa(".$row['id_vista_carrito'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
                                    <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>No</a>
                                    </div>
                                    </div>
                                </div>
                                <div class='card-content'>
                                    <p class='grey-text text-darken-4'><h5>$row[nombre_producto] $ $row[precio_producto]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Cantidad: $row[cantidad]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>A pagar: $ ".$row['cantidad']*$row['precio_producto']."</h5></p>
                                </div>
                            </div>
                        </div>
                        

                        ");
                         $apagar = $row['cantidad']*$row['precio_producto'];
                         $tot = $apagar+$tot;
                        }
                            }
                            else{
                                print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
                            }
                                print ("
                                <H1>TOTAL: $ $tot</H1>");
                        ?>
                </div>
                <div id="test-swipe-2" class="col s12 cyan darken-3 z-depth-4">
                    <div class="center-align">
                        <p><h5 class="tipografia">COMPRA ONLINE</h5></p>
                    </div>
                     <div class="row">
                     <!--Formulario para la compra de Articulos-->
                        <form class="col s12" method='post'>
                            <div class="row ">
                                <div class="input-field col s6">
                                <input id="first_name" class="black-text" disabled type="text" class="validate " value='<?php print($nombre); ?>' required/>
                                <label for="first_name" class="black-text">Nombre</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="cod" type="number" name = "postal" pattern="[0-9]" class="validate" value='<?php print($postal); ?>' autocomplete="off" required/>
                                    <label for="cod" class="black-text">Codigo Postal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                <input id="number" type="tel" pattern="[0-9]{8}" class="validate" name = "numero" value='<?php print($numero); ?>'  autocomplete="off" required/>
                                <label for="number" class="black-text">Telefono</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="cod" type="text" name = "direccion" class="validate" value='<?php print($direccion); ?>' autocomplete="off" required/>
                                    <label for="cod" class="black-text">Direccion</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <input id="tarjeta" type="number" pattern="[0-9]{16}" class="validate" name = "credito" value='<?php print($credito); ?>' autocomplete="off" required/>
                                <label for="tarjeta" class="black-text">Tarjeta de Credito</label>
                                </div>
                            </div>
                            <p><h5 class="tipografia">Productos a comprar</h5></p>
                            <div class="center-align">
                                                    <?php
                        $sql = "SELECT id_vista_carrito, registro.id_registro, registro.usuario, productos.nombre_producto, productos.precio_producto, vista_carrito.cantidad, productos.imagen FROM vista_carrito, carrito, productos, registro WHERE carrito.id_registro = registro.id_registro AND vista_carrito.id_carrito = carrito.id_carrito AND productos.id_producto = vista_carrito.id_producto  AND  carrito.id_registro = ?";
                        $params = array($_SESSION['id_registro']);
                        //master::showMessage(1, $_SESSION['id_registro'], null);
                        $apagar = 0;
                        $tot =0;
                        $data = Database::getRows($sql, $params);
                          if($data != null)
                            {
                    foreach ($data as $row) 
                                {
                    print("
                    
                        <div class='col s12 m4'>
                            <div class='card'>
                                <div class='card-image'>
                                    <img class='materialboxed' src='data:image/*;base64,$row[imagen]' width='300' height='150'>
                                    <a class='btn-floating halfway-fab waves-effect waves-light red' href='#modal1-".$row['id_vista_carrito']."'><i class='material-icons'>close</i></a>
                                    <div id='modal1-".$row['id_vista_carrito']."' class='modal'>
                                    <div class='modal-content'>
                                    <h4>¡CUIDADO!</h4>
                                    <p>ESTA A PUNTO DE ELIMINAR UN PRODUCTO, ¿ESTA SEGURO?</p>
                                    </div>
                                    <div class='modal-footer'>
                                    <a href='#!' onclick='eliminarCa(".$row['id_vista_carrito'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
                                    <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>No</a>
                                    </div>
                                    </div>
                                </div>
                                <div class='card-content'>
                                    <p class='grey-text text-darken-4'><h5>$row[nombre_producto] $ $row[precio_producto]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>Cantidad: $row[cantidad]</h5></p>
                                    <p class='grey-text text-darken-4'><h5>A pagar: $ ".$row['cantidad']*$row['precio_producto']."</h5></p>
                                </div>
                            </div>
                        </div>
                        

                        ");
                         $apagar = $row['cantidad']*$row['precio_producto'];
                         $tot = $apagar+$tot;
                        }
                            }
                            else{
                                print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
                            }
                        ?>
                            </div>
                            <div>
                                <?php
                                 print ("
                                <H5>TOTAL: $ $tot</H5>");
                                ?>
                             </div>
                        <button class="btn waves-effect waves-light button-compra" type="submit" name="action">Comprar
                        <i class="material-icons right">shopping_cart</i>
                    </button><br><br>
                    <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Terminos y Condiciones</a>
                        </form>
                    </div>
                    
                    <!-- Modal Structure -->
                    <div id="modal1" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h4>Terminos Y Condiciones</h4>
                            <p>Al Comprar en esta Tienda Online acepta, el producto de compra, y que los respectivos derechos de autor de cada articulo estan ligados a sus unicos propietarios.<br>
                            Esta Tienda solo es un medio por el cual se puede obtener el producto por un precio anteriormente estimado.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
  </section>
<?php
master::footer("Compras");
?>