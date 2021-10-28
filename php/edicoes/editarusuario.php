<?php
    session_start();
    include_once("../conexao.php");
    $sql_code_colaborador = "SELECT * FROM colaboradores";
    $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
    $linha_colaborador = $sql_query_colaborador->fetch_assoc();
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
                    <div class=principalforms>
                    <h1>Editar Usuario</h1>
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
                <label>Nome: </label>
                <select name="nome" required> 
                EOT;
                ?>
                <?php
                    do{
                            $linha_colaborador_colaborador = $linha_colaborador['nome_completo'];  
                            if($linha_colaborador_colaborador == $linha_nome){
                                echo "<option selected>$linha_colaborador_colaborador</option>";
                            } else{  
                                echo "<option>$linha_colaborador_colaborador</option>";
                            } 
                    }while($linha_colaborador=$sql_query_colaborador->fetch_assoc());   
                echo <<<EOT
                </select><br><br>
                <label>Email:</label><br>
                <input type="text" name="email" value="$linha_email" required><br><br>
                <label>Nível Acesso:</label><br>
                <label>Tipo de Cobertura:</label>
                EOT;
                if ($linha_nivel_acesso == 'Operacional'){
                    echo "
                    <select name='nivel_acesso' required>
                        <option value='1' selected>Operacional</option>
                        <option value='2'>Tático</option>
                    </select>";
                } else {
                    echo "
                    <select name='nivel_acesso' required>
                        <option value='1'>Operacional</option>
                        <option value='2' selected>Tático</option>
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