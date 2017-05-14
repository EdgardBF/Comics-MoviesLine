<?php
require("../../lib/master.php");
master::header("Distribuciones");
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
    $id = $_GET['id'];
    $sql = "SELECT distribucion FROM distribucion WHERE id_distribucion = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $distribucion = $data['distribucion'];
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
            Database::executeRow($sql, $params);
            master::showMessage(1, "Operación satisfactoria", "distribuidor.php");
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

    <form form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>person</i>
          	<input id='distribucion' type='text' name='distribucion' class='validate' value='<?php print($distribucion); ?>' required/>
          	<label for='distribucion'>Distribuidor</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='distribuidor.php' class='btn waves-effect red'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
    </form>
<?php
master::footer("Distribuciones")
?>