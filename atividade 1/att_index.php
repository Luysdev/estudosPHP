<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica se pode doar sangue</title>
    <style>

    body {
            width: 100vw;
            height: 100vh;
            background: wheat;
            margin: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #container {
            text-align: center; 
        }

        #form {
            width: 300px;
            height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            padding: 10px;
            margin:20px;
        }
</style>
</head>

<body>
    <div id="container">
        <div id="form">
            <h1>Vistoria saguinea</h1>
            <?php
                $mensagem = '';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $idade = $_POST["input_number_years"];
                    $peso = $_POST["input_number_peso"];

                    // Processa os dados como desejado
                    if ($idade = 18 && $peso = 50) {
                        $mensagem = "Você pode doar sangue!";
                    } else {
                        $mensagem = "Você não atende aos requisitos para doação de sangue.";
                    }
                } else {
                    $mensagem = "Por favor, preencha o formulário.";
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input name="input_number_years" type="number" placeholder="Digite sua idade" value="<?php echo isset($_POST['input_number_years']) ? $_POST['input_number_years'] : ''; ?>">
                <input name="input_number_peso" type="number" placeholder="Digite seu peso" value="<?php echo isset($_POST['input_number_peso']) ? $_POST['input_number_peso'] : ''; ?>">
                <input type="submit" value="Enviar">
            </form>
            <?php
                if ($mensagem) {
                    if (strpos($mensagem, 'não') !== false) {
                        echo "<p class='error'>$mensagem</p>";
                    } else {
                        echo "<p>$mensagem</p>";
                    }
                }
            ?>
            
        </div>
    </div>
</body>

</html>