<?php

    include_once('../conexao.php');

    $id = $_GET['id'];

    $sql_code = "SELECT * FROM relatorios WHERE id=$id";
    $sql_query = $conn->query($sql_code) or die($mysqli->error);
    $linha = $sql_query->fetch_assoc();

    echo $linha['conteudo'];
?>