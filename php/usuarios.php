<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../css/usuarios.css">
</head>

<body>
    <div class="m-box">
        <a href="../html/controle.html"><input  id="btn-submit1" type="submit" value="Retornar"></a>
    </div>
    <br><br><br>

    <div id="main-container">
        <h1>Cadastro de usuário</h1><BR>

        <form id="register-form" method="POST" action="bdusuarios">
         
            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome" required>
            </div>

            <div class="half-box spacing">
                <label for="endereço">Login</label>
                <input type="text" name="login" id="login" placeholder="Ex:1524642597" required>
            </div>
      
            <div class="half-box">
                <label for="cpf">Email</label><br>
                <input type="email" name="email" id="email" placeholder="Ex.:julia@gmail.com" required>
            </div>

            <div class="half-box">
                <label for="funcao">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite a senha" required>
            </div>   
            <div id="btn-submit">
                <input type="submit" value="Cadastrar">   
            </div><br><br>
        </form>
    
    </div>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="left"></div>   
</body>
</html>