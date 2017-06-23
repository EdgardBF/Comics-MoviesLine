<?php
//mandamos a llamar a nuestro archivo maestro
require("../../lib/master.php");

//hacemos una condicional diciendo que si el get esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(empty($_GET['id'])) 
{
    //colocamos el metodo de header
    master::header("Agregar tipo");
    ?>
    <h3 class="center-align">Tipos de Usuarios</h3>
    <?php
    $id = null;
    $nombre = null;
    $seleccionar = 0;
    $crear = 0;
    $leer=0;
    $actu = 0;
    $eliminar = 0;
}
else
{
    //colocamos el metodo de header
    master::header("Modificar tipo");
    ?>
    <h3 class="center-align">Tipos de Usuarios</h3>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['tipo'];
    $seleccionar = $data['seleccionar'];
    $crear = $data['crear'];
    $leer=$data['leer'];
    $actu =$data['actualizar'];
    $eliminar =$data['eliminar'];
}
//hacemos una condicional diciendo que si el post esta vacio muestre los registros normales sino que los muestre solo los que se han pedido en el parametro
if(!empty($_POST))
{
  	$nombre = $_POST['nombre'];
    $nombre = trim($nombre);
  	$numero=$_POST["numero"];
    $seleccionar = 0;
    $crear = 0;
    $leer=0;
    $actu = 0;
    $eliminar = 0;
    $count = count($numero);
    for ($i = 0; $i < $count; $i++) {
        if($numero[$i]==1){
            $seleccionar=1;

        }
        else if($numero[$i]==2)
        {
            $crear = 1; 

        }
         else if($numero[$i]==3)
        {
            $leer = 1;

        }
         else if($numero[$i]==4)
        {
            $actu = 1;

        }
         else if($numero[$i]==5)
        {
            $eliminar = 1;

        }
    }
    try 
    {
      	if($nombre != "")
        {
            if($id == null)
            {
                $sql = "INSERT INTO tipo_usuario(tipo, seleccionar, crear, leer, actualizar, eliminar) VALUES(?, ?, ?, ?, ?, ?)";
                $params = array($nombre, $seleccionar, $crear, $leer, $actu, $eliminar);
            }
            else
            {
                $sql = "UPDATE tipo_usuario SET tipo = ?, seleccionar = ?, crear = ?, leer = ?, actualizar = ?, eliminar = ? WHERE id_tipo_usuario = ?";
                $params = array($nombre, $seleccionar, $crear, $leer, $actu, $eliminar, $id);
            }
                if(Database::executeRow($sql, $params))
	            {
            master::showMessage(1, "Operación satisfactoria", "index_types.php");
                }                             
                else
                {
                    throw new Exception(Database::$error[1]);
                }
        }
        else
        {
            throw new Exception("Debe digitar un nombre");
        }
    }
    catch (Exception $error)
    {
        master::showMessage(2, $error->getMessage(), null);
    }
}
?>
<!--formulario en donde se llaman los datos-->
<section class="container">
    <form class="col s12" form method='post' enctype='multipart/form-data'>
    <div class='row'>
        <div class='input-field col s12'>
            <input id='nombre' type='text' name='nombre' class='validate' value='<?php print($nombre); ?>' required/>
            <label for='nombre' class='cyan-text text-darken-3'>Nombre</label>
        </div>
        <div class='input-field col s12 m8 offset-m3'>
            <span>Permisos:</span>
            <input type="checkbox" id="test" value="1" <?php print(($seleccionar)?"checked":""); ?> name="numero[]"/>
            <label for="test">Seleccionar</label>
            <input type="checkbox" id="test1" value="2" <?php print(($crear)?"checked":""); ?> name="numero[]"/>
            <label for="test1">Crear</label>
            <input type="checkbox" id="test2" value="3" <?php print(($leer)?"checked":""); ?> name="numero[]"/>
            <label for="test2">Leer</label>
            <input type="checkbox" id="test3" value="4" <?php print(($actu)?"checked":""); ?> name="numero[]"/>
            <label for="test3">actualizar</label>
            <input type="checkbox" id="test4" value="5" <?php print(($eliminar)?"checked":""); ?> name="numero[]" />
            <label for="test4">Eliminar</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='index_types.php' class='btn waves-effect red'>Cancelar<i class='material-icons left'>highlight_off</i></a>
        <button type='submit' class='btn waves-effect blue'>Guardar<i class='material-icons left'>add_circle_outline</i></button>
    </div>
        </form>
    </section>

<?php
master::footer("Tipo");
?>