    <?php
        try{
            //Selecciona los registros a mostrar
            $sql = "SELECT id_noticia, imagen, titulo_imagen, descripcion_imagen, estado FROM noticia ORDER BY fecha";

            $data = Database::getRows($sql, null);
?>
    <div class="row">
        <div class="col s12 m12 l12" >
          <!--Creamos el Slider-->
          <div class="slider ">
              <ul class="slides"> 
              <li>
              <?php
                $archivo_actual = basename($_SERVER['PHP_SELF']);
                if($archivo_actual != "index_admin.php")
                {
                    print("<img src='../img/slider1.png'> <!--Imagen-->");

                  } else {
                    print("<img src='../../img/slider1.png'> <!--Imagen-->");
                  }
                ?>
                  <!--Decide en que posicion salir el texto-->
                  <div class='caption center-align'>
                      <h3>Comics & Movies Line</h3>
                      <h5 class='light grey-text text-lighten-3'>"Venta de Productos Increibles"</h5>
                  </div>
              </li>
              <?php

            if($data != null)
            {
    ?>
    <!--Creamos el Slider-->

      <?php
      //Mostramos los datos dentro del Slider
        foreach ($data as $row) 
        {
            if($row['estado'] == '0') {
            print("
                <li>
                    <a href='#!' class='texto'>
                        <img src='data:image/*;base64,$row[imagen]'> <!--Imagen-->
                        <!--Decide en que posicion salir el texto-->
                        <div class='caption right-align'>
                            <h3 class='tipografia'>$row[titulo_imagen]</h3>
                            <h5 class='light grey-text text-lighten-3'>$row[descripcion_imagen]</h5>
                        </div>
                    </a>
                </li>");
            }
        }
        ?>
                </ul>
                    </div>
                        </div>
                            </div>
        <?php
            }
            else
            {}
        }
        catch(Exception $error)
        {
                master::showMessage(2, $error->getMessage(), null);
        }
    ?>
            </ul>
        </div>
    </div>
</div>