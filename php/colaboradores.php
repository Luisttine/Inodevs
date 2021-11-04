<?php
    session_start();
    include_once("conexao.php");
    $sql_code_posto = "SELECT * FROM presenca_posto";
    $sql_query_posto = $conn->query($sql_code_posto) or die($mysqli->error);
    $linha_posto = $sql_query_posto->fetch_assoc();
    $sql_code_flutuante = "SELECT * FROM flutuante";
    $sql_query_flutuante = $conn->query($sql_code_flutuante) or die($mysqli->error);
    $linha_flutuante = $sql_query_flutuante->fetch_assoc();
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
        echo <<<EOT
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/colaboradores.css">
                <title>Colaboradores</title>
            </head>
            <body>
                <div class="m-box">
                    <a href="controle.php"><input  id="btn-submit1" type="submit" value="Retornar"></a>
                </div>
                <br><br><br>
                <div id="main-container">
                    <h1>Cadastro de Colaborador</h1><BR>
                    <form  method="POST" action="bdcolaborador.php">
                        <div class="full-box">
                        <label for="name">Nome Completo</label>
                        <input type="text" name="nome_completo" placeholder="Digite o nome completo" required>
                        </div>
                        <div class="half-box spacing">
                            <label for="endereço">Matricula</label>
                            <input type="text" name="matricula" placeholder="Ex: 1502556561" required>
                        </div>
                        <div class="half-box">
                            <label for="situacao">Situação do Cadastro</label>
                            <div class="table_cell table_title two">
                                <select name="situacao" required>
                                    <option value="" disabled selected hidden>Selecione uma situação de cadastro...</option>
                                    <option>Em admissão</option>
                                    <option>Empregado</option>
                                    <option>Em demissão</option>  
                                </select>
                            </div>
                        </div>
                        <div class="half-box">
                            <label for="cpf">CPF</label><br>
                            <input type="text" name="cpf" placeholder="Ex.: 000.000.000-00" required>
                        </div>
                        <div class="half-box">
                            <label for="funcao">Função</label>
                            <input type="text" name="funcao" placeholder="Digite a função" required>
                        </div>
                        <div class="half-box">
                            <label for="data_adimissao">Data de adimissão</label>
                            <input type="date" name="data_admissao" placeholder="Ex.: 10/10/2020" required>
                        </div>
                        <div class="half-box">
                            <label for="data_demissao">Data de demissão</label>
                            <input type="date" name="data_demissao" placeholder="Ex.: 11/10/2020" required>
                        </div>
                        <div class="half-box">
                            <label for="tipo_cobertura">Tipo de cobertura</label>
                            <div class="table_cell table_title two">
                                <select name="tipo_cobertura" required>
                                    <option value="" disabled selected hidden>Selecione um tipo de cobertura...</option>
                                    <option>Fixo</option>
                                    <option>Flutuante</option>          
                                </select>
                                <br><br>
                            </div>
                        </div>
                        <div class="half-box">
                            <label for="posto_trabalho">Posto de Trabalho</label>
                            <div class="table_cell table_title two">
                                <select name="posto_trabalho" required> 
                                    <option value="" disabled selected hidden>Selecione um posto de trabalho...</option>
        EOT;
                        do {
                            $linha_posto_posto = $linha_posto['posto_de_trabalho'];
                            echo "<option> $linha_posto_posto</option>";
                        } while($linha_posto=$sql_query_posto->fetch_assoc());
        echo <<<EOT
                                </select>
                                <br><br>
                            </div>
                        </div>
                    <div class="half-box">
                        <label for="flutuante">Flutuante Substituto</label>
                        <div class="table_cell table_title two">
                            <select name="flutuante" required> 
                                <option value="" disabled selected hidden>Selecione um flutuante...</option>
        EOT;
                    do {
                        $linha_flutuante_flutuante = $linha_flutuante['nome_completo'];
                        echo "<option> $linha_flutuante_flutuante</option>";
                    } while($linha_flutuante=$sql_query_flutuante->fetch_assoc());
        echo <<<EOT
                            </select>
                        <br><br>
                        </div>
                    </div>
                <div class="middle-box">
                    <input type="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    EOT;
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    echo <<<EOT
            <div class="left">      
            </div>
        </body>
        </html>
        EOT;
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px'> Você não tem permissão!</p>";
        header('location: presenca.php');
    }
    } else {
        $_SESSION['msg'] = "<p style='color: red; font-size: 18px'> Você precisa estar logado!</p>";
        header('location: ../index.php');
    }
?>