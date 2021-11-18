<?php 
    
    session_start();
    include_once("../conexao.php");

    if (isset($_SESSION['conteudo_gerencial'])){
        $conteudo_gerencial = $_SESSION['conteudo_gerencial'];
        $titulo_gerencial = $_SESSION['titulo_gerencial'];

        $result = <<<EOT
        INSERT INTO relatorios (titulo, tipo_relatorio, conteudo, data_relatorio) VALUES ('$titulo_gerencial', 'Gerencial', '$conteudo_gerencial', NOW())
        EOT;
        $resultado = mysqli_query($conn, $result);

        unset($_SESSION['conteudo_gerencial'], $_SESSION['titulo_gerencial']);
    }

    if(mysqli_insert_id($conn)){
        echo "
        <script>
            alert('Relatório salvo com sucesso!');
            location.href='relatoriogerencial.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Erro ao salvar.');
            location.href='relatoriogerencial.php';
        </script>
        ";
    }
?>