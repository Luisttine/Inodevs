<?php
session_start();
include_once("../conexao.php");

$id = $_GET['id'];
$_SESSION['checked'] = 'cliente';
if (!empty($id)){
    $result_posto = "DELETE FROM clientes WHERE id='$id'";
    $resultado_posto = mysqli_query($conn, $result_posto);
    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Cliente deletado!');
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
        alert('NecessÃ¡rio selecionar um cliente.');
        location.href='edicoes.php';
    </script>
    ";
}

?>