<?php
session_start();
/* Quitaos la sesion para que no se quede guadrada*/
session_destroy();
header("Location: ../index.php");
exit;
?>