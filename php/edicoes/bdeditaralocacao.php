<?php
    session_start();
    include_once("../conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $associacao = $_POST['associacao'];
    $tipo_cobertura = $_POST['tipo_de_cobertura'];

    $result_colaborador = "UPDATE alocacoes SET nome='$nome', associacao='$associacao', tipo_de_cobertura='$tipo_cobertura' WHERE id='$id'";
    $resultado_colaborador = mysqli_query($conn, $result_colaborador);

    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Alocação editado com sucesso!');
            location.href='edicoes.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Falha ao editar.');
            location.href='editaralocacao?id=$id.php';
        </script>
        ";
    }
?>