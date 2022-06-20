<?php
include "Cliente.php";
if(!isset($_GET['idCliente'])){
    die("Cliente não encontrado");
}

$id = $_GET['idCliente'];

$id = strip_tags($id);

$cliente = new Cliente();
$cliente->setIdCliente($id);
$cliente->excluir();

echo "Excluido com sucesso";
?>