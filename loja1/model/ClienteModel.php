<?php

include "DB2.php";

class ClienteModel {
    private $name;
    private $email;
    private $data_aniversario;
    private $cpf;
    private $db;

    public function __construct($name, $email, $cpf, $data_aniversario)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->data_aniversario = $data_aniversario;
        $this->db = new DB2('localhost', 'root', '1234', 'loja1', '3306');
    }

    private function openConnection()
    {
        return $this->db->iniciaConexao();
    }

    private function closeConnection($conn)
    {
        mysqli_close($conn);
    }

    public function insertCliente()
    {
        $query = "INSERT INTO cliente (name, email, cpf, data_nascimento) VALUES (?, ?, ?, ?)";
        $conn = $this->openConnection();

        $stmt = mysqli_prepare($conn, $query);
        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "ssss", $this->name, $this->email, $this->cpf, $this->data_aniversario);

        // Executar a declaração
        $result = mysqli_stmt_execute($stmt);

        // Verificar o resultado
        if ($result) {
            $this->closeConnection($conn);
            return "Cliente: " . $this->name . " adicionado com sucesso";
        } else {
            $this->closeConnection($conn);
            return "Erro ao adicionar cliente: " . mysqli_error($conn);
        }
    }

    public function deleteCliente()
    {
        $query = "DELETE FROM cliente WHERE cpf = ?";
        $conn = $this->openConnection();

        $stmt = mysqli_prepare($conn, $query);
        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "s", $this->cpf);

        // Executar a declaração
        $result = mysqli_stmt_execute($stmt);

        // Verificar o resultado
        if ($result) {
            $this->closeConnection($conn);
            return "Cliente deletado com sucesso";
        } else {
            $this->closeConnection($conn);
            return "Erro ao deletar cliente: " . mysqli_error($conn);
        }
    }

    public function selectCliente()
    {
        $query = "SELECT * FROM cliente WHERE cpf = ?";
        $conn = $this->openConnection();

        $stmt = mysqli_prepare($conn, $query);
        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "s", $this->cpf);

        // Executar a declaração
        mysqli_stmt_execute($stmt);

        // Obter resultado
        $result = mysqli_stmt_get_result($stmt);

        // Verificar se há resultados
        if ($row = mysqli_fetch_assoc($result)) {
            $this->closeConnection($conn);
            return $row;
        } else {
            $this->closeConnection($conn);
            return null;
        }
    }
}
