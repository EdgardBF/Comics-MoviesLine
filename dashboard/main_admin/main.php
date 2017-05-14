<?php
require("../..//lib/master.php");
master::header("main");
?>
    <!--Se manda a llamar un archivo maestro del Slider-->
    <section>
      <?php
        include ('../../archivosmaestros/slider.php')
      ?>
    </section>
    <section>
<?php
master::footer("main");
?>