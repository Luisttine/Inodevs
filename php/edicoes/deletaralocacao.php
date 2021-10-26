<?php
session_start();
include_once("../conexao.php");

$id = $_GET['id'];
$_SESSION['checked'] = 'alocacao';
if (!empty($id)){
    $result_posto = "DELETE FROM alocacoes WHERE id='$id'";
    $resultado_posto = mysqli_query($conn, $result_posto);
    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Alocação deletada!');
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
        alert('Necessário selecionar uma alocação.');
        location.href='edicoes.php';
    </script>
    ";
}

?>