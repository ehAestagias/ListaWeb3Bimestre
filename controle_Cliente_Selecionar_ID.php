<?php
include "Cliente.php";
if(!isset($_GET['idCliente'])){
   print ("idCliente não encontrado");
   exit;
}
$idCliente = $_GET['idCliente'];
$idCliente = strip_tags($idCliente);

$cliente = new Cliente();
$cliente->buscarClientePorId($idCliente);

$tabela="<table border='1'>";
$tabela.="<tr>";
$tabela.="<td>".$cliente->getNome()."</td>";
$tabela.="<td>".$cliente->getEmail()."</td>";
$tabela.="<td>".$cliente->getSenha()."</td>";
$tabela.="<td>".$cliente->getNascimento()."</td>";
$tabela.="<td>".$cliente->getSalario()."</td>";
$tabela.="</tr>";
$tabela.="</table>";
echo $tabela;
?>