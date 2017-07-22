<?php
require("../../lib/master.php");
master::header("ProductosAdmin");
if($_SESSION['crear'] == 0)
{
    master::showMessage(2, "No tiene permisos para entrar", "main.php");
}
?>
<h3 class="center-align">Productos</h3>
<?php
//Obtiene la Hora del Sistema
$time = time();
//Verifica que hayan datos a guardar, con el metodo Get,en el Id de la pagina
if(empty($_GET['id'])) 
{
    $id = null;
    $nombre = null;
    $precio = null;
    $tipo = null;
    $distribucion = null;
    $descripcion = null;
    $cantidad = null;
    $fecha = date("Y-m-d ", $time);
    $imagen = null;
}
else
{
                if(isset($_GET['id']) && ctype_digit($_GET['id'])) 
{
    if($_SESSION['actualizar'] == 0)
    {
    master::showMessage(2, "No tiene permisos para entrar", "main.php");
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id_producto = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['nombre_producto'];
    $precio = $data['precio_producto'];
    $tipo = $data['id_tipo_producto'];
    $distribucion = $data['id_distribucion'];
    $descripcion = $data['descripcion'];
    $cantidad = $data['cantidad'];
    $fecha = $data['fecha'];
    $imagen = $data['imagen'];
}
else
{
    header("location: productos_admin.php");
}
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    $distribucion = $_POST['distribucion'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $fecha = date("Y-m-d ", $time);
    $archivo = $_FILES['imagen'];

    try{
        if($nombre !="")
        {
            if($precio > 0)
            {
                if($tipo != "")
                {
                    if($distribucion != "")
                    {
                        if($descripcion != "")
                        {
                            if($cantidad > 0)
                            {
                                if($archivo['name'] != null)
                                { 
                                    $base64 = Validator::validateImage($archivo);
                                    if($base64 != false)
                                    {
                                        $imagen = $base64;
                                    }
                                    else
                                    {
                                        throw new Exception("Ocurrió un problema con la imagen");
                                    }
                                }
                                else
                                {
                                    if($imagen == null)
                                    {
                                        throw new Exception("Debe seleccionar una imagen");
                                    }
                                }
                                if($id == null)
                                {
                                    $sql = "INSERT INTO productos(nombre_producto, precio_producto, id_tipo_producto, id_distribucion, descripcion, imagen, cantidad, fecha) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                                    $params = array($nombre, $precio, $tipo, $distribucion, $descripcion, $imagen, $cantidad, $fecha);
                                }
                                else
                                {
                                    $sql = "UPDATE productos SET nombre_producto = ?, precio_producto = ?, id_tipo_producto = ?, id_distribucion = ?, descripcion = ?, imagen = ?, cantidad=?, fecha = ? WHERE id_producto = ?";
                                    $params = array($nombre, $precio, $tipo, $distribucion, $descripcion, $imagen, $cantidad, $fecha, $id);
                                }
                                if(Database::executeRow($sql, $params))
                                {
                                                master::showMessage(1, "Operación satisfactoria", "productos_admin.php");
                                }                             
                                else
                                {
                                    throw new Exception(Database::$error[1]);
                                }
                            }
                            else {
                                    throw new Exception("Debe ingresar una cantidad adecuada");
                            }
                        }
                        else
                        {
                            throw new Exception("Debe ingresar una descripcion adecuada");
                        }

                    }
                    else
                    {
                        throw new Exception("Debe seleccionar una distribucion");
                    }

                }
                else
                {
                     throw new Exception("Debe seleccionar un tipo de producto ");
                }

            }
            else
            {
                throw new Exception("Precio Invalido");
            }
        }
        else
        {
            throw new Exception("Debe ingresar un nombre");
        }
    }
    catch(Exception $error){
        master::showMessage(2, $error->getMessage(), null);
    }
}
else
{}
?>
    <!--Uso de un contenedor para colocar los datos y de una clase para el cambio de colores-->
    <section class="container">
    <form form method='post' enctype='multipart/form-data'>
        <div class='row'>
            <div class="input-field col s12">
                <input id="nombre" type="text" name="nombre" class="validate" value='<?php print($nombre); ?>' required/>
                <label for="nombre" class="cyan-text text-darken-3">Nombre del Producto</label><!--El cuadro de texto donde se pondra el nombre-->
            </div>
            <div class="input-field col s12">
                <input id="precio" type="number" name='precio' class="validate" max='999.99' min='0.01' step='any' value='<?php print($precio); ?>' required/>
                <label for="precio" class="cyan-text text-darken-3">Precio del Producto</label><!--El cuadro de texto donde se pondra el precio-->
            </div>
            <div class='input-field col s12 m6'>
                <?php
                $sql = "SELECT id_tipo_producto, tipo_producto FROM tipo_producto";
                master::setCombo("Tipo", "tipo", $tipo, $sql);
                ?>
            </div>
             <div class='input-field col s12 m6'>
                <?php
                $sql = "SELECT id_distribucion, distribucion FROM distribucion";
                master::setCombo("Distribucion", "distribucion", $distribucion, $sql);
                ?>
            </div>
            <div class="input-field col s12">
                <input id="descripcion" type="text" name="descripcion" class="validate" value='<?php print($descripcion); ?>' required/>
                <label for="descripcion" class="cyan-text text-darken-3">Descripción</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
            </div>
            <div class="input-field col s12 m6">
                <input id="cantidad" type="number" name='cantidad' class="validate" min='1' value='<?php print($cantidad); ?>' required/>
                <label for="cantidad" class="cyan-text text-darken-3">Cantidad del Producto</label><!--El cuadro de texto donde se pondra el precio-->
            </div>
      	<div class='file-field input-field col s12 m6'>
            <div class='btn waves-effect'>
                <span><i class='material-icons'>image</i></span>
                <input type='file' name='imagen' <?php print(($imagen == null)?"required":""); ?>/>
            </div>
            <div class='file-path-wrapper'>
                <input class='file-path validate' type='text' placeholder='Seleccione una imagen'/>
            </div>
        </div>
        </div>
            <div class='row center-align'>
                <a href='productos_admin.php' class='btn waves-effect red'>Cancelar<i class='material-icons left'>highlight_off</i></a>
                <button type='submit' class='btn waves-effect blue'>Guardar<i class='material-icons left'>add_circle_outline</i></button>
            </div>
    </form>
      </section>
<?php
master::footer("ProductosAdmin")
?>