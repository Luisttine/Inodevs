<?php
session_start();
include_once("../conexao.php");

$id = $_GET['id'];
$_SESSION['checked'] = 'posto';
if (!empty($id)){
    $result_posto = "DELETE FROM postos_de_trabalho WHERE id='$id'";
    $resultado_posto = mysqli_query($conn, $result_posto);
    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Posto de trabalho deletado!');
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
        alert('Necessário selecionar um posto de trabalho.');
        location.href='edicoes.php';
    </script>
    ";
}

?>