<?php
session_start();
include('conexao.php');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "select email from usuarios where email = '$email' and senha = '$senha'"; 

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: presenca.php');
    exit();
}   else {
    $_SESSION['msg'] = "<br><br><br><p style='color: red; text-align: center; font-size:18px';>Erro ao logar.</p>";
    header('Location: index.php');
    exit();
}

?>