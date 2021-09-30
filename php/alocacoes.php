<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alocações</title>
    <link rel="stylesheet" href="../css/alocacoes.css">
</head>

<body>
    <div class="m-box">
        <a href="../html/controle.html"><input  id="btn-submit1" type="submit" value="Retornar"></a>
    </div>
    <br><br><br>

    <div id="main-container">
        <h1>Alocações</h1><BR>

        <form id="register-form" method="POST" action="bdusuarios">

            <div class="full-box">
                <label for="name">Associação do colaborador com o posto</label>
                <input type="text" name="associacao" id="associacao"  required>
            </div>

            <div class="half-box spacing">
                <label for="endereço"> Tipo de cobertura</label>
                <input type="text" name="login" id="login"  required>
            </div>

<br><br>
            <div id="btn-submit">
                <input type="submit" value="Cadastrar">
            </div>
        </form>

    </div>
<div class="left"></div>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

</body>
</html>