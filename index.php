<?php
    session_start();
    include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Site</title>
</head>
<body>
<section class="container">
    <div class="blocos">
        <div class="left">
            JetSoft <br>Sempre com você!!
        </div>
    </div>

    <div class="blocos">
        <div class="right">
            <form method="POST" action="bdindex.php">
                <label for="">Email</label> <br><input type="email" name="email" placeholder="Digite seu email" required > <br>
                <label for="">Senha</label> <br><input type="password" name="senha" placeholder="Digite sua senha" required> <br>
                <button id="botao" type="submit">Acessar</button>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </form>       
        </div>
    </div>
</section>

<div class="referencia">
    <h2>Problemas com login? Mande um email para: jetsoft.contact@gmail.com  </h2>
</div>
</body>
</html>
