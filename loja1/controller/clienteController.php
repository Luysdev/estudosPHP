<?php
include "../model/ClienteModel.php";
function inseriUsuarioBd()
{
    $cliente = new ClienteModel($_POST["nome_usuario"],$_POST["email_usuario"],$_POST["cpf_usuario"],$_POST["data_nascimento_usuario"]);
    $cliente->insertCliente();
}