 <?php   
    
    session_start();
    include_once("../conexao.php");

    if(isset($_SESSION['conteudo_quadro'])){
        $conteudo_quadro = $_SESSION['conteudo_quadro'];
        $titulo_quadro = $_SESSION['titulo_quadro'];

        $result = <<<EOT
        INSERT INTO relatorios (titulo, tipo_relatorio, conteudo, data_relatorio) VALUES ('$titulo_quadro', 'Quadro de Presenca', '$conteudo_quadro', NOW())
        EOT;
        $resultado = mysqli_query($conn, $result);

        unset($_SESSION['conteudo_quadro'], $_SESSION['titulo_quadro']);
    }
    
    if(mysqli_insert_id($conn)){
        echo "
        <script>
            alert('Relatório salvo com sucesso!');
            location.href='relatorioquadro.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Erro ao salvar.');
            location.href='relatorioquadro.php';
        </script>
        ";
    }
?>