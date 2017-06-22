<?php
require("../lib/master.php");
master::header("Soporte_Linea");
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
}
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $comentario = $_POST['comentario'];

    try{
        //Valida que los datos no esten vacios
        if(!empty($_SESSION['usuario'])){
            if($comentario != null)
            {
                $fes = date("Y-m-d ", $time);
                //Guarda los registros en la Base de Datos
                $sql = "INSERT INTO comentarios(id_registro, comentario, id_tipo_comentario, fecha) VALUES(?, ?, ?, ?)";
                $params = array($_SESSION['id_registro'], $comentario, 3, $fes);
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
}
?>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
      <?php
        include ('../archivosmaestros/slider.php')
      ?>
    </section>
    <!--se crea una seccion de acordeon-->
    <div class="section white"><!--Uso de una seccion blanca de materialize-->
    <div class="row container"><!--Uso del contenedor de materialize-->
       <ul class="collapsible " data-collapsible="accordion"><!--Este es la parte de acordeon donde se mostrara de primero el titulo y luego al darle click la demas informacion-->
        <li>
            <!--Titulo del primero -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">question_answer</i><a class="white-text text-darken-2 texto">Preguntas Frecuentes</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <!--contenido del primero -->
                <h4>Preguntas Frecuentes</h4>
                <br>
                <h5>¿Metodo de compra?</h5>
                <p class="justificar">
                    la empresa ofrece una metodo de compra en linea y a domicilio con el cual usted puede comprar de manera remota o puede venir a nuestra tienda
                    en el apartado de compras en linea la empresa ofrece dos metodos de compra la compra por medio de la tarjeta de credito y la compra por medio
                    de una cuenta de paypal las cuales se veran mas a detalle en el apartado de compras de la pagina web, la unica tarjeta que la tienda acepta
                    es master no de otro tipo debido a la seguridad que mastercard posee.
                </p>
                <h5>¿Su locaclizacion?</h5>
                <p class="justificar">
                    nosotros nos encontramos en centroameria, el salvador, san salvador, encuentre mas informacion en el pie de pagina.

                </p>
            </span></div>
        </li>
        <li>
            <!--Titulo del segundo -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">headset_mic</i><a class="white-text text-darken-2 texto">Asistencia técnica</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <!--contenido del segundo -->
                <h4>Asistencia técnica</h4>
                <br>
                <h5>¿Donde contactar?</h5>
                <p class="justificar">
                    Puede contactarnos a travez del numero el cual esta en nuestro pie de pagina o si decea llamar a nuestro atencion a cliente el numero es 7777-7777.
                </p>
                <h5>¿Que hago con la garantia?</h5>
                <p class="justificar">
                    Si su paquete salio defectuoso entonces contactenos al travez del servicio al cliente ellos les diran que hacer.

                </p>
            </span></div>
        </li>
        <li>
            <!--Titulo del tercero -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">help</i><a class="white-text text-darken-2 texto">Centro de ayuda</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <!--contenido del tercero -->
                <h4>Centro de ayuda</h4>
                <br>
                <h5>¿Tienes problemas?</h5>
                <p class="justificar">
                    Puedes contactar con nosotros a travez de los numeros de abajo o tambien puede escribirnos por las redes sosciales o a nuestra atencion al cliente.
                </p>
                <h5>¿posee quejas de nuestros envios?</h5>
                <p class="justificar">
                   Puede decirnos su experiencia con nosotros a travez de nuestras redes sociales o llamando a atencion al cliente.
                </p>    
            </span></div>
        </li>
        <li>
            <!--Titulo del tercero -->
            <div class="collapsible-header #00838f cyan darken-3"><i class="material-icons white-text text-darken-2">comment</i><a class="white-text text-darken-2 texto">Comentarios</a></div>
            <div class="collapsible-body #006064 cyan darken-4 white-text text-darken-2"><span>
                <?php
            
            	$sql = "SELECT comentarios.id_registro, registro.usuario, comentario, fecha, id_tipo_comentario FROM comentarios, registro  WHERE registro.id_registro = comentarios.id_registro AND id_tipo_comentario = 2 ORDER BY fecha desc";
	            $params = null;
                //ejecutamos el metodo get rows para ver si tenemos respuesta
                $data = Database::getRows($sql, $params);
                if($data != null)
                {
                    foreach($data as $row)
                    {
                        print("
                            <h5>$row[usuario]</h5>
        
                                $row[comentario]

                                <hr>                        
                            ");

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
    <!--contenedor de comentario-->
    <section class="container contenedor">
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
                <div class="center-align  boton">
                    <button type='submit' class="waves-effect waves-light btn  #00838f cyan darken-3"><i class="material-icons right">cloud_upload</i>Enviar</button> <!--Boton con el cual se enviara el commentraio-->
                </div>
                <div class="center-align boton2">
                    <a class="waves-effect waves-light btn  #00838f cyan darken-3" href="../dashboard/main_public/login.php"><i class="material-icons right">face</i> Registrate!</a><!--boton para rederigirse a registro-->
                </div>
            </form>
        </div>
    </section>
        
    <!--Uso de archivo maestro para el footer-->
<?php
master::footer("Soporte_Linea");
?>