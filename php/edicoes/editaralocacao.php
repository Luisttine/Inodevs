<?php
    session_start();
    include_once("../conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = "SELECT * FROM alocacoes where id='$id'";
    $resultado= mysqli_query($conn, $result);
    $linha = mysqli_fetch_assoc($resultado);
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
    if(!empty($id)){
    $_SESSION['checked'] = 'alocacao';
    echo <<<EOT
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Alocação</title>
                    <link rel="stylesheet" href="../../css/quadro.css">
                </head>
                <body>
                    <div class=principalforms>
                    <h1>Editar Alocação</h1>
                EOT;
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    $linha_id = $linha['id'];
                    $linha_nome = $linha['nome'];
                    $linha_associacao = $linha['associacao'];
                    $linha_tipo_cobertura = $linha['tipo_de_cobertura'];
                echo <<<EOT
                <form method="POST" action="bdeditaralocacao.php">
                    <input type="hidden" name="id" value="$linha_id" required>
                <label>Nome: </label><br>
                <input type="text" name="nome" value="$linha_nome" required><br><br>
                <label>Associação:</label><br>
                <input type="text" name="associacao" value="$linha_associacao" required><br><br>
                <label>Tipo de Cobertura:</label>
                EOT;
                if ($linha_tipo_cobertura == 'Fixo'){
                    echo "
                    <select name='tipo_de_cobertura' required>
                        <option selected>Fixo</option>
                        <option>Flutuante</option>
                    </select>";
                } else {
                    echo "
                    <select name='tipo_de_cobertura' required>
                        <option>Fixo</option>
                        <option selected>Flutuante</option>
                    </select>";
                }
                echo <<<EOT
                <br>
                <input type="submit" value="Editar">
                </form>
                <br><br>
                <div class="left">
                </div>
                </div>
                    <div class="voltar2"><a href="quadropresenca.php">Retornar</a></div>
                </body>
                </html> 
                EOT;
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px; text-align: center;'> É necessário adicionar o id do colaborador!</p>";
        header('location: quadropresenca.php');
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