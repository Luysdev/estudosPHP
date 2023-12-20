<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        define("BD_USER","Luis");
        define("BD_PASS","123123");
        define("BD_URL","######");


        echo 'Senha servidor: ' . BD_PASS . '<hr>';
        echo 'Usuario servidor: ' . BD_USER . '<hr>';
        echo 'Url servidor: ' . BD_URL . '<hr>';


        BD_USER == 'Luis'? 'Olá Luis':'<h2>Cadastre-se</h2>';
    ?>

    <p><?= BD_PASS == '1231234' ? 'Ola' . BD_USER : 'cadastre-se' ?></p>
</body>
</html>