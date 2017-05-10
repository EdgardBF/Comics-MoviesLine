<?php
 session_start();
 if(isset($_SESSION['usuario'])){
     
    header("location:main_admin/main.php");
 }
 else{
    header("Location:main_admin/login.php");
 }
 
  
?> 
