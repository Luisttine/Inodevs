<?php
    session_start();
    include_once("../conexao.php");

    $numero = $_POST['numero'];
    $nome_fantasi = $_POST['nome_fantasi'];
    $valor = $_POST['valor'];
    $posto_trabalho = $_POST['posto_trabalho'];
    $escala = $_POST['escala'];

    $result_contrato = "UPDATE contratos SET nome_fantasi='$nome_fantasi', valor='$valor', posto_trabalho='$posto_trabalho', escala='$escala' WHERE numero='$numero'";
    $resultado_contrato = mysqli_query($conn, $result_contrato);

    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Contrato editado com sucesso!');
            location.href='edicoes.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Falha ao editar.');
            location.href='editarcontrato?id=$numero.php';
        </script>
        ";
    }
?>