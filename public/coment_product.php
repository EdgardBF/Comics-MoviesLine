<?php
require("../lib/master.php");
master::header("Comentar");
$time = time();
//Verifica que hayan datos a guardar, con el metodo Get,en el Id de la pagina
if(empty($_GET['id'])) 
{
    $id = null;
    $tipo_producto = null;
    if(!empty($_SESSION['usuario']))
    {
         $nombre = $_SESSION['usuario'];
    }
    else
    {
        $nombre = null;
    }
}
else
{
    $id = $_GET['id'];
}
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $comentario = $_POST['comentario'];
    $calificacion = $_POST['calificacion'];

    try{
        //Valida que los datos no esten vacios
        if(!empty($_SESSION['usuario'])){
            if($comentario != null)
            {
                if($calificacion >= 0 && $calificacion <=10) {
                    $fes = date("Y-m-d ", $time);
                    //Guarda los registros en la Base de Datos
                    $sql = "INSERT INTO comentarios(id_registro, comentario, id_producto, calificacion, id_tipo_comentario, fecha) VALUES(?, ?, ?, ?, ?, ?)";
                    $params = array($_SESSION['id_registro'], $comentario, $id ,$calificacion, 3, $fes);
                    if(Database::executeRow($sql, $params))
                    {
                        master::showMessage(1, "Operación satisfactoria, el comentario sera revisado por el administrador", "soporte_linea.php");
                    }                             
                    else
                    {
                        throw new Exception(Database::$error[1]);
                    }
                }
                else
                {
                    throw new Exception("Debe ingresar una Clasificacion de Producto adecuada");
                }
            }
            else
            {
                throw new Exception("Debe ingresar un Tipo de Producto adecuada");
            }
        }
        else
        {
            throw new Exception("Debe estar logeado para ingresar un comentario");
        }
    }
    catch(Exception $error){
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{
    $comentario = null;
    $calificacion = null;
        if(!empty($_SESSION['usuario']))
    {
         $nombre = $_SESSION['usuario'];
    }
    else
    {
        $nombre = null;
    }
}
?>
<h5 class="center-align">Comentarios</h5>
    <div class='container'>
        <div class='row'>
            <div class='col s12 m8 l8'>
                <div class="row">
                    <form class="col s12" method='post'>
                        <div class="center-align">
                            <i class="material-icons"><a class="icono">mode_comment</a></i><!--Icono de la parte superior del formulario-->
                        </div>
                        <div class="input-field col s12">
                            <input id="disabled" class="cyan-text text-darken-3" disabled type="text" class="validate" name='usuario' value='<?php print($nombre); ?>'>
                            <label for="disabled" class="cyan-text text-darken-3">Usuario Nombre</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
                        </div>
                        <div class="input-field col s12">
                            <input id="last_name" type="text" class="validate" name='comentario' value='<?php print($comentario); ?>' required/>
                            <label for="last_name" class="cyan-text text-darken-3">Comentario</label><!--El cuadro de texto donde se colocara el comentario-->
                        </div>
                        <div class="input-field col s12">
                            <input id="calificacion" type="text" class="validate" name='calificacion' max='10' min='0' value='<?php print($calificacion); ?>' required/>
                            <label for="calificacion" class="cyan-text text-darken-3">Clasificación</label><!--El cuadro de texto donde se colocara el comentario-->
                        </div>
                        <div class="center-align  boton">
                            <button type='submit' class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">cloud_upload</i>Enviar</button> <!--Boton con el cual se enviara el commentraio-->
                        </div>
                        <div class="center-align boton2">
                            <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="../dashboard/main_public/login.php"><i class="material-icons right">face</i> Registrate!</a><!--boton para rederigirse a registro-->
                        </div>
                    </form>
                </div>
            </div>

    <?php
    $id1 = $_GET['id'];
     $sql1 = "SELECT  * FROM productos WHERE id_producto = $id1 ORDER BY fecha ";
     $data1 = Database::getRows($sql1, null);
        if($data1 != null)
        {
            //Muestra los datos en cartas
            foreach ($data1 as $row1) 
            {
                print("
                    <div class='col s12 m4 l4'>
                        <div class='card'>
                            <div class='card-image waves-effect waves-block waves-light'>
                                <img class='materialboxed' src='data:image/*;base64,$row1[imagen]' width='300' height='150'>
                            </div>
                            <div class='card-content row'>
                                <span class='card-title activator grey-text text-darken-4'>$row1[nombre_producto] $ $row1[precio_producto]<i class='material-icons right'>keyboard_arrow_down</i></span>
                                <p>Clasificacion Promedio de: $row1[clasificacion]</p>
                            </div>
                            <div class='card-reveal'>
                                <span class='card-title grey-text text-darken-4'>$row1[nombre_producto] $$row1[precio_producto]<i class='material-icons right'>close</i></span>
                                <p>$row1[descripcion]</p>
                            </div>
                        </div>

                ");
            }
        }
        else
        {
            print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
        }
    ?>
</div>
    </div>
    <div class="section white"><!--Uso de una seccion blanca de materialize-->
    <div class="row container"><!--Uso del contenedor de materialize-->
       <ul class="collapsible " data-collapsible="accordion"><!--Este es la parte de acordeon donde se mostrara de primero el titulo y luego al darle click la demas informacion-->
        <li>
            <!--Titulo del tercero -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">comment</i><a class="white-text text-darken-2 texto">Comentarios</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <?php
            
            	$sql = "SELECT comentarios.id_comentario, registro.usuario, comentarios.comentario, productos.id_producto, productos.nombre_producto, comentarios.calificacion, comentarios.id_tipo_comentario FROM comentarios, registro, productos WHERE registro.id_registro = comentarios.id_registro AND productos.id_producto = comentarios.id_producto AND comentarios.id_tipo_comentario = 1 ORDER BY comentarios.fecha desc";
	            $params = null;
                //ejecutamos el metodo get rows para ver si tenemos respuesta
                $data = Database::getRows($sql, $params);
                if($data != null)
                {
                    foreach($data as $row)
                    {
                        if($row['id_producto'] == $id) {
                            print("
                                <h5>$row[usuario]</h5>
                                    <p>Producto: $row[nombre_producto]</p>
                                    <p>Comentario: $row[comentario]</p>
                                    <p>Clasificacion: $row[calificacion]</p>
                                    <hr>                        
                                ");
                        }
                        
                    }
                }
                else
                {
                    print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay comentarios en estos momentos.</div>");
                }
            ?>
            </span></div>
        </li>
    </ul>
    </div>
    </div>
<?php
master::footer("Comentar");
?>