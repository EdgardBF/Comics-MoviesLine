    <?php
        try{
            $sql = "SELECT id_noticia, imagen, titulo_imagen, descripcion_imagen FROM noticia ORDER BY fecha";

            $data = Database::getRows($sql, null);

            if($data != null)
            {
    ?>
    <div class="row">
        <div class="col s12 m12 l12" >
            <div class="slider ">
                <ul class="slides z-depth-4">
      <?php
        foreach ($data as $row) 
        {
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
        ?>
                </ul>
                    </div>
                        </div>
                            </div>
        <?php
            }
            else
            {
            print("<div class='card-panel cyan darken-3'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
            }
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