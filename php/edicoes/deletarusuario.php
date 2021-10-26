<?php
session_start();
include_once("../conexao.php");

$ulogin = $_GET['id'];
$_SESSION['checked'] = 'usuario';
if (!empty($ulogin)){
    $result_usuario = "DELETE FROM usuarios WHERE ulogin='$ulogin'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
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