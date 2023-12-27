<?php

include "../model/UserModel.php";
function verificaUsuario() {
    $user_login = new UserModel($_POST['name'], $_POST['password1']);
    echo "Verificando... ";

    // Create a new DB2 instance inside UserModel to handle database connection
    $result = $user_login->selecionarUsuario();

    if ($result) {
        header("Location: ../view/home/home.php");
    } else {
        header("Location: ../index.php?login=erro1");
    }
}
