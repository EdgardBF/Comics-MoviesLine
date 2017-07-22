<?php
require("../../lib/master.php");
master::header("Distribuciones");
if($_SESSION['crear'] == 0)
{
    master::showMessage(2, "No tiene permisos para entrar", "main.php");
}
?>
<h3 class="center-align">Distribuidor</h3>
<?php
//Obtiene la Hora del Sistema
$time = time();
//Verifica que hayan datos a guardar, con el metodo Get,en el Id de la pagina
if(empty($_GET['id'])) 
{
    $id = null;
    $distribucion = null;
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
    $sql = "SELECT distribucion FROM distribucion WHERE id_distribucion = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $distribucion = $data['distribucion'];
}
else
{
    header("location: distribuidor.php");
}
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $distribucion = $_POST['distribucion'];

    try{
        if($distribucion !="")
        {
            //Guarda los registros en la Base de Datos
            if($id == null)
            {
                $sql = "INSERT INTO distribucion(distribucion) VALUES(?)";
                $params = array($distribucion);
            }
            else
            {
                $sql = "UPDATE distribucion SET distribucion = ? WHERE id_distribucion = ?";
                $params = array($distribucion, $id);
            }
                if(Database::executeRow($sql, $params))
	            {
            master::showMessage(1, "Operación satisfactoria", "distribuidor.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
      }
        else
        {
            throw new Exception("Debe ingresar una distribucion adecuada");
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
                    <input id="distribucion" type="text" name="distribucion" class="validate" value='<?php print($distribucion); ?>' required/>
                    <label for="distribucion" class="cyan-text text-darken-3">Distribuidor</label><!--El cuadro de texto donde se pondra el titulo-->
                </div>
            </div>
            <div class='row center-align'>
                <a href='distribuidor.php' class='btn waves-effect red'>Cancelar<i class='material-icons left'>highlight_off</i></a>
                <button type='submit' class='btn waves-effect blue'>Guardar<i class='material-icons left'>add_circle_outline</i></button>
            </div>
        </form>
    </section>
<?php
master::footer("Distribuciones")
?>