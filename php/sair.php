<?php
    session_start();
    unset($_SESSION['ulogin'],$_SESSION['nome'],$_SESSION['email'], $_SESSION['senha'], $_SESSION['nivel-acesso'], $_SESSION['manter'], $_SESSION['checked']);         
    $_SESSION['msg'] = "<p style='font-size: 18px; color: green'>Deslogado com sucesso!</p>";
    header('location: ../index.php');
?>