<?php
session_start();
include_once("../conexao.php");

$numero = $_GET['id'];
$_SESSION['checked'] = 'contrato';
if (!empty($numero)){
    $result_contrato = "DELETE FROM contratos WHERE numero='$numero'";
    $resultado_contrato = mysqli_query($conn, $result_contrato);
    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Usuario deletada!');
            location.href='edicoes.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Erro ao editar');
            location.href='edicoes.php';
        </script>
        ";
        }
} else {
    echo "
    <script>
        alert('NecessÃ¡rio selecionar um usuario.');
        location.href='edicoes.php';
    </script>
    ";
}

?>