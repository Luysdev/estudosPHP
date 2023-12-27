<?php

global $conn;
require "ClienteModel.php";




$cliente1 = new ClienteModel("Luis Eduardo", "luis@teste.com", "13539414932", "2023-12-12");
echo $cliente1->insertCliente();