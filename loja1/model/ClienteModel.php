<?php

include "db.php";
class ClienteModel {
    private $name;
    private $email;
    private $data_aniversario;
    private $cpf;

    public function __construct($name,$email,$cpf,$data_aniversario)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->data_aniversario = $data_aniversario;
    }
    public function insertCliente($db){
        $query = "INSERT INTO cliente (name, email, cpf, data_nascimento) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($db, $query);

        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "ssss", $this->name, $this->email, $this->cpf, $this->data_aniversario);

        // Executar a declaração
        $result = mysqli_stmt_execute($stmt);

        // Verificar o resultado
        if ($result) {
            return "Cliente: " . $this->name . " adicionado com sucesso";
        } else {
            return "Erro ao adicionar cliente: " . mysqli_error($db);
        }

        // Fechar a declaração
        mysqli_stmt_close($stmt);
    }

    public function deleteCliente($db, $cpf){
        $query = "DELETE FROM cliente WHERE cpf = ?";

        $stmt = mysqli_prepare($db, $query);

        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "s", $cpf);

        // Executar a declaração
        $result = mysqli_stmt_execute($stmt);

        // Verificar o resultado
        if ($result) {
            return "Cliente deletado com sucesso";
        } else {
            return "Erro ao deletar cliente: " . mysqli_error($db);
        }

        // Fechar a declaração
        mysqli_stmt_close($stmt);
    }

    public function selectCliente($db, $cpf){
        $query = "SELECT * FROM cliente WHERE cpf = ?";

        $stmt = mysqli_prepare($db, $query);

        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "s", $cpf);

        // Executar a declaração
        mysqli_stmt_execute($stmt);

        // Obter resultado
        $result = mysqli_stmt_get_result($stmt);

        // Verificar se há resultados
        if ($row = mysqli_fetch_assoc($result)) {
           return $row;
        } else {
            return null;
        }

        // Fechar a declaração
        mysqli_stmt_close($stmt);
    }
}

