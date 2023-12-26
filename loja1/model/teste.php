<?php
global $conn;
include "ClienteModel.php";
include "db.php";
include "UserModel.php";
$new_cliente = new ClienteModel("jerson", "luis@gmail.com","1234123412","2000-01-01");
$new_user = new UserModel("Luis Eduardo", 12341234);

$new_user->deleteCliente($conn,"Luis Eduardo");
$result = $new_cliente -> selectCliente($conn, '12351351');

print_r($result);


