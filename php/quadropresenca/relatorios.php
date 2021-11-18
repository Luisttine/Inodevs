<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/edicoes.css">
    <title>Relatórios</title>
</head>
<body>
    <?php
        session_start();
        include("../conexao.php");

        $sql_code_quadro = "SELECT * FROM relatorios WHERE tipo_relatorio='Quadro de Presenca' ORDER BY id desc";
        $sql_query_quadro = $conn->query($sql_code_quadro) or die($mysqli->error);
        $linha_quadro = $sql_query_quadro->fetch_assoc();

        $sql_code_gerencial = "SELECT * FROM relatorios WHERE tipo_relatorio='Gerencial' ORDER BY id desc";
        $sql_query_gerencial = $conn->query($sql_code_gerencial) or die($mysqli->error);
        $linha_gerencial = $sql_query_gerencial->fetch_assoc();
    ?>
    <a href="quadropresenca.php" id="btn-submit1">Retornar</a>
    <h1>Histórico de Relatórios</h1>
    <nav class="navabas">
        <ul>
            <li>
                <input type="radio" name="aba" class="radio_aba" id="aba1" checked>
                <label for="aba1">Quadro de Presenças</label>
                <div class="content">
                    <article>
            <?php
                if(empty($linha_quadro['id'])){
                    echo "<p>Não há relatórios de quadro de presença salvos</p>";
                } else {
                    do{
            ?>
                        <p><strong><?php echo $linha_quadro['titulo']?></strong></p>
                        <p>Criado em: 
                            <?php 
                                if(isset($linha_quadro['data_relatorio'])){
                                    $d = explode(" ",$linha_quadro['data_relatorio']) ;
                                    $data = explode("-",$d[0]);
                                    echo "$data[2]/$data[1]/$data[0] às $d[1]";
                                }
                            ?></p>
                        <a target="_blank" href="mostrarrelatorio.php?id=<?php echo $linha_quadro['id'] ?>" class="blue">Abrir Relatório</a><br>
                        <a href="javascript: if(confirm('Tem certeza que deseja deletar esse relatório de quadro de presença?')) 
                        location.href='deletarrelatorio.php?id=<?php echo $linha_quadro['id'] ?>';" class="red">Deletar Relatório</a><br>
                        <hr>
            <?php
                    } while($linha_quadro=$sql_query_quadro->fetch_assoc());
                }
            ?>
                    </article>
                </div>
            </li>
            <li>
                <input type="radio" name="aba" class="radio_aba" id="aba2">
                <label for="aba2">Gerencial</label>
                <div class="content">
                    <article>
            <?php
                if(empty($linha_gerencial['id'])){
                    echo "<p>Não há relatórios gerenciais salvos</p>";
                } else {
                    do{
            ?>
                        <p><strong><?php echo $linha_gerencial['titulo']?></strong></p>
                        <p>Criado em: 
                        <?php
                            if(isset($linha_gerencial['data_relatorio'])){
                                $d = explode(" ",$linha_gerencial['data_relatorio']) ;
                                $data = explode("-",$d[0]);
                                echo "$data[2]/$data[1]/$data[0] às $d[1]";
                            }
                        ?>
                        </p>
                        <a target="_blank" href="mostrarrelatorio.php?id=<?php echo $linha_gerencial['id']?>" class="blue">Abrir Relatório</a><br>
                        <a href="javascript: if(confirm('Tem certeza que deseja deletar esse relatório gerencial?')) 
                        location.href='deletarrelatorio.php?id=<?php echo $linha_gerencial['id'] ?>';" class="red">Deletar Relatório</a><br>
                        <hr>
            <?php
                    }while($linha_gerencial=$sql_query_gerencial->fetch_assoc());
                }
            ?>
                    </article>
            </li>
        <ul>
    </nav>
    <div class="left"></div>
</body>
</html>