<?php
session_start();
include_once("../conexao.php");

$id = $_GET['id'];
if (!empty($id)){
    $result = "DELETE FROM relatorios WHERE id='$id'";
    $resultado = mysqli_query($conn, $result);
    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('O relatório foi deletado com sucesso!');
            location.href='relatorios.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Erro ao deletar.');
            location.href='relatorios.php';
        </script>
        ";
        }
} else {
    echo "
    <script>
        alert('Necessário selecionar um relatório.');
        location.href='relatorios.php';
    </script>
    ";
}

?>