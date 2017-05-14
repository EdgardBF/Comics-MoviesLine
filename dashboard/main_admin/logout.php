<?php
//utilizacion para deslogearse
session_start();
session_destroy();
header("location: ../../dashboard/");
?>