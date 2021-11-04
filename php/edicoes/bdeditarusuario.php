<?php
    session_start();
    include_once("../conexao.php");

    $ulogin = $_POST['ulogin'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $result_usuarios = "UPDATE usuarios SET nome='$nome', email='$email', nivel_acesso='$nivel_acesso' WHERE ulogin='$ulogin'";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

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
            location.href='editarusuario?id=$ulogin.php';
        </script>
        ";
    }
?>