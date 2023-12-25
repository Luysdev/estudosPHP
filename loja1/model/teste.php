<?php
global $conn;
include "ClienteModel.php";
include "db.php";
$new_cliente = new ClienteModel("jerson", "luis@gmail.com","1234123412","2000-01-01");


$result = $new_cliente -> selectCliente($conn, '12351351');

print_r($result);


