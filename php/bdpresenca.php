<?php
    session_start();
    include_once("conexao.php");

	$relatorio = $_POST['relatorio'];

    $result = "INSERT INTO presenca (relatorio, data_tempo, presenca) VALUES ('$relatorio', NOW(),'P')";
    $resultado = mysqli_query($conn, $result);

    header("Location: presenca.php");
?>
