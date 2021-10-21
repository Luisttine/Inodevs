<?php
    session_start();
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
                <title>Alocações</title>
                <link rel="stylesheet" href="../css/alocacoes.css">
            </head>
            <body>
                <div class="m-box">
                    <a href="controle.php"><input  id="btn-submit1" type="submit" value="Retornar"></a>
                </div>
                <br><br><br>
                <div id="main-container">
                    <h1>Alocações</h1><BR>
                    <form id="register-form" method="POST" action="bdalocacoes.php">
                        <div class="full-box">
                            <label for="name">Associação do colaborador com o posto</label>
                            <input type="text" name="associacao" id="associacao"  required>
                        </div>
                        <div class="half-box">
                            <label for="tipo_de_cobertura">Tipo de cobertura</label>
                            <div class="table_cell table_title two">
                                <select name="tipo_de_cobertura" required>
                                    <option value="" disabled selected hidden>Selecione um tipo de cobertura...</option>
                                    <option>Fixo</option>
                                    <option>Flutuante</option>          
                                </select>
                            </div>
                        </div>
            <br><br>
                        <div class="middle-box">
                            <input id="btn-submit" type="submit" value="Cadastrar">
                        </div>
                    </form>
                </div>
            EOT;
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            echo <<< EOT
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