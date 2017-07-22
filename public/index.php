<?php
require("../lib/master.php");
master::header("Inicio");
if(isset($_SESSION['id_registro']))
{
      if(	$_SESSION['estado'] == 3)
    {
      master::showMessage(3, "ingresar otra contraseña en vez de la enviada al correo", "cambio_contra.php");
    }
  $sql = "SELECT fecha_cambio_contra FROM registro  WHERE id_registro =?";
      $params = array($_SESSION['id_registro']);
      $data = Database::getRow($sql, $params);
      if($data != null){
      $time = time();
      $fehca = $data['fecha_cambio_contra'];
      $fes = date("Y-m-d ", $time);
      $datetime1 = date_create($fehca);
      $datetime2 = date_create($fes);
      $interval = $datetime1->diff($datetime2);
      $dias = $interval->format('%a');
      if($dias >= 1)
      {
        master::showMessage(3, "Por cuestiones de seguridad debe ingresar otra contraseña", "../dashboard/main_public/cambio_contra.php");
      }
      else
      {
      }
      }
      else
      {
        
      }

}
else
{

}
?>
    <!--Se manda a llamar un archivo maestro del Slider-->
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
              <span class="card-title center tipografia">Quienes Somos</span>
               <p class="texto-mayor center-align">Comics & Movies Line es una Tienda destinada para la compra online sobre diferentes tipos de peliculas, <br>
                con su respectivo comic en el que este basada, permitiendo al usuario un mayor conocimiento sobre esta, y de donde fue basada para su produccion.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia ">Visión</span>
              <p>La visión de Comics & Movies Line, es ser a finales de la década, una de las mayores tiendas en líneas, en dar un fácil acceso, buen tema de productos y confidencialidad con nuestros clientes.<br><br>En nuestra visión, también tenemos la de adecuar el estilo de lectura a la persona del presente, ya que pierde el sentido de lectura, y el habito del mismo.</p>
            </div>
          </div>
        </div>
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia">Misión</span>
              <p>La misión de Comics & Movies Line, es la de lograr que las personas al ver una película, se sepa de donde viene, por qué se creó y vea que, al leer un comic, encuentre un vasto universo que la imaginación ha creado para que el lector se puede entretener, ya que últimamente el hábito de lectura se pierde poco a poco.<br><br>Estamos seguros que, como tienda, C&M Line, logrará dar a los clientes un servicio de fácil acceso que se ajuste a sus necesidades, además de que nuestros productos tienen una duración garantizada.</p>
            </div>
          </div>
        </div>
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia">Valores</span>
              <p>En Comics & Movies Line valoramos a las personas y a los empleados, tenemos prioridad en el cuidado de los derechos de los empleados, sus familias, buscamos los mejores beneficios de los clientes, sin extraviar, descuidar o malgastar el producto, entregando personalmente el mismo en sus propias manos. </p>
            </div>
          </div>
        </div>
        <!--Se dice que tamaño del grid se usara-->
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 z-depth-4">
            <div class="card-content black-text center-align">
              <span class="card-title center tipografia">Equipo De Trabajo</span>
              <p>El equipo de Trabajo consta de dos estudiantes del 3er Año de Sistemas Informaticos 2, B; del Instituto Tecnico Ricaldone, los cuales son:<br>
                Edgard Alexander Barrera Flamenco<br>
                Miguel Ángel Flores Reyes
              </p>
            </div>
          </div>
        </div>
      </div>
      </section>
<?php
master::footer("Inicio");
?>