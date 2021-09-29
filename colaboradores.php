<?php
    session_start();
?>
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
        <a href="../html/controle.html"><input  id="btn-submit1" type="submit" value="Retornar"></a>
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
                    <select name="situacao">
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
            
                    <select name="tipo_cobertura">
                        <option value="" disabled selected hidden>Selecione um tipo de cobertura...</option>
                        <option>Fixo</option>
                        <option>Flutuante</option>          
                    </select>
                    <br><br>
                    <div class="middle-box">
                        <input type="submit" value="Cadastrar">
                    </div>
                </div>
            </div>
        </form>
    </div>


  <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="left">
        <div class="barra">
            <nav>
                <a href="./presenca.php"><div class="link" id="selected"><img src="../img/calendar.png" alt=""></div></a>
                <a href="../html/controle.html"><div class="link"><img src="../img/notebook.png" ></div></a>
            </nav>
        </div>
    </div>
</body>
</html>