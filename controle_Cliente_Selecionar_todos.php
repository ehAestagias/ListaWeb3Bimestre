<?php
include "Cliente.php";
$cliente = new Cliente();
$vetorClientes = $cliente->listarClientes();
$qtdClientes = count($vetorClientes);
$i=0;
$tabela="<table border='1'>";
while($i<$qtdClientes){
   $id= $vetorClientes[$i]->getIdCliente();
   $tabela.="<tr>";
   $tabela.="<td>".$vetorClientes[$i]->getNome()."</td>";
   $tabela.="<td>".$vetorClientes[$i]->getEmail()."</td>";
   $tabela.="<td>".$vetorClientes[$i]->getSenha()."</td>";
   $tabela.="<td>".$vetorClientes[$i]->getNascimento()."</td>";
   $tabela.="<td>".$vetorClientes[$i]->getSalario()."</td>";
   $tabela.="<td><a href='formularioClienteAlterar.php?idCliente=$id'>alterar</a></td>";
   $tabela.="<td><a href='excluir.php?idCliente=$id'>excluir</a></td>";
      
   $tabela.="</tr>";
   $i++;
}
$tabela.="</table>";
echo $tabela;
?>