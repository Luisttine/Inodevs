<?php
    session_start();
    include_once("../conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = "SELECT * FROM usuarios where ulogin='$id'";
    $resultado= mysqli_query($conn, $result);
    $linha = mysqli_fetch_assoc($resultado);
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
    if(!empty($id)){
    $_SESSION['checked'] = 'usuario';
    echo <<<EOT
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Usuario</title>
                    <link rel="stylesheet" href="../../css/quadro.css">
                </head>
                <body>
                    <div class="voltar4"><a href="edicoes.php">Retornar</a></div>
                    <div class=principalforms>
                    <h6>Editar Usuario</h6>
                EOT;
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    $linha_ulogin = $linha['ulogin'];
                    $linha_nome = $linha['nome'];
                    $linha_email = $linha['email'];
                    $linha_nivel_acesso = $linha['nivel_acesso'];
                echo <<<EOT
                <form method="POST" action="bdeditarusuario.php">
                    <input type="hidden" name="ulogin" value="$linha_ulogin" required>
                <label>Nome: </label><br>
                <input type="text" name="nome" value="$linha_nome" required><br><br>
                <label>email:</label><br>
                <input type="text" name="email" value="$linha_email" required><br><br>
                <label>Nível Acesso:</label><br>
                <input type="text" name="nivel_acesso" value="$linha_nivel_acesso" required><br><br>
                <input type="submit" value="Editar">
                </form>
                <br><br>
                <div class="left">
                </div>
                </div>
                    
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