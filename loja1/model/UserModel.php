<?php
class UserModel{
    private $name_user;
    private $password_user;
    private $perfil_user;

    public function __construct($name_user,$password_user)
    {
           $this->name_user = $name_user;
           $this->password_user = $password_user;
           $this->perfil_user = 2;
           // 2 para usuarios normais e 1 para admins
    }

    public function insertUser($db)
    {
        $query = "INSERT INTO user (name_user,password_user,perfil_user) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($db, $query);

        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "ssi", $this->name_user, $this->password_user, $this->perfil_user);

        // Executar a declaração
        $result = mysqli_stmt_execute($stmt);

        // Verificar o resultado
        if ($result) {
            return "User: " . $this->name_user . " adicionado com sucesso";
        } else {
            return "Erro ao adicionar user: " . mysqli_error($db);
        }
        mysqli_stmt_close($stmt);
    }

    public function deleteCliente($db, $name_user){
        $query = "DELETE FROM user WHERE name_user = ?";

        $stmt = mysqli_prepare($db, $query);

        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "s", $name_user);

        // Executar a declaração
        $result = mysqli_stmt_execute($stmt);

        // Verificar o resultado
        if ($result) {
            return "User deletado com sucesso";
        } else {
            return "Erro ao deletar user: " . mysqli_error($db);
        }

        // Fechar a declaração
        mysqli_stmt_close($stmt);
    }

    public function selectCliente($db, $name_user){
        $query = "SELECT * FROM user WHERE name_user = ?";

        $stmt = mysqli_prepare($db, $query);

        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "s", $name_user);

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