<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Cliente</title>
</head>
<body>
    <form method="post" action="forms/form_cliente_cadastro.php">
        <input type="text" id="nome_usuario" name="nome_usuario">
        <input type="date" id="data_nascimento_usuario" name="data_nascimento_usuario">
        <input type="text" id="cpf_usuario" name="cpf_usuario">
        <input type="email" id="email_usuario" name="email_usuario">
        //name, email, cpf, data_nascimento
        <input type="submit" id="submit_cliente" name="submit_cliente">
    </form>
</body>
</html>