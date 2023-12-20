<?php 
    $idade = $_POST["idade"];
    $peso = $_POST["peso"];

    function calcValid($idade, $peso){
        if  ($idade >= 16 || $idade <= 69 && $peso >= 50 ) {
                return true;
        }else{
            return false;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doação Sanguinea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container-grid-home">
        <div class="nav-home">
            <ul>
                <li><a href="./info.php"> aqq</a></li>
                <li>a</li>
                <li>a</li>
                <li>a</li>
            </ul>
        </div>
        <div id="text-welcome">
            <h1>
                Bem-vindo à Doação Sanguínea!
            </h1>
            <p>A doação de sangue é um ato simples que tem um impacto enorme na vida de outras pessoas</p>
        </div>
        <div id="info-doacao">
            <div id="info-doacao-plaquetas">
                <h2>Doação de Plaquetas</h2>
                <p>
                    A doação de plaquetas é um processo especial que ajuda pacientes com câncer,
                    transplantados e aqueles em tratamento de doenças sanguíneas. Suas plaquetas
                    contribuem para a coagulação do sangue, sendo essenciais para a recuperação desses pacientes.
                </p>
                <p>
                    Saiba mais sobre como a doação de plaquetas faz a diferença e como você pode
                    ser um doador regular.
                </p>
            </div>

            <div id="info-doacao-sangue">
                <h2>Doação de Sangue</h2>
                <p>
                    A doação de sangue comum é um ato valioso que beneficia uma ampla variedade de pacientes.
                    Seu sangue pode ser usado para cirurgias, tratamento de doenças crônicas e em casos de
                    emergência. Cada doação conta!
                </p>
                <p>
                    Descubra como o simples ato de doar sangue pode salvar vidas e como você pode se tornar
                    um doador regular para ajudar a manter os estoques sanguíneos.
                </p>
            </div>
        </div>
        <div id="calculo-doador"> 
            <form action="valida.php" method="post" >
                <input type="number" placeholder="Digite sua idade" name="idade" id="idade">
                <input type="number" placeholder="Digite seu peso" name="peso" id="peso">
                <input type="submit">
            </form>
            <p><?= 
                    $result = calcValid($idade, $peso);

                    if ($result == true) {
                        echo "validado";
                    }else{
                        echo "invalido";    
                    }
                ?>
            </p>
        </div>
    </div>
</body>
</html>