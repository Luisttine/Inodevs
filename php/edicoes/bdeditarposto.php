<?php
    session_start();
    include_once("../conexao.php");

    $nome_posto = $_POST['nome_posto'];
    $descricao = $_POST['descricao'];
    $escala = $_POST['escala'];
    $numero_colab = $_POST['numero_colab'];
    $id = $_POST['id'];

    $result_cliente = "UPDATE postos_de_trabalho SET nome_posto ='$nome_posto', descricao=' $descricao', escala='$escala', numero_colab ='$numero_colab ' WHERE  id='$id'";
    $resultado_cliente = mysqli_query($conn, $result_cliente);

    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Posto de trabalho editado com sucesso!');
            location.href='edicoes.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Falha ao editar.');
            location.href='editarposto?id=$id.php';
        </script>
        ";
    }
?>