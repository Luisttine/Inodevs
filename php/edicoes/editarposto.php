<?php
    session_start();
    include_once("../conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = "SELECT * FROM postos_de_trabalho where id='$id'";
    $resultado= mysqli_query($conn, $result);
    $linha = mysqli_fetch_assoc($resultado);
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
    if(!empty($id)){
    $_SESSION['checked'] = 'posto';
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
                    $linha_nome_posto = $linha['nome_posto'];
                    $linha_descricao = $linha['descricao'];
                    $linha_escala = $linha['escala'];
                    $linha_numero_colab = $linha['numero_colab'];
                    $linha_id = $linha['id'];
                echo <<<EOT
                <form method="POST" action="bdeditarposto.php">
                <input type="hidden" name="id" value="$linha_id" required>
                <label>Nome do Posto: </label><br>
                <input type="text" name="nome_posto" value="$linha_nome_posto" required><br><br>
                <label>Descrição:</label><br>
                <input type="text" name="descricao" value="$linha_descricao" required><br><br>
                <label>Escala :</label><br>
                <input type="text" name="escala" value="$linha_escala" required><br><br>
                <label>Número de Colaboradores :</label><br>
                <input type="text" name="numero_colab" value="$linha_numero_colab" required><br><br>
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