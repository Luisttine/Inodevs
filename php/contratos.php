<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contratos.css">
    <title>Contratos</title>
   
</head>
<body>
    <div class="m-box">
        <a href="../html/controle.html"><input  id="btn-submit1" type="submit" value="Retornar"></a>
    </div>
    <br><br><br>
    <div id="main-container">
        <h1>Contratos</h1><BR>
        <form  method="POST" action="bdcolaborador.php">

            <div class="half-box spacing">
            <label for="name">Número</label>
            <input type="text" name="numero" placeholder="Ex: 480578936" required>
            </div>

            <div class="half-box spacing">
                <label for="endereço">Escala</label>
                <input type="text" name="matricula" placeholder="Ex: 5x2" required>
            </div>

            <div class="half-box spacing">
                <label for="endereço">Valor</label>
                <input type="number" name="valor" placeholder="Ex: 1.100,00" required>
            </div>

            <div class="half-box spacing">
                <label for="endereço">Cliente</label>
                <input type="text" name="cliente" placeholder="Ex: Inovar Ltda" required>
            </div>

            <div class="half-box spacing">
                <label for="endereço">Posto de trabalho associados ao contrato e suas quantidades de vagas</label>
                <input type="text" name="postos" placeholder="Ex: Posto centro da cidade, 88 vagas" required>
            </div>

            <div id="btn-submit">
                <input type="submit" value="Cadastrar">
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