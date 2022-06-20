<?php
include "Banco.php";
class Cliente{
    private $idCliente; 
    private $nome;
    private $email;
    private $senha; 
    private $nascimento; 
    private $salario;
    private $banco;
    function __construct() {
        $this->banco = new Banco();
    }
    public function atualizar(){
        $stmt =$this->banco->getConexao()->prepare("update cliente 
                                    set nome=?, 
                                    email=?,
                                    senha=?,
                                    salario=?,
                                    nascimento=?
                                    where idCliente = ?");
        $stmt->bind_param("ssssss", $this->nome,$this->email,$this->senha,$this->salario,$this->nascimento,$this->idCliente);
        $stmt->execute();
    }
    public function excluir(){
        $stmt = $this->banco->getConexao()->prepare("delete from Cliente where idCliente = ?");
        $stmt->bind_param("i", $this->idCliente);
        return $stmt->execute();
    }
    public function cadastrar(){
        $stmt = $this->banco->getConexao()->prepare("insert into Cliente (nome, email,senha,nascimento,salario )values(?,?,?,?,?)");
        $stmt->bind_param("sssss", $this->nome,$this->email,$this->senha,$this->nascimento,$this->salario);
        return $stmt->execute();
    }
    public function buscarClientePorId($idCliente){
        $stmt = $this->banco->getConexao()->prepare("select * from cliente where idCliente = ?");
        $stmt->bind_param("i", $idCliente);
        $stmt->execute();
        $resultado = $stmt->get_result();
        while ($linha =$resultado->fetch_object()) {   
            $this->setIdCliente($linha->idCliente);
            $this->setNome($linha->nome);
            $this->setEmail($linha->email);
            $this->setSenha($linha->senha);
            $this->setNascimento($linha->nascimento);
            $this->setSalario($linha->salario);
        }
        return $this;
    }
    public function listarClientes(){
        $stmt = $this->banco->getConexao()->prepare("Select * from Cliente");
        $stmt->execute();
        $result = $stmt->get_result();
        $vetorClientes = array();
        $i=0;
        while ($linha = mysqli_fetch_object($result)) {
            $vetorClientes[$i] = new Cliente();
            $vetorClientes[$i]->setIdCliente($linha->idCliente);
            $vetorClientes[$i]->setNome($linha->nome);
            $vetorClientes[$i]->setEmail($linha->email);
            $vetorClientes[$i]->setSenha($linha->senha);
            $vetorClientes[$i]->setNascimento($linha->nascimento);
            $vetorClientes[$i]->setSalario($linha->salario);
            $i++;
        }
        return $vetorClientes;
    } 

    public function getIdCliente(){return  $this->idCliente;}
    public function setIdCliente($v){$this->idCliente=$v;}
    public function getNome(){return $this->nome;}
    public function setNome($nome){$this->nome = $nome;}
    public function getEmail(){return $this->email;}
    public function setEmail($v){$this->email=$v;}
    public function getSenha(){return $this->senha;}
    public function setSenha($v){$this->senha = $v;}
    public function getNascimento(){return $this->nascimento;}
    public function setNascimento($v){$this->nascimento=$v;}
    public function getSalario(){return $this->salario;}
    public function setSalario($v){$this->salario=$v;}
     
}



?>