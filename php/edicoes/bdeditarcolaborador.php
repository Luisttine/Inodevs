<?php
    session_start();
    include_once("../conexao.php");

    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    $nome_completo = $_POST['nome_completo'];
    $data_admissao = $_POST['data_admissao']; 
    $data_demissao = $_POST['data_demissao'];
    $situacao_cadastro = $_POST['situacao_cadastro'];
    $tipo_cobertura = $_POST['tipo_cobertura'];
    $posto = $_POST['posto_trabalho'];
    $flutuante = $_POST['flutuante'];

    $result_colaborador = "UPDATE colaboradores SET cpf='$cpf', nome_completo='$nome_completo', data_admissao='$data_admissao', data_demissao='$data_demissao', situacao_cadastro='$situacao_cadastro', tipo_cobertura='$tipo_cobertura', posto_trabalho='$posto', flutuante='$flutuante' WHERE matricula='$id'";
    $resultado_colaborador = mysqli_query($conn, $result_colaborador);

    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Colaborador editado com sucesso!');
            location.href='edicoes.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Falha ao editar.');
            location.href='editarcolaborador?id=$id.php';
        </script>
        ";
    }
?>