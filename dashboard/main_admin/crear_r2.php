<?php
//mandamos a llamar a nuestro archivo maestro
require("../../lib/master.php");
//colocamos el metodo de header
master::header("Administradores");
require_once '../../lib/Zebra_Pagination.php';
?>
<h3 class="center-align">Reporte</h3>
<?php
    if(isset($fin1) && isset($inicio1))
    {     
    }
    else
    {
    $fech = date('Y-m-d');
    $my_date = new DateTime(); 
    $datetime1 = date_create($fech);
    $my_date->modify('first day of '.$datetime1->format('F').''.$datetime1->format('Y').'');
    $inicio1 =  $my_date->format('Y-m-d');
    $my_date->modify('last day of '.$datetime1->format('F').''.$datetime1->format('Y').'');
    $fin1 =  $my_date->format('Y-m-d');
    }
    if(!empty($_POST))
{
    $fech = $_POST['fecha'];
    $my_date = new DateTime(); 
    $datetime1 = date_create($fech);

    $my_date->modify('first day of '.$datetime1->format('F').''.$datetime1->format('Y').'');
    $inicio =  $my_date->format('Ymd');
    $inicio1 =  $my_date->format('Y-m-d');
    $my_date->modify('last day of '.$datetime1->format('F').''.$datetime1->format('Y').'');
    $fin =  $my_date->format('Ymd');
    $fin1 =  $my_date->format('Y-m-d');
}
else
{
    $data = null;
}
    ?>
    <center>
	<form method='post'>
	<div class='row'>
    <label class = 'tamaño'>Ingrese fecha</label>
        <div class="input-field col s12 m12">
          <input type="month" name='fecha'>
        </div>
		<div class='input-field col s6 m12'>
			<button type='submit' class='btn waves-effect #00838f cyan darken-3 waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ingresar Fecha'><i class='material-icons'>check_circle</i></button> 	
		</div>
        <div class='input-field col s6 m12'>
        <?php 
        if(isset($inicio) && isset($fin) ){
        print("
        Las fechas que se usaran para generar el reporte es de: ".$inicio1." a ".$fin1."<br>
        <a href='../../lib/reporte4.php?ini=".$inicio."' class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='ver reporte'><i class='material-icons cyan-text text-darken-3'>description</i></a>");
        }
        else
        {
             print("
             Las fechas que se usaran para generar el reporte es de: ".$inicio1." a ".$fin1."<br>
             <a href='../../lib/reporte4.php?ini=' class='waves-effect waves-light tooltipped' data-position='bottom' data-delay='50' data-tooltip='ver reporte de doctores de las refrencias'><i class='material-icons cyan-text text-darken-3'>description</i></a>");
        }
        ?>
        </div>
	</div>
</form>
</center>
<?php
master::footer("Usuarios");
?>