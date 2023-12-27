<?php

include "DB2.php";

class UserModel {
    private $name_user;
    private $password_user;
    private $perfil_user;
    private $db;

    public function __construct($name_user, $password_user) {
        $this->name_user = $name_user;
        $this->password_user = $password_user;
        $this->perfil_user = 2;
        $this->db = new DB2('localhost', 'root', '1234', 'loja1', '3306');
    }

    private function openConnection() {
        return $this->db->iniciaConexao();
    }

    private function closeConnection($conn) {
        mysqli_close($conn);
    }

    public function inserirUsuario() {
        $query = "INSERT INTO user (name_user, password_user, perfil_user) VALUES (?, ?, ?)";
        $conn = $this->openConnection();
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "ssi", $this->name_user, $this->password_user, $this->perfil_user);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $this->closeConnection($conn);
            return "Usuário: " . $this->name_user . " adicionado com sucesso";
        } else {
            $this->closeConnection($conn);
            return "Erro ao adicionar usuário: " . mysqli_error($conn);
        }
    }

    public function deletarUsuario() {
        $query = "DELETE FROM user WHERE name_user = ?";
        $conn = $this->openConnection();
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "s", $this->name_user);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $this->closeConnection($conn);
            return "Usuário deletado com sucesso";
        } else {
            $this->closeConnection($conn);
            return "Erro ao deletar usuário: " . mysqli_error($conn);
        }
    }

    public function selecionarUsuario() {
        $query = "SELECT * FROM user WHERE name_user = ?";
        $conn = $this->openConnection();
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "s", $this->name_user);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $this->closeConnection($conn);
            return $row;
        } else {
            $this->closeConnection($conn);
            return null;
        }
    }
}