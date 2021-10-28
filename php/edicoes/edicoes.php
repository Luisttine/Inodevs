<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/edicoes.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/sidebar.css">
    <title>Edições</title>
    <?php
        session_start();
        include("../conexao.php");
        $sql_code = "SELECT * FROM usuarios";
        $sql_query = $conn->query($sql_code) or die($mysqli->error);
        $linha = $sql_query->fetch_assoc();
        $sql_code_contrato = "SELECT * FROM contratos";
        $sql_query_contrato = $conn->query($sql_code_contrato) or die($mysqli->error);
        $linha_contrato = $sql_query_contrato->fetch_assoc();
        $sql_code_colaborador = "SELECT * FROM colaboradores";
        $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
        $linha_colaborador = $sql_query_colaborador->fetch_assoc();
        $sql_code_clientes = "SELECT * FROM clientes";
        $sql_query_clientes = $conn->query($sql_code_clientes) or die($mysqli->error);
        $linha_clientes = $sql_query_clientes->fetch_assoc();
        $sql_code_posto = "SELECT * FROM postos_de_trabalho";
        $sql_query_posto = $conn->query($sql_code_posto) or die($mysqli->error);
        $linha_posto = $sql_query_posto->fetch_assoc();
        $sql_code_alocacoes= "SELECT * FROM alocacoes";
        $sql_query_alocacoes = $conn->query($sql_code_alocacoes) or die($mysqli->error);
        $linha_alocacoes= $sql_query_alocacoes->fetch_assoc();
        $nome = $_SESSION['nome'];
        $nivel_acesso = $_SESSION['nivel_acesso'];
        $ulogin = $_SESSION['ulogin'];
        $email = $_SESSION['email'];
        if($nivel_acesso == 2){
            $nivel_ac = "Tático";
        }else{
            $nivel_ac= "Operacional";
        }
    ?>
</head>
<body>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="op">
        <div id="perfil"><?php echo $nome?></div>
        <div id="info" style = "display:none">
        Login: <?php echo$ulogin ?><br>
        Email: <?php echo$email ?><br>
        Nível de acesso: <?php echo$nivel_ac ?><br>
        </div><br>
    </div>
    <div class="lados">
        <h1>Edições</h1>
        <nav class="navabas">
            <ul>
                <li>
                    <input type="radio" name="aba" class="radio_aba" id="aba1" checked>
                    <label for="aba1">Usuários</label>
                    <div class="content">
                        <article>
                        <table>
                        <tr>
                            <td class="titulo">Nome</td>
                            <td class="titulo">Login</td>
                            <td class="titulo">E-mail</td>
                            <td class="titulo">Nível de Acesso</td>
                            <td class="titulo">Ação</td>
                        </tr>
                <?php
                    do{
                ?>
                        <tr>
                            <td><?php echo $linha['nome'] ?></td>
                            <td><?php echo $linha['ulogin'] ?></td>
                            <td><?php echo $linha['email'] ?></td>
                            <td><?php echo $linha['nivel_acesso'] ?></td></td>
                            <td>
                                <a href="editarusuario.php?id=<?php echo $linha['ulogin'] ?>" class="editar">Editar </a> |
                                <a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $linha['nome'] ?>?')) 
                                location.href='deletarusuario.php?id=<?php echo $linha['ulogin'] ?>';" class="deletar"> Deletar</a>
                             </td>
                        </tr>
                <?php
                    } while($linha=$sql_query->fetch_assoc());
                ?>
                        </table>
                        </article>
                    </div>
                </li>
                <li>
                    <input type="radio" name="aba" class="radio_aba" id="aba2" <?php if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'contrato'){echo 'checked';}}?>>
                    <label for="aba2">Contratos</label>
                    <div class="content">
                        <article>
                        <table>
                        <tr>
                            <td class="titulo">Numero</td>
                            <td class="titulo">Cliente</td>
                            <td class="titulo">Valor</td>
                            <td class="titulo">Posto de Trabalho</td>
                            <td class="titulo">Escala</td>
                            <td class="titulo">Ação</td>
                        </tr>
                <?php
                    do{
                ?>
                        <tr>
                            <td><?php echo $linha_contrato['numero'] ?></td>
                            <td><?php echo $linha_contrato['cliente'] ?></td>
                            <td><?php echo $linha_contrato['valor'] ?></td>
                            <td><?php echo $linha_contrato['posto_trabalho'] ?></td>
                            <td><?php echo $linha_contrato['escala'] ?></td>
                            <td>
                                <a href="editarcontrato.php?id=<?php echo $linha_contrato['numero'] ?>" class="editar">Editar </a> |
                                <a href="javascript: if(confirm('Tem certeza que deseja deletar o contrato de número <?php echo $linha_contrato['numero'] ?>?')) 
                                location.href='deletarcontrato.php?id=<?php echo $linha_contrato['numero'] ?>';" class="deletar"> Deletar</a>
                             </td>
                        </tr>
                <?php
                    } while($linha_contrato=$sql_query_contrato->fetch_assoc());
                ?>
                        </table>
                        </article>
                    </div>
                </li>
                <li>
                    <input type="radio" name="aba" class="radio_aba" id="aba3" <?php if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'colaboradores'){echo 'checked';}}?>>
                    <label for="aba3">Colaboradores</label>
                    <div class="content">
                        <article>
                        <table>
                        <tr>
                            <td class="titulo">CPF</td>
                            <td class="titulo">Matrícula</td>
                            <td class="titulo">Nome Completo</td>
                            <td class="titulo">Data de Admissão</td>
                            <td class="titulo">Data de Demissão</td>
                            <td class="titulo">Situação do Cadastro</td>
                            <td class="titulo">Função</td>
                            <td class="titulo">Tipo de Cobertura</td>
                            <td class="titulo">Posto de Trabalho</td>
                            <td class="titulo">Ação</td>
                        </tr>
                <?php
                    do{
                ?>
                        <tr>
                            <td><?php echo $linha_colaborador['cpf'] ?></td>
                            <td><?php echo $linha_colaborador['matricula'] ?></td>
                            <td><?php echo $linha_colaborador['nome_completo'] ?></td>
                            <td><?php echo $linha_colaborador['data_admissao'] ?></td>
                            <td><?php echo $linha_colaborador['data_demissao'] ?></td>
                            <td><?php echo $linha_colaborador['situacao_cadastro'] ?></td>
                            <td><?php echo $linha_colaborador['funcao'] ?></td>
                            <td><?php echo $linha_colaborador['tipo_cobertura'] ?></td>
                            <td><?php echo $linha_colaborador['posto_trabalho'] ?></td>
                            <td>
                                <a href="editarcolaborador.php?id=<?php echo $linha_colaborador['matricula'] ?>" class="editar">Editar </a>
                                <a href="javascript: if(confirm('Tem certeza que deseja deletar o colaborador <?php echo $linha_colaborador['nome_completo'] ?>?')) 
                                location.href='deletarcolaborador.php?id=<?php echo $linha_colaborador['matricula'] ?>';" class="deletar"> Deletar</a>
                             </td>
                        </tr>
                <?php
                    } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
                ?>
                        </table>
                        </article>
                    </div>
                </li>
                <li>
                    <input type="radio" name="aba" class="radio_aba" id="aba4" <?php if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'cliente'){echo 'checked';}}?>>
                    <label for="aba4">Clientes</label>
                    <div class="content">
                        <article>
                        <table>
                        <tr>
                            <td class="titulo">Razão Social</td>
                            <td class="titulo">Nome Fantasia</td>
                            <td class="titulo">CNPJ</td>
                            <td class="titulo">Endereço</td>
                            <td class="titulo">Contato</td>
                            <td class="titulo">Ação</td>
                        </tr>
                <?php
                    do{
                ?>
                        <tr>
                            <td><?php echo $linha_clientes['razao_social'] ?></td>
                            <td><?php echo $linha_clientes['nome_fantasia'] ?></td>
                            <td><?php echo $linha_clientes['cnpj'] ?></td>
                            <td><?php echo $linha_clientes['endereco'] ?></td>
                            <td><?php echo $linha_clientes['contato'] ?></td>
                            <td>
                                <a href="editarcliente.php?id=<?php echo $linha_clientes['id'] ?>" class="editar">Editar </a> |
                                <a href="javascript: if(confirm('Tem certeza que deseja deletar o cliente <?php echo $linha_clientes['nome_fantasia'] ?>?')) 
                                location.href='deletarcliente.php?id=<?php echo $linha_clientes['id'] ?>';" class="deletar"> Deletar</a>
                             </td>
                        </tr>
                <?php
                    } while($linha_clientes=$sql_query_clientes->fetch_assoc());
                ?>
                        </table>
                        </article>
                    </div>
                </li>
                <li>
                    <input type="radio" name="aba" class="radio_aba" id="aba5" <?php if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'posto'){echo 'checked';}}?>>
                    <label for="aba5">Postos de Trabalho</label>
                    <div class="content">
                    <article>
                        <table>
                        <tr>
                            <td class="titulo">Nome do Posto</td>
                            <td class="titulo">Descrição</td>
                            <td class="titulo">Escala</td>
                            <td class="titulo">Número de Colaboradores</td>
                            <td class="titulo">ID</td>
                            <td class="titulo">Ação</td>
                        </tr>
                <?php
                    do{
                ?>
                        <tr>
                            <td><?php echo $linha_posto['nome_posto'] ?></td>
                            <td><?php echo $linha_posto['descricao'] ?></td>
                            <td><?php echo $linha_posto['escala'] ?></td>
                            <td><?php echo $linha_posto['numero_colab'] ?></td>
                            <td><?php echo $linha_posto['id'] ?></td>
                            <td>
                                <a href="editarposto.php?id=<?php echo $linha_posto['id'] ?>" class="editar">Editar </a> |
                                <a href="javascript: if(confirm('Tem certeza que deseja deletar o posto de trabalho <?php echo $linha_posto['nome_posto'] ?>?')) 
                                location.href='deletarposto.php?id=<?php echo $linha_posto['id'] ?>';" class="deletar"> Deletar</a>
                             </td>
                        </tr>
                <?php
                    } while($linha_posto=$sql_query_posto->fetch_assoc());
                ?>
                        </table>
                        </article>
                    </div>
                </li>
                <li>
                    <input type="radio" name="aba" class="radio_aba" id="aba6" <?php if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'alocacao'){echo 'checked';}}?>>
                    <label for="aba6">Alocações</label>
                    <div class="content">
                    <article>
                        <table>
                        <tr>
                            <td class="titulo">Nome do Colaborador</td>
                            <td class="titulo">Associção</td>
                            <td class="titulo">Tipo de Cobertura</td>
                            <td class="titulo">ID</td>
                            <td class="titulo">Ação</td>
                        </tr>
                <?php
                    do{
                ?>
                        <tr>
                            <td><?php echo $linha_alocacoes['nome'] ?></td>
                            <td><?php echo $linha_alocacoes['associacao'] ?></td>
                            <td><?php echo $linha_alocacoes['tipo_de_cobertura'] ?></td>
                            <td><?php echo $linha_alocacoes['id'] ?></td>
                            <td>
                                <a href="editaralocacao.php?id=<?php echo $linha_alocacoes['id'] ?>" class="editar">Editar </a> |
                                <a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $linha_alocacoes['nome'] ?>?')) 
                                location.href='deletaralocacao.php?id=<?php echo $linha_alocacoes['id'] ?>';" class="deletar"> Deletar</a>
                             </td>
                        </tr>
                <?php
                    } while($linha_alocacoes=$sql_query_alocacoes->fetch_assoc());
                ?>
                        </table>
                        </article>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

        <div class="sidebar">
                    <div class="logo_content">
                        <i class='bx bx1-c-plus-plus'></i>
                        <i class='bx bx-menu' id="btn"></i>
                    </div>
                    <ul class="nav_list">
                        <li>
                        <a href="../presenca.php">
                        <i class='bx bx-check-square' id="btn1"></i>
                            <span class="links_name">Presenças</span>
                        </a>
                        <span class="tooltip">Presenças</span>
                        </li>
                        <li>
                        <a href="../controle.php">
                        <i class='bx bx-user' id="btn1"></i>
                            <span class="links_name">Perfis</span>
                        </a>
                        <span class="tooltip">Perfis</span>
                        </li>
                        <li>
                            <a href="../quadropresenca/quadropresenca.php">
                                <i class='bx bx-clipboard' id="btn1"></i>
                                <span class="links_name">Relatório</span>
                            </a>
                            <span class="tooltip">Relatório</span>
                        </li>
                        <li>
                            <a href="edicoes.php">
                                <i class='bx bx-edit-alt' id="btn1"></i>
                                <span class="links_name">Edições</span>
                            </a>
                            <span class="tooltip">Edições</span>
                        </li> 
                        <li>
                            <a href="../sair.php">
                                <i class='bx bx-exit' id="btn1"></i>
                                <span class="links_name">Sair</span>
                            </a>
                            <span class="tooltip">Sair</span>
                        </li>
                    </ul>
        </div>
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
        <?php
            unset($_SESSION['checked']);
        ?>
</body>
</html>