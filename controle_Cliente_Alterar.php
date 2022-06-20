<?php
include "Cliente.php";
if(!isset($_POST['txtNome'])){
    die("nome não encontrado");
}
$idCliente    = $_POST['txtIdCliente'];
$nome         = $_POST['txtNome'];
$email        = $_POST['txtEmail'];
$senha        = $_POST['txtSenha'];
$salario      = $_POST['txtSalario'];
$nascimento   = $_POST['txtNascimento'];
$nome = strip_tags($nome);

$cliete1 = new Cliente();
$cliete1->setIdCliente($idCliente);
$cliete1->setNome($nome);
$cliete1->setEmail($email);
$cliete1->setSenha($senha);
$cliete1->setSalario($salario);
$cliete1->setNascimento($nascimento);
$cliete1->atualizar();

header("location: formularioClienteAlterar.php?idCliente=".$idCliente);

?>
