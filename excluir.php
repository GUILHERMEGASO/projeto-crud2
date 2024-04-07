<?php
require 'classes/clientes.class.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $clientes = new clientes();
    $clientes->delCliente($_GET['id']);
    header("Location: index.php");
}