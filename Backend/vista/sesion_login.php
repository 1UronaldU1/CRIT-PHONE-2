<?php
session_start();
if (empty($_SESSION['user'])) {
    $estado = false;
    $usuario = "";
    $idCliente      = "";
} else {

    $usuario = $_SESSION['nombre'];
    $idCliente = $_SESSION['user'];
    $estado  = true;
}
