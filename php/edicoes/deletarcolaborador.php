<?php
session_start();
include_once("../conexao.php");

$id = $_GET['id'];
$_SESSION['checked'] = 'colaborador';
if (!empty($id)){
    $result_posto = "DELETE FROM colaboradores WHERE matricula='$id'";
    $resultado_posto = mysqli_query($conn, $result_posto);
    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Colaborador deletada!');
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
        alert('Necessário selecionar uma colaborador.');
        location.href='edicoes.php';
    </script>
    ";
}

?>