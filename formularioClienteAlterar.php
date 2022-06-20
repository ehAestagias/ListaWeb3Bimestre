<?php
 include "Cliente.php";
 $idCliente = $_GET['idCliente'];
 $cliente = new Cliente();
 $cliente = $cliente->buscarClientePorId($idCliente);
 
 $idCliente  = $cliente->getIdCliente();
 $nome       = $cliente->getNome();
 $email      = $cliente->getEmail();
 $senha      = $cliente->getSenha();
 $nascimento = $cliente->getNascimento();
 $salario    = $cliente->getSalario();


?>
<html>
    <head></head>
    <body>
        <form action="controle_Cliente_Alterar.php" method="post">
            <input type="hidden" name="txtIdCliente" value="<?php echo  $idCliente;?>"><br>
            <input type="text" name ="txtNome" value="<?php echo $nome;?>"><br>
            <input type="text" name ="txtEmail" value="<?php echo $email;?>"><br>
            <input type="password" name ="txtSenha" value="<?php echo $senha;?>"><br>
            <input type="date" name ="txtNascimento" value="<?php echo $nascimento;?>"><br>
            <input type="text" name ="txtSalario" value="<?php echo $salario;?>"><br>
            <input type="submit" value="Salvar Alterações">
        </form>
    </body>
</html>