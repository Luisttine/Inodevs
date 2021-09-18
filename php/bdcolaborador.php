<?php
    session_start();
    include_once("conexao.php");

	$matricula = $_POST['matricula'];
    $cpf = $_POST['cpf'];
    $nome_completo = $_POST['nome_completo'];
    $data_admissao = $_POST['data_admissao'];
    $data_demissao = $_POST['data_demissao'];
    $funcao = $_POST["funcao"];
    $situacao = $_POST["situacao"];
    $tipo_cobertura = $_POST["tipo_cobertura"];
    $situacaobd = str_replace("ã", "a", "$situacao");

    $result = "INSERT INTO colaboradores (cpf, matricula, nome_completo, data_admissao, data_demissao, funcao, situacao_cadastro, tipo_cobertura) VALUES ('$cpf', '$matricula', '$nome_completo','$data_admissao', '$data_demissao','$funcao', '$situacaobd', '$tipo_cobertura')";
    $resultado = mysqli_query($conn, $result);
    
    if(mysqli_insert_id($conn)){
        header("Location: colaboradores.php");
        $_SESSION['msg'] = "<br><p style='color: green; text-align: center'>Usuário cadastrado com sucesso!</p>";
    } else {
        header("Location: colaboradores.php");
        $_SESSION['msg'] = "<br><p style='color: red; text-align: center'>Usuário não foi cadastrado com sucesso.</p>";
    }
?>