<?php
require("../lib/master_c.php");
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
<h3 class="center-align">Comentarios</h3>
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
                            <input id="calificacion" type="number" min='0' max='10' class="validate" name='calificacion' max='10' min='0' value='<?php print($calificacion); ?>' required/>
                            <label for="calificacion" class="cyan-text text-darken-3">Clasificación</label><!--El cuadro de texto donde se colocara el comentario-->
                        </div>
                        <div class="center-align  boton">
                            <button type='submit' class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">cloud_upload</i>Enviar</button> <!--Boton con el cual se enviara el commentraio-->
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
                $sql2 = "SELECT AVG(calificacion) FROM comentarios WHERE id_producto = ?";
                $params2 = array($row1['id_producto']);
                $data2 = Database::getRow($sql2, $params2);
                print("
                    <div class='col s12 m4 l4'>
                        <div class='card'>
                            <div class='card-image waves-effect waves-block waves-light'>
                                <img class='materialboxed' src='data:image/*;base64,$row1[imagen]' width='300' height='150'>
                            </div>
                            <div class='card-content row'>
                                <span class='card-title activator grey-text text-darken-4'>$row1[nombre_producto] $ $row1[precio_producto]<i class='material-icons right'>keyboard_arrow_down</i></span>
                                <p>Clasificacion Promedio de: ".round($data2['AVG(calificacion)'], 2)."</p>
                            </div>
                            <div class='card-reveal'>
                                <span class='card-title grey-text text-darken-4'>$row1[nombre_producto] $$row1[precio_producto]<i class='material-icons right'>close</i></span>
                                <p>$row1[descripcion]</p>
                            </div>
                        </div>

                ");
            }
            $sql = "SELECT productos.nombre_producto as nombre, COUNT(comentarios.id_comentario) as cantida FROM comentarios RIGHT JOIN productos ON comentarios.id_producto = productos.id_producto AND comentarios.id_tipo_comentario = 1 GROUP BY productos.nombre_producto";
    $params = null;
    $datoss = Database::getRows($sql, $params);
    //instrucciones para crear un grafico utilizando el googlechart
    print("
    <div id='container1' style='min-width: 200px; height: 400px; max-width: 200px; margin: 0 auto'></div>
    <script src='../js/jquery-3.1.1.min.js'></script>
    <script src='../lib/highcharts/code/highcharts.js'></script>
    <script src='../lib/highcharts/code/modules/exporting.js'></script>
    <script type='text/javascript'>
$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Productos mas comentados'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.1f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Cantidad',
            colorByPoint: true,
            data: [
                ");
                            
                foreach($datoss as $row2)
				{
            print ("{ name: '".$row2['nombre']."', y:".$row2['cantida']."},");
			    }
                print("
        ]
        }]
    });
});
</script>");
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