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
        if($nivel_acesso == 2){
        echo <<<EOT
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
        EOT;
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
        echo <<<EOT
            </head>
            <body>
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
        EOT;
                                do{
                                $linha_nome=$linha['nome'];
                                $linha_ulogin=$linha['ulogin'];
                                $linha_email=$linha['email'];
                                $linha_nivel_acesso=$linha['nivel_acesso'];
        echo <<<EOT
                                    <tr>
                                        <td>$linha_nome</td>
                                        <td>$linha_ulogin</td>
                                        <td>$linha_email</td>
                                        <td>$linha_nivel_acesso</td></td>
                                        <td>
                                            <a href="editarusuario.php?id=$linha_ulogin" class="editar">Editar </a> |
                                            <a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário  $linha_nome?')) 
                                            location.href='deletarusuario.php?id=$linha_ulogin';" class="deletar"> Deletar</a>
                                        </td>
                                    </tr>
        EOT;
                                } while($linha=$sql_query->fetch_assoc());
        echo <<<EOT
                                        </table>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <input type="radio" name="aba" class="radio_aba" id="aba2" 
                                EOT;  if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'contrato'){echo 'checked';}}echo <<<EOT
                                >
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
                            EOT;
                                do{
                                    $linha_contrato_numero=$linha_contrato['numero'];
                                    $linha_contrato_nome_fantasi=$linha_contrato['nome_fantasi'];
                                    $linha_contrato_valor=$linha_contrato['valor'];
                                    $linha_contrato_posto_trabalho=$linha_contrato['posto_trabalho'];
                                    $linha_contrato_escala=$linha_contrato['escala'];
                            echo <<<EOT
                                    <tr>
                                        <td>$linha_contrato_numero</td>
                                        <td>$linha_contrato_nome_fantasi</td>
                                        <td>$linha_contrato_valor</td>
                                        <td>$linha_contrato_posto_trabalho</td>
                                        <td>$linha_contrato_escala</td>
                                        <td>
                                            <a href="editarcontrato.php?id=$linha_contrato_numero" class="editar">Editar </a> |
                                            <a href="javascript: if(confirm('Tem certeza que deseja deletar o contrato de número$linha_contrato_numero?')) 
                                            location.href='deletarcontrato.php?id=$linha_contrato_numero';" class="deletar"> Deletar</a>
                                        </td>
                                    </tr>
                            EOT;
                                } while($linha_contrato=$sql_query_contrato->fetch_assoc());
                            echo <<<EOT
                                        </table>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <input type="radio" name="aba" class="radio_aba" id="aba3" 
                                EOT; if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'colaboradores'){echo 'checked';}}
                                echo <<<EOT
                                >
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
                                EOT;
                                do{
                                    $linha_colaborador_cpf=$linha_colaborador['cpf'];
                                    $linha_colaborador_matricula=$linha_colaborador['matricula'];
                                    $linha_colaborador_nome_completo=$linha_colaborador['nome_completo'];
                                    $linha_colaborador_data_admissao=$linha_colaborador['data_admissao'];
                                    $linha_colaborador_data_demissao=$linha_colaborador['data_demissao'];
                                    $linha_colaborador_situacao_cadastro=$linha_colaborador['situacao_cadastro'];
                                    $linha_colaborador_funcao=$linha_colaborador['funcao'];
                                    $linha_colaborador_tipo_cobertura=$linha_colaborador['tipo_cobertura'];
                                    $linha_colaborador_posto_trabalho=$linha_colaborador['posto_trabalho'];
                                echo <<<EOT
                                    <tr>
                                        <td>$linha_colaborador_cpf</td>
                                        <td>$linha_colaborador_matricula</td>
                                        <td>$linha_colaborador_nome_completo</td>
                                        <td>$linha_colaborador_data_admissao</td>
                                        <td>$linha_colaborador_data_demissao</td>
                                        <td>$linha_colaborador_situacao_cadastro</td>
                                        <td>$linha_colaborador_funcao</td>
                                        <td>$linha_colaborador_tipo_cobertura</td>
                                        <td>$linha_colaborador_posto_trabalho</td>
                                        <td>
                                            <a href="editarcolaborador.php?id=$linha_colaborador_matricula" class="editar">Editar </a>
                                            <a href="javascript: if(confirm('Tem certeza que deseja deletar o colaborador $linha_colaborador_nome_completo?')) 
                                            location.href='deletarcolaborador.php?id=$linha_colaborador_matricula';" class="deletar"> Deletar</a>
                                        </td>
                                    </tr>
                                EOT;
                                } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
                                echo <<<EOT
                                        </table>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <input type="radio" name="aba" class="radio_aba" id="aba4" 
                                EOT; if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'cliente'){echo 'checked';}}echo <<<EOT
                                >
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
                                        <td class="titulo">Id</td>
                                        <td class="titulo">Ação</td>
                                    </tr>
                                EOT;
                                do{
                                    $linha_clientes_razao_social=$linha_clientes['razao_social'];
                                    $linha_clientes_nome_fantasia=$linha_clientes['nome_fantasia'];
                                    $linha_clientes_cnpj=$linha_clientes['cnpj'];
                                    $linha_clientes_endereco=$linha_clientes['endereco'];
                                    $linha_clientes_contato=$linha_clientes['contato'];
                                    $linha_clientes_id=$linha_clientes['id'];
                                echo <<<EOT
                                    <tr>
                                        <td>$linha_clientes_razao_social</td>
                                        <td>$linha_clientes_nome_fantasia</td>
                                        <td>$linha_clientes_cnpj</td>
                                        <td>$linha_clientes_endereco</td>
                                        <td>$linha_clientes_contato</td>
                                        <td>$linha_clientes_id</td>
                                        <td>
                                            <a href="editarcliente.php?id=$linha_clientes_id" class="editar">Editar </a> |
                                            <a href="javascript: if(confirm('Tem certeza que deseja deletar o cliente $linha_clientes_nome_fantasia?')) 
                                            location.href='deletarcliente.php?id=$linha_clientes_id';" class="deletar"> Deletar</a>
                                        </td>
                                    </tr>
                                EOT;
                                } while($linha_clientes=$sql_query_clientes->fetch_assoc());
                                echo <<<EOT
                                        </table>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <input type="radio" name="aba" class="radio_aba" id="aba5" 
                                EOT; if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'posto'){echo 'checked';}}echo <<<EOT
                                >
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
                                EOT;
                                do{
                                    $linha_posto_nome_posto=$linha_posto['nome_posto'];
                                    $linha_posto_descricao=$linha_posto['descricao'];
                                    $linha_posto_escala=$linha_posto['escala'];
                                    $linha_posto_numero_colab=$linha_posto['numero_colab'];
                                    $linha_posto_id=$linha_posto['id'];
                                echo <<<EOT
                                    <tr>
                                        <td>$linha_posto_nome_posto</td>
                                        <td>$linha_posto_descricao</td>
                                        <td>$linha_posto_escala</td>
                                        <td>$linha_posto_numero_colab</td>
                                        <td>$linha_posto_id</td>
                                        <td>
                                            <a href="editarposto.php?id=$linha_posto_id" class="editar">Editar </a> |
                                            <a href="javascript: if(confirm('Tem certeza que deseja deletar o posto de trabalho $linha_posto_nome_posto?')) 
                                            location.href='deletarposto.php?id=$linha_posto_id';" class="deletar"> Deletar</a>
                                        </td>
                                    </tr>
                                EOT;
                                } while($linha_posto=$sql_query_posto->fetch_assoc());
                                echo <<<EOT
                                        </table>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <input type="radio" name="aba" class="radio_aba" id="aba6"
                                EOT; if(isset($_SESSION['checked'])){if ($_SESSION['checked'] == 'alocacao'){echo 'checked';}} echo <<<EOT
                                >
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
                            EOT;
                                do{
                                    $linha_alocacoes_nome=$linha_alocacoes['nome'];
                                    $linha_alocacoes_associacao=$linha_alocacoes['associacao'];
                                    $linha_alocacoes_tipo_de_cobertura=$linha_alocacoes['tipo_de_cobertura'];
                                    $linha_alocacoes_id=$linha_alocacoes['id'];
                            echo <<<EOT
                                    <tr>
                                        <td>$linha_alocacoes_nome</td>
                                        <td>$linha_alocacoes_associacao</td>
                                        <td>$linha_alocacoes_tipo_de_cobertura</td>
                                        <td>$linha_alocacoes_id</td>
                                        <td>
                                            <a href="editaralocacao.php?id=$linha_alocacoes_id" class="editar">Editar </a> |
                                            <a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário $linha_alocacoes_nome?')) 
                                            location.href='deletaralocacao.php?id=$linha_alocacoes_id';" class="deletar"> Deletar</a>
                                        </td>
                                    </tr>
                            EOT;
                                } while($linha_alocacoes=$sql_query_alocacoes->fetch_assoc());
                            echo <<<EOT
                                    </table>
                                    </article>
                                </div>
                            </li>
                        </ul>
                    </nav>
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
                                        <a href="../../html/paginodevs.html">
                                            <i class='bx bx-code-alt' id="btn1"></i>
                                            <span class="links_name">Inodevs</span>
                                        </a>
                                        <span class="tooltip">Inodevs</span>
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
                    </script>
                    EOT;
                        unset($_SESSION['checked']);
                    echo <<<EOT
                    </body>
                    </html>
                    EOT;
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px'> Você não tem permissão!</p>";
        header('location: ../presenca.php');
    }
    } else {
        $_SESSION['msg'] = "<p style='color: red; font-size: 18px'> Você precisa estar logado!</p>";
        header('location: ../../index.php');
                }
?>