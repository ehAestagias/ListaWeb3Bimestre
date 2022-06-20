<?php
include "Cliente.php";
if(!isset($_POST['txtNome'])){
    die("nome não encontrado");
}
$nome         = $_POST['txtNome'];
$email        = $_POST['txtEmail'];
$senha        = $_POST['txtSenha'];
$salario      = $_POST['txtSalario'];
$nascimento   = $_POST['txtNascimento'];
$nome = strip_tags($nome);

$cliente = new Cliente();
$cliente->setNome($nome);
$cliente->setEmail($email);
$cliente->setSenha($senha);
$cliente->setSalario($salario);
$cliente->setNascimento($nascimento);
$resultado = $cliente->cadastrar();
if($resultado==true){
    echo "Cadastrado com sucesso";
}else{
    echo "Erro ao cadastrar";
}

?>
