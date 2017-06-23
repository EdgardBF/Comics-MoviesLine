<?php
require("../../lib/master.php");
master::header("Noticias");
?>
<h3 class="center-align">Noticias</h3>
<?php
//Obtiene la Hora del Sistema
$time = time();
//Verifica que hayan datos a guardar, con el metodo Get,en el Id de la pagina
if(empty($_GET['id'])) 
{
    $id = null;
    $imagen = null;
    $titulo = null;
    $descripcion = null;
    $estado = 0;
    $fecha = date("Y-m-d ", $time);
    
}
else
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM noticia WHERE id_noticia = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $imagen = $data['imagen'];
    $titulo = $data['titulo_imagen'];  
    $descripcion = $data['descripcion_imagen'];
    $estado = $data['estado'];
    $fecha = $data['fecha']; 
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $archivo = $_FILES['imagen'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $fecha = date("Y-m-d ", $time);

    try{
        //valida que los datos no esten vacios
        if($titulo !="")
        {
            if($descripcion != "")
            {
                if($estado != "")
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
                //Guarda datos en la Base de Datos
                    if($id == null)
                {
                    $sql = "INSERT INTO noticia(imagen, titulo_imagen, descripcion_imagen, id_admin, fecha) VALUES(?, ?, ?, ?, ?)";
                    $params = array($imagen, $titulo, $descripcion,$_SESSION['id_admin'], $fecha);
                }
                else
                {
                    $sql = "UPDATE noticia SET imagen = ?, titulo_imagen = ?, descripcion_imagen = ?, fecha = ?, id_admin = ? WHERE id_noticia = ?";
                    $params = array($imagen, $titulo, $descripcion, $fecha, $_SESSION['id_admin'], $id);
                }
                    if(Database::executeRow($sql, $params))
                    {
                        master::showMessage(1, "Operación satisfactoria", "noticias.php");
                    }
                                                
                    else
                    {
                        throw new Exception(Database::$error[1]);
                    }
                }
                    else
                    {
                        throw new Exception("Debe ingresar un estado");
                    }
            }
            else
            {
                throw new Exception("Debe ingresar una descripcion adecuada");
            }
        }
        else
        {
            throw new Exception("Debe ingresar un titulo");
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
        <form class="col s12" form method='post' enctype='multipart/form-data'>
            <div class='row'>
            <div class="input-field col s12">
                <input id="titulo" type="text" name="titulo" class="validate" value='<?php print($titulo); ?>' required/>
                <label for="titulo" class="cyan-text text-darken-3">Titulo de la Noticia</label><!--El cuadro de texto donde se pondra el nombre-->
            </div>
            <div class="input-field col s12">
                <input id="descripcion" type="text" name="descripcion" class="validate" value='<?php print($descripcion); ?>' required/>
                <label for="descripcion" class="cyan-text text-darken-3">Descripción</label><!--El cuadro de texto donde se pondra el nombre de usuario-->
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
            <div class='input-field col s12 m6'>
                    <span>Estado</span>
                    <input id='activo' type='radio' name='estado' class='with-gap' value='0' <?php print(($estado == 0)?"checked":""); ?>/>
                    <label for='activo'>Activado</label>
                    <input id='inactivo' type='radio' name='estado' class='with-gap' value='1' <?php print(($estado == 1)?"checked":""); ?>/>
                    <label for='inactivo'>Desactivado</label>
                </div>
        </div>
            <div class='row center-align'>
                <a href='noticias.php' class='btn waves-effect red'>Cancelar<i class='material-icons left'>highlight_off</i></a>
                <button type='submit' class='btn waves-effect blue'>Guardar<i class='material-icons left'>add_circle_outline</i></button>
            </div>
    </form>

  </section>
<?php
master::footer("Noticias")
?>