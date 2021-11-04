<?php
    session_start();
    include_once("conexao.php");
    $sql_code = "SELECT * FROM clientes";
    $sql_query = $conn->query($sql_code) or die($mysqli->error);
    $linha = $sql_query->fetch_assoc();
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
        echo <<<EOT
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
                <a href="controle.php"><input  id="btn-submit1" type="submit" value="Retornar"></a>
            </div>
            <br><br><br>
            <div id="main-container">
                <h1>Contratos</h1><BR>
                <form  method="POST" action="bdcontratos.php">
                    <div class="half-box spacing">
                    <label for="name">Número</label>
                        <input type="text" name="numero" placeholder="Deixar em branco" required>
                    </div>
                    <div class="half-box spacing">
                        <label for="endereço">Posto de trabalho associados ao contrato e suas respectivas vagas</label>
                        <input type="text" name="posto_trabalho" placeholder="Ex: Setor A - fixo - 5 vagas" required>
                    </div>
                    <div class="half-box spacing">
                        <label for="endereço">Valor</label>
                        <input type="number" name="valor" placeholder="Ex: 1.100,00" required>
                    </div>
                    <div class="half-box">
                        <label for="name">Cliente</label><br>
                        <select name="nome" required> 
                                <option value="" disabled selected hidden>Selecione um cliente...</option>
        EOT;
?>
                                <?php
                                    do{
                                            $linha_cliente = $linha['nome_fantasia'];       
                                            echo "<option>$linha_cliente</option>";
                                    }while($linha=$sql_query->fetch_assoc());   

                                echo <<<EOT
                        </select>
                    </div>
                    <div class="half-box spacing">
                        <label for="endereço">Escala</label>
                        <input type="text" name="escala" placeholder="Ex:8x16" required>
                    </div>
                    <div class="middle-box">
                        <input id="btn-submit" type="submit" value="Cadastrar">
                    </div>
                </form>
            </div>
        EOT;
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        echo <<< EOT
            <div class="left">
            </div>
        </body>
        </html>
        EOT;
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px'> Você não tem permissão!</p>";
        header('location: presenca.php');
    }
    } else {
        $_SESSION['msg'] = "<p style='color: red; font-size: 18px'> Você precisa estar logado!</p>";
        header('location: ../index.php');
    }
?>