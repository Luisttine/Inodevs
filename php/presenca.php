<?php
    session_start();
    $nome = $_SESSION['nome'];
    $nivel_acesso = $_SESSION['nivel_acesso'];
    $ulogin = $_SESSION['ulogin'];
    $email = $_SESSION['email'];
    if($nivel_acesso == 2){
        $nivel_ac = "Tático";
    }else{
        $nivel_ac= "Operacional";
    }
    if(!empty($_SESSION['ulogin'])){
        echo <<<EOT
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../css/presenca.css">
                    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
                    <link rel="stylesheet" href="../css/sidebar.css">
                    <title>Presença</title>
                </head>
                <body>
                    <!-- jQuery -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <div class="fundo" >
                        <div class="container">
                            <div class="op">
                                <div id="perfil">$nome</div>
                                <div id="info" style = "display:none">
                                Login: $ulogin <br>
                                Email: $email <br>
                                Nível de acesso: $nivel_ac <br>
                                </div><br>
                            </div>
                                <div class = "caixa">
                                    <div id= "meurelogio" class="relogio" onload="Tempo()"></div>
                                    <script src="../js/relogio.js"></script>
                                </div>
                        
                                <div class = "bloco">
                                    <h1>Marque sua presença: </h1>
                                <form method ="POST" action="bdpresenca.php">
                                    <input id="botao" type="submit" value="Marcar" class="yellow">
                                </form>
                EOT;
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            echo <<<EOT
                                </div>
                            </div>
                    </div>
                    <div class="sidebar">
                <div class="logo_content">
                    <i class='bx bx1-c-plus-plus'></i>
                    <i class='bx bx-menu' id="btn"></i>
                </div>
                <ul class="nav_list">
                    <li>
                        <a href="../php/presenca.php">
                        <i class='bx bx-check-square' id="btn1"></i>
                            <span class="links_name">Presenças</span>
                        </a>
                        <span class="tooltip">Presenças</span>
                    </li>
                EOT;
                if ($nivel_acesso == 2){
                echo <<<EOT
                <li>
                <a href="../php/controle.php">
                    <i class='bx bx-user' id="btn1"></i>
                    <span class="links_name">Perfis</span>
                </a>
                <span class="tooltip">Perfis</span>
                </li>
                <li>
                    <a href="../php/quadropresenca/quadropresenca.php">
                        <i class='bx bx-clipboard' id="btn1"></i>
                        <span class="links_name">Relatório</span>
                    </a>
                    <span class="tooltip">Relatório</span>
                </li>
                <li>
                <a href="../php/edicoes/edicoes.php">
                    <i class='bx bx-edit-alt' id="btn1"></i>
                    <span class="links_name">Edições</span>
                </a>
                <span class="tooltip">Edições</span>
                </li> 
                EOT;
                }
            echo <<<EOT
            <li>
                <a href="../html/paginodevs.html">
                    <i class='bx bx-code-alt' id="btn1"></i>
                    <span class="links_name">Inodevs</span>
                </a>
                <span class="tooltip">Inodevs</span>
            </li>
            <li>
            <a href="../php/sair.php">
                <i class='bx bx-exit' id="btn1"></i>
                <span class="links_name">Sair</span>
            </a>
            <span class="tooltip">Sair</span>
        </li>
        </ul>
        <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        $("div#perfil").click(function(){
        $("div#info").slideToggle();
        });
        </script>
        </body>
        </html>
        EOT;
        } else {
            $_SESSION['msg'] = "<p style='color: red; font-size: 18px'> Você precisa estar logado!</p>";
            header('location: ../index.php');
        }
?>
