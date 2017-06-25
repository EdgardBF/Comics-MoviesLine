<?php
//Sale de la sesion Actual
session_start();
session_destroy();
header("location: ../../public/");
?>