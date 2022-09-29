<?php
session_start(); //es necesario reanudar la sesion, para indicar posteriormente que sesion sera destruida
session_destroy(); //destruye la sesion.
header("Location: ../views/login.php"); //redirigir al login
?>
