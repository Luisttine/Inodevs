<?php
    session_start();
    include_once("../conexao.php");
    unset($_SESSION['checked']);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = "SELECT * FROM colaboradores where matricula='$id'";
    $resultado= mysqli_query($conn, $result);
    $linha = mysqli_fetch_assoc($resultado);
    $sql_code_posto = "SELECT * FROM presenca_posto";
    $sql_query_posto = $conn->query($sql_code_posto) or die($mysqli->error);
    $linha_posto = $sql_query_posto->fetch_assoc();
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
    if(!empty($id)){
    $_SESSION['checked'] = 'colaboradores';
    echo <<<EOT
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Colaborador</title>
                    <link rel="stylesheet" href="../../css/quadro.css">
                </head>
                <body>
                    <div class=principalforms>
                    <h1>Editar Colaborador</h1>
                EOT;
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    $linha_id = $linha['matricula'];
                    $linha_cpf = $linha['cpf'];
                    $linha_nome_completo = $linha['nome_completo'];
                    $linha_data_admissao = $linha['data_admissao'];
                    $linha_data_demissao = $linha['data_demissao'];
                    $linha_situacao_cadastro = $linha['situacao_cadastro'];
                    $linha_tipo_cobertura = $linha['tipo_cobertura'];
                    $linha_posto_trabalho = $linha['posto_trabalho'];
                echo <<<EOT
                <form method="POST" action="bdeditarcolaborador.php">
                <input type="hidden" name="id" value="$linha_id" required><br><br>
                <label>CPF: </label><br>
                <input type="text" name="cpf" value="$linha_cpf"  required><br><br>
                <label>Nome Completo:</label><br>
                <input type="text" name="nome_completo" value="$linha_nome_completo" required><br><br>
                <label>Data de Admissão:</label><br>
                <input type="date" name="data_admissao" value="$linha_data_admissao" required><br><br>
                <label>Data de Demissão:</label><br>
                <input type="date" name="data_demissao" value="$linha_data_demissao" required><br><br>
                <label>Situação do Cadastro:</label>
                EOT;
                if ($linha_situacao_cadastro == 'Empregado'){
                    echo "
                    <select name='situacao_cadastro' required>
                        <option value='Em admissao'>Em admissão</option>
                        <option value='Empregado' selected>Empregado</option>
                        <option value='Em demissao'>Em demissão</option>
                    </select>";
                } elseif ($linha_situacao_cadastro == 'Em admissao'){
                    echo "
                    <select name='situacao_cadastro' required>
                        <option value='Em admissao' selected>Em admissão</option>
                        <option value='Empregado'>Empregado</option>
                        <option value='Em demissao'>Em demissão</option>
                    </select>";
                } else {
                    echo "
                    <select name='situacao_cadastro' required>
                        <option value='Em admissao'>Em admissão</option>
                        <option value='Empregado'>Empregado</option>
                        <option value='Em demissao' selected>Em demissão</option>
                    </select>";
                }
                echo <<<EOT
                <br><br>
                <label>Tipo de Cobertura:</label>
                EOT;
                if ($linha_tipo_cobertura == 'Fixo'){
                    echo "
                    <select name='tipo_cobertura' required>
                        <option selected>Fixo</option>
                        <option>Flutuante</option>
                    </select>";
                } else {
                    echo "
                    <select name='tipo_cobertura' required>
                        <option>Fixo</option>
                        <option selected>Flutuante</option>
                    </select>";
                }
                echo <<<EOT
                <br>
                <label>Posto de Trabalho:</label>
                <select name='posto_trabalho'>
                EOT;
                do {
                    $linha_posto_posto = $linha_posto['posto_de_trabalho'];
                    if ($linha_posto_posto == $linha_posto_trabalho){
                        echo "<option selected> $linha_posto_posto</option>";
                    } else{
                        echo "<option> $linha_posto_posto</option>";
                    }
                } while($linha_posto=$sql_query_posto->fetch_assoc());
                echo <<<EOT
                </selected>
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