<?php
//si hay una sesion iniciada nos envia al main de la pagina sino, al login
session_start();
 if(isset($_SESSION['usuario'])){
     
    header("location:main.php");
 }
 else{
    header("location:login.php");
 }
?>