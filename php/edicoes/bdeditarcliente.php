<?php
    session_start();
    include_once("../conexao.php");

    $razao_social = $_POST['razao_social'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $contato = $_POST['contato'];
    $id = $_POST['id'];
   


    $result_cliente = "UPDATE clientes SET razao_social ='$razao_social',nome_fantasia ='$nome_fantasia', cnpj='$cnpj', endereco='$endereco', contato='$contato' WHERE  id='$id'";
    $resultado_cliente = mysqli_query($conn, $result_cliente);

    if(mysqli_affected_rows($conn)){
        echo "
        <script>
            alert('Cliente editado com sucesso!');
            location.href='edicoes.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Falha ao editar.');
            location.href='editarcliente?id=$cnpj.php';
        </script>
        ";
    }
?>