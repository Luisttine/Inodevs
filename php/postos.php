<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/postos.css">
    <title>Postos de trabalho</title>
   
</head>
<body>
    <div class="m-box">
        <a href="../html/controle.html"><input  id="btn-submit1" type="submit" value="Retornar"></a>
    </div>
    <br><br><br>
    <div id="main-container">
        <h1>Postos de trabalho</h1><BR>
        <form  method="POST" action="bdcolaborador.php">
            <div class="full-box">
            <label for="name">Descrição</label>
            <input type="text" name="descricao" placeholder="Digite a descrição" required>
            </div>
            <div class="half-box spacing">
                <label for="endereço">Escala</label>
                <input type="text" name="matricula" placeholder="Ex: 1502556561" required>
            </div>
            <div class="half-box spacing">
                <label for="endereço">Número de colaboradores</label>
                <input type="text" name="matricula" placeholder="Ex: 1502556561" required>
            </div>
            <div class="half-box">
                <label for="situacao">Situação do Cadastro</label>
        
               
                    <br><br>
                    <div id="btn-submit">
                        <input type="submit" value="Cadastrar">
                    </div>
                </div>
            </div>
        </form>
    </div>


  <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
<div class="left"></div>
</body>
</html>