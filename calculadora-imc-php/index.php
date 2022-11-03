<?php



    if (isset($_POST["peso"], $_POST["alt"])){
        $id = count( file('IMC.csv' )) + 1;
        $nome = $_POST["nome"];
        $peso = $_POST["peso"];
        $alt = $_POST["alt"];
        $ResultadoImc = ($peso / ($alt ** 2));
        $data = date('d/m/Y H:i:s');
        $ResultadoImc = number_format($ResultadoImc, 2, '.', '');
        $dados_usuario = $id . ';' . $nome . ';' . $peso . ';' . $alt . ';' . $ResultadoImc . ';' . $data . PHP_EOL;

        if ($ResultadoImc < 18.5){
            $mensagem = "Abaixo do peso";
        }
        else if ($ResultadoImc < 25){
            $mensagem = "Peso normal";
        }

        else if ($ResultadoImc < 30){
            $mensagem = "Sobrepeso";
        }

        else if ($ResultadoImc < 35){
            $mensagem = "Obesidade grau I";
        }

        else if ($ResultadoImc < 40){
            $mensagem = "Obesidade grau  II";
        }

        else {
            $mensagem = "Obesidade grau III";
        }
            
        $arq = fopen("IMC.csv", "a");
        fwrite($arq, $dados_usuario);
      
    }
        
        

?>      
        



<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora IMC</title>
        <style> 
            header {
                background-color: grey;
                text-align: center;
                border: solid;
                font: caption;
                border-style: solid;
            }

            p {
                font-size: larger;
            }

        </style>

    </head>

    <body>
        <header>
            <h1>Mateus Henrique de Souza Medeiros</h1>
        </header></br>
            
            
            <form method="post">
                nome<br/>
                <input type="text" name="nome" placeholder="nome" required/><br/><br/>
                peso<br>
                <input type="text" name="peso" placeholder="peso (Kg)" required/><br><br>
                altura<br>
                <input type="text" name="alt" placeholder="altura (m)" required/><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button>calcular</button>
            </form><br/>
            <p><font size="6"><?= $ResultadoImc ?></font></p>
            <p>>>>&nbsp; <b><font size="5"><?= $mensagem ?></font></b></p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="sucesso.html"><button>finalizar</button></a>
            


    </body>
</html>
