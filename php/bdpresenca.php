<?php
    session_start();
    include_once("conexao.php");

    $dia = "d" . date("j");
    $nome = $_SESSION['nome'];

    $sql_code = "SELECT * FROM presenca WHERE colaborador='$nome'";
    $sql_query = $conn->query($sql_code) or die($mysqli->error);
    $linha = $sql_query->fetch_assoc();

    if ($linha[$dia] == "P"){
        header("Location: presenca.php");
        $_SESSION['msg'] = "<br><p style='color: blue; text-align: center'>Sua presença já foi marcada hoje!</p>";
    } else {    
        $result = "UPDATE presenca SET $dia = 'P' WHERE colaborador = '$nome' LIMIT 1";
        $resultado = mysqli_query($conn, $result);
        if(mysqli_affected_rows($conn)){
            header("Location: presenca.php");
            $_SESSION['msg'] = "<br><p style='color: green; text-align: center'>Presença marcada com sucesso!</p>";
        } else {
            header("Location: presenca.php");
            $_SESSION['msg'] = "<br><p style='color: red; text-align: center'>Erro ao marcar a presença.</p>";
        }
    }
?>