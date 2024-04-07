<?php
require 'config.php';
Class clientes {

    public function getClientes() {
        global $pdo;
        $array = array();
        $sql = $pdo->query("SELECT * FROM clientes ORDER BY id DESC");

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getCliente($id) {
        global $pdo;
        $array = array();
        $sql = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
        $sql->execute(array($id));

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function addCliente($nome, $telefone, $cpf, $email, $estado, $municipio, $cep, $bairro, $rua, $numero, $complemento) {
        global $pdo;
        $endereco = array(
            "estado"=>$estado,
            "municipio"=>$municipio,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "rua"=>$rua,
            "numero"=>$numero,
            "complemento"=>$complemento
        );
        $endereco_serializado = serialize($endereco);

        $sql = $pdo->prepare("SELECT * FROM clientes WHERE cpf = ? OR email = ?");
        $sql->execute(array($cpf, $email));

        if($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO clientes (nome, telefone, cpf, email, endereco) VALUES (?, ?, ?, ?, ?)");
            $sql->execute(array($nome, $telefone, $cpf, $email, $endereco_serializado));
            return "true";
        } else {
            return "false";
        }
    }

    public function editCliente($nome, $telefone, $cpf, $email, $estado, $municipio, $cep, $bairro, $rua, $numero, $complemento, $id) {
        global $pdo;
        $endereco = array(
            "estado"=>$estado,
            "municipio"=>$municipio,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "rua"=>$rua,
            "numero"=>$numero,
            "complemento"=>$complemento
        );
        $endereco_serializado = serialize($endereco);

        $sql = $pdo->prepare("UPDATE clientes SET nome = ?, telefone = ?, cpf = ?, email = ?, endereco = ? WHERE id = ?");
        $sql->execute(array($nome, $telefone, $cpf, $email, $endereco_serializado, $id));
        return "true";
    }

    public function delCliente($id) {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
        $sql->execute(array($id));
    }
}