<?php
    session_start();
    include_once("../conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = "SELECT * FROM clientes where id='$id'";
    $resultado= mysqli_query($conn, $result);
    $linha = mysqli_fetch_assoc($resultado);
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
    if(!empty($id)){
    $_SESSION['checked'] = 'cliente';
    echo <<<EOT
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Clientes</title>
                    <link rel="stylesheet" href="../../css/quadro.css">
                </head>
                <body>
                    <div class=principalforms>
                    <h1>Editar Clientes</h1>
                EOT;
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    $linha_razao_social = $linha['razao_social'];
                    $linha_nome_fantasia = $linha['nome_fantasia'];
                    $linha_cnpj = $linha['cnpj'];
                    $linha_endereco = $linha['endereco'];
                    $linha_contato = $linha['contato'];
                    $linha_id = $linha['id'];
                echo <<<EOT
                <form method="POST" action="bdeditarcliente.php">
                <input type="hidden" name="id" value="$linha_id" required>
                <label>Razão social: </label><br>
                <input type="text" name="razao_social" value="$linha_razao_social" required><br><br>
                <label>Nome Fantasia: </label><br>
                <input type="text" name="nome_fantasia" value=" $linha_nome_fantasia" required><br><br>
                <label>CNPJ: </label><br>
                <input type="text" name="cnpj" value="$linha_cnpj" required><br><br>
                <label>Endereço:</label><br>
                <input type="text" name="endereco" value="$linha_endereco" required><br><br>
                <label>Contato:</label><br>
                <input type="text" name="contato" value=" $linha_contato" required><br><br>
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