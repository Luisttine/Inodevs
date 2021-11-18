<?php
    session_start();
    include_once("../conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = "SELECT * FROM contratos where numero='$id'";
    $resultado= mysqli_query($conn, $result);
    $linha = mysqli_fetch_assoc($resultado);
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
    if(!empty($id)){
    $_SESSION['checked'] = 'contrato';
    echo <<<EOT
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Contratos</title>
                    <link rel="stylesheet" href="../../css/quadro.css">
                </head>
                <body>
                    <div class=principalforms>
                    <h1>Editar Contratos</h1>
                EOT;
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    $linha_numero = $linha['numero'];
                    $linha_nome_fantasi = $linha['nome_fantasi'];
                    $linha_valor = $linha['valor'];
                    $linha_posto_trabalho = $linha['posto_trabalho'];
                    $linha_escala = $linha['escala'];
                echo <<<EOT
                <form method="POST" action="bdeditarcontrato.php">
                <input type="hidden" name="numero" value="$linha_numero" required>
                <label>Cliente: </label><br>
                <input type="text" name="nome_fantasi" value="$linha_nome_fantasi" required><br><br>
                <label>Valor:</label><br>
                <input type="text" name="valor" value="$linha_valor" required><br><br>
                <label>Posto de trabalho associados ao contrato e suas respectivas vagas :</label><br>
                <input type="text" name="posto_trabalho" value="$linha_posto_trabalho" required><br><br>
                <label>Escala :</label><br>
                <input type="text" name="escala" value="$linha_escala" required><br><br>
                <input type="submit" value="Editar">
                </form>
                <br><br>
                <div class="left">
                </div>
                </div>
                    <div class="voltar2"><a href="edicoes.php">Retornar</a></div>
                </body>
                </html> 
                EOT;
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px; text-align: center;'> É necessário adicionar o id do colaborador!</p>";
        header('location: edicoes.php');
    }
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px'> Você não tem permissão!</p>";
        header('location: ../presenca.php');
    }
    } else {
        $_SESSION['msg'] = "<p style='color: red; font-size: 18px'> Você precisa estar logado!</p>";
        header('location: ../../index.php');
    }
?>