<?php
    session_start();
    $nome = $_SESSION['nome'];
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
        echo <<<EOT
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Quadro de Presenças</title>
            <link rel="stylesheet" href="../../css/quadro.css">
        </head>
        <body>
            <!-- jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        EOT;
            // Conectar ao banco e colocar os dados em uma variável (array)
            include("../conexao.php");
            $sql_code_colaborador = "SELECT * FROM presenca";
            $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
            $linha_colaborador = $sql_query_colaborador->fetch_assoc();
            $sql_code_posto = "SELECT * FROM presenca_posto";
            $sql_query_posto = $conn->query($sql_code_posto) or die($mysqli->error);
            $linha_posto = $sql_query_posto->fetch_assoc();
            // Início do contador para mecânica de clicar e aparecer
            $posto = 1;
            $colaborador = 1;
        // Mensagem de sucesso ou falha de alguma ação (editar/deletar)
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        echo <<<EOT
        <div class="voltar3"><a href="../controle.php">Retornar</a></div>
        <div class='principal'>
        <h1>Quadro de Presença</h1>
            <!-- Botão de deletar todas presenças com aviso de confirmação javascript-->
            <a href="javascript: if(confirm('Tem certeza que deseja deletar todos os registros de presença? Essa ação é apenas indicada para quando alterar o mês e todos os registros estiverem salvos em um backup/relatório. ')) 
            location.href='resetar.php'" class="resetar">Deletar os registros</a>
            <!-- Input de pesquisa -->
                <input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquisar posto de trabalho..." onkeyup="pesquisar()"> 
        EOT; 
        echo <<<EOT
            <!-- Início do quadro de presenças -->
            <table id="tabela">
                <tr>
                    <td id="titulo" rowspan="2"colspan="1">Posto de Trabalho</td>
        EOT;
                        // Identificador do mês atual
                        $mes = date("n");
                        $mes_extenso = array(0,
                            'Janeiro',
                            'Fevereiro',
                            'Marco',
                            'Abril',
                            'Maio',
                            'Junho',
                            'Julho',
                            'Agosto',
                            'Setembro',
                            'Outubro',
                            'Novembro',
                            'Dezembro'
                        );
                        $data = date('t');
                        echo "<td id='titulo' colspan='$data'>$mes_extenso[$mes]</td>";
                    echo <<<EOT
                        <td id="titulo" rowspan="2" colspan="2">Ação</td>
                    </tr>
                    <tr>
                    EOT;
                        // While para escrever a quantidade de dias do mês automaticamente
                        $n1 = 1;
                        while ($n1<=date('t')){
                            echo "<td id='titulo'>$n1</td>";
                            $n1++;
                        }
        echo <<<EOT
                </tr>
        EOT;
            do{
        echo <<<EOT
                        <tr class="item">
                            <!-- Colocar o valor do posto de trabalho automaticamente + id diferente para cada posto de trabalho -->
                            <td><div id="posto$posto"><div class="posto">
                    EOT . $linha_posto['posto_de_trabalho']. <<<EOT
                    </div></div></td>
                    EOT;
                        // Adicionando ao contador para criar um id diferente para o próximo posto
                        $posto++;
                        // Criando variáveis: $n2 para contar os dias e $dmnumero2 para adicionar o nome da coluna de dias
                        $n2 = 1;
                        $dnumero2 = 'd' . $n2;
                        // while para percorrer do dia 1 até o dia atual, adicionando P, E ou F (caso não esteja nem com presença e nem seja um evento, será colocado falta automaticamente)
                        while ($n2<=date('d')){
                            $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
                            $linha_colaborador = $sql_query_colaborador->fetch_assoc();
                            $presenca = 0;
                            do{
                                if ($linha_posto['posto_de_trabalho'] == $linha_colaborador['posto_de_trabalho']){
                                    if($linha_colaborador[$dnumero2] == 'P'){
                                        $presenca++;
                                    }
                                }
                            }while($linha_colaborador = $sql_query_colaborador->fetch_assoc());
                            if($presenca >= $linha_posto['numero_colab']){
                                echo "<td class='green'>P</td>";
                                $n2++;
                                $dnumero2 = 'd' . $n2;
                            }   
                            elseif ($linha_posto[$dnumero2] == 'P'){
                                echo "<td class='green'>P</td>";
                                echo $linha_posto['numero_colab'];
                                $n2++;
                                $dnumero2 = 'd' . $n2;
                            } elseif ($linha_posto[$dnumero2] == 'E'){
                                echo "<td class='blue'>E</td>";
                                $n2++;
                                $dnumero2 = 'd' . $n2;
                            } elseif ($n2 < date('d')) {
                                echo "<td class='red'>F</td>";
                                $n2++;
                                $dnumero2 = 'd' . $n2;
                            // Caso for o dia atual, ainda não é adicionado a falta automaticamente
                            } else {
                                echo "<td></td>";
                                $n2++;
                                $dnumero2 = 'd' . $n2;
                            }
                        }
                        // Depois do dia atual será adicionado campos vazios
                        while ($n2<=date('t')){
                            echo "<td></td>";
                            $n2++;
                        }

                        $linha_posto_posto = $linha_posto['posto_de_trabalho'];
                        $linha_posto_id = $linha_posto['id'];
            echo <<<EOT
                    <!-- Ação de editar de acordo com o id do posto -->
                    <td>
                        <a href="editarposto.php?id= $linha_posto_id" class="blue">Editar </a>
                    </td>
                    <!-- Ação de deletar de acordo com o id do posto + confirmação no javascript -->
                    <td>
                        <a href="javascript: if(confirm('Tem certeza que deseja deletar o posto de trabalho $linha_posto_posto ?')) 
                        location.href='pdeletarposto.php?id= $linha_posto_id ';" class="red">Deletar</a>
                    </td>
                </tr>  
            EOT;
                do{
                    // A cada posto de trabalho, é adicionado na variavel $linha_colaborador os dados dos colaboradores para serem usados depois
                    $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
                    $linha_colaborador = $sql_query_colaborador->fetch_assoc();     
                do{
                    // Verifica se o nome do posto é igual ao nome do posto do colaborador
                    if ($linha_posto['posto_de_trabalho'] == $linha_colaborador['posto_de_trabalho']){
                        $linha_colaborador_colaborador = $linha_colaborador['colaborador'];
                        $linha_colaborador_id = $linha_colaborador['id'];
            echo <<<EOT
                    <!-- Caso seja verdade, o colaborador é adicionado embaixo daquele posto de trabalho -->
                    <tr class="colaborador$colaborador" style="display: none;">
                    <td>&nbsp;&nbsp;&nbsp; $linha_colaborador_colaborador</td>
            EOT;
                        // Aqui é seguido a mesma lógica do posto de trabalho para adicionar as P, E ou F dos colaboradores
                        $n3 = 1;
                        $dnumero3 = 'd' . $n3;
                        while ($n3<=date('d')){
                            if ($linha_colaborador[$dnumero3] == 'P'){
                                echo "<td class='green'>P</td>";
                                $n3++;
                                $dnumero3 = 'd' . $n3;
                            } elseif ($linha_colaborador[$dnumero3] == 'E'){
                                echo "<td class='blue'>E</td>";
                                $n3++;
                                $dnumero3 = 'd' . $n3;
                            } elseif ($n3 < date('d')) {
                                echo "<td class='red'>F</td>";
                                $n3++;
                                $dnumero3 = 'd' . $n3;
                            } else {
                                echo "<td></td>";
                                $n3++;
                                $dnumero3 = 'd' . $n3;
                            }
                        }
                        while ($n3<=date('t')){
                            echo "<td></td>";
                            $n3++;
                        }
            echo <<<EOT
                    <td>
                        <a href="editarcolaborador.php?id=$linha_colaborador_id" class="blue">Editar </a>
                    </td>
                    <td>
                        <a href="javascript: if(confirm('Tem certeza que deseja deletar o/a colaborador(a) $linha_colaborador_colaborador ?')) 
                        location.href='pdeletarcolaborador.php?id=$linha_colaborador_id';" class="red">Deletar</a>
                    </td> 
                </tr>
            EOT;
                    }
                // Do-while para percorrer todos os colaboradores
                } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
                // É adicionado 1 ao contador $colaborador (para criar uma class específica para os colaboradores de certo posto de trabalho)
                $colaborador++;
                // Do-while para ser adicionado a variável $linha_contador os dados dos colaboradores
                } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
            // Do-while para percorrer todos os postos de trabalho 
            } while($linha_posto=$sql_query_posto->fetch_assoc());
            echo <<<EOT
            </table>
            <br><br>
            <div class="left">
            </div>
            </div>
            <script>
            EOT;
                // Script/PHP para a mecânica de aparecer ao clicar (Aqui é usado os id/class diferentes criados para cada posto de trabalho e seus colaboradores)
                $n4 = 1;
                do {
            echo <<<EOT
                    $("div#posto$n4").click(function(){
                    $("tr.colaborador$n4 ").slideToggle();
                    });
                    // Ocultar os colaboradores quando é pesquisado por posto
                    $("#pesquisar").keyup(function(){
                    $("tr.colaborador$n4").hide();
                    });
            EOT;
                    $n4++;
                } while ($n4 < $posto);
                // Script para mecânica de pesquisar
            echo <<<EOT
                    function pesquisar(){
                        var input,filtro,menu,menuitens,links;
                        input= document.getElementById("pesquisar");
                        filtro = input.value.toUpperCase();
                        menu = document.getElementById("tabela");
                        menuitens = menu.getElementsByClassName("item");
                        for(var i=0; i<menuitens.length; i++){
                            links = menuitens[i].getElementsByClassName("posto")[0];
                            if(links.innerHTML.toUpperCase().indexOf(filtro)>-1){
                                menuitens[i].style.display="";
                            }else{
                                menuitens[i].style.display="none";
                            }
                        }
                    }
                </script>
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