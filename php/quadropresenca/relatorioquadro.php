<?php
    include_once("../conexao.php");
    session_start();
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){

    $sql_code_colaborador = "SELECT * FROM presenca";
    $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
    $linha_colaborador = $sql_query_colaborador->fetch_assoc();

    $sql_code_posto = "SELECT * FROM presenca_posto";
    $sql_query_posto = $conn->query($sql_code_posto) or die($mysqli->error);
    $linha_posto = $sql_query_posto->fetch_assoc();

    $relatorio_posto_pg = 0;
    $relatorio_posto_fg = 0;
    $relatorio_posto_tg = 0;
    $relatorio_colaborador_pg = 0;
    $relatorio_colaborador_fg = 0;
    $relatorio_colaborador_eg = 0;
    $relatorio_colaborador_tg = 0;

    $mes = date("n")-1;
    $mes_extenso = array(0,
        "Janeiro",
        "Fevereiro",
        "Marco",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
    );
    $mes_extenso_atual = $mes_extenso[$mes];
    if ($mes == 2){
        $dias = 28;
    } elseif ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11){
        $dias = 30;
    } else {
        $dias = 31;
    }
    $ano = date("Y");
    if ($mes == 2){
        $mes_extenso_depende = <<<EOT
        <td id="titulo" colspan="28">$mes_extenso_atual</td>
        EOT;
    } elseif ($mes == 4 ||  $mes == 6 || $mes == 9 || $mes == 11){
        $mes_extenso_depende = <<<EOT
        <td id="titulo" colspan="30">$mes_extenso_atual</td>
        EOT;
    } else {
        $mes_extenso_depende = <<<EOT
        <td id="titulo" colspan="31">$mes_extenso_atual</td>
        EOT;
    }
    $n1 = 1;
    $diastab = "";
    while ($n1<=$dias){
        if ($n1 < 10){
            $diastab .= <<<EOT
            <td id="titulo"> $n1 </td>
            EOT;
        } else {
            $diastab .= <<<EOT
            <td id="titulo">$n1</td>
            EOT;
        }
        $n1++;
    }
    $tabela_info = "";
    $total_p_e_f = "";
    $tabela_toda = "";
    $salva_presencas = "";
    do{
        $linha_posto_posto = $linha_posto['posto_de_trabalho'];
        $tabela_info .= "<h2>" . $linha_posto_posto . "</h2><p>";
        $tabela_toda .= <<<EOT
        <tr class="item">
        EOT; 
        $tabela_toda .= <<<EOT
        <td><div class="posto">
        EOT . $linha_posto_posto . "</div></td>";
        $salva_presencas .= $linha_posto_posto . ",";
        $n2 = 1;
        $dnumero2 = "d" . $n2;
        $relatorio_posto_pgi = 0;
        $relatorio_posto_fgi = 0;
        while ($n2<=$dias){
                    if ($linha_posto[$dnumero2] == "P"){
                        $tabela_info .=  <<<EOT
                        <div class="green2">P </div>
                        EOT;
                        $tabela_toda .=  <<<EOT
                        <td class="green">P</td>
                        EOT;
                        $salva_presencas .= "P" . ",";
                        $n2++;
                        $relatorio_posto_pg++;
                        $relatorio_posto_pgi++;
                        $relatorio_posto_tg++;
                        $dnumero2 = "d" . $n2;
                    } elseif ($linha_posto[$dnumero2] == "E"){
                        $tabela_info .=  <<<EOT
                        <div class="blue2">E </div>
                        EOT;
                        $tabela_toda .=  <<<EOT
                        <td class="blue">E</td>
                        EOT;
                        $salva_presencas .= "E" . ",";
                        $n2++;
                        $relatorio_posto_tg++;
                        $dnumero2 = "d" . $n2;
                    } else{
                        $tabela_info .=  <<<EOT
                        <div class="red2">F </div>
                        EOT;
                        $tabela_toda .=  <<<EOT
                        <td class="red">F</td>
                        EOT;
                        $salva_presencas .= "F" . ",";
                        $n2++;
                        $relatorio_posto_fg++;
                        $relatorio_posto_tg++;
                        $relatorio_posto_fgi++;
                        $dnumero2 = "d" . $n2;
                    }
                }
            $total_p_e_f .= $relatorio_posto_pgi . ",";
            $tabela_info .= "<br>Total de Presenças: $relatorio_posto_pgi";
            $total_p_e_f .= $relatorio_posto_fgi . ",";
            $tabela_info .= "<br>Total de Faltas: $relatorio_posto_fgi";
            $tabela_info .= "</p><ul>"; 
            $tabela_toda .= "</tr>"; 
        do{
            $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
            $linha_colaborador = $sql_query_colaborador->fetch_assoc();           
        do{
            if ($linha_posto['posto_de_trabalho'] == $linha_colaborador['posto_de_trabalho']){
            $salva_presencas .= $linha_colaborador['colaborador'] . ",";
            $tabela_info .= "<li><h3>" . $linha_colaborador['colaborador'] . "</h3>";
            $tabela_toda .= "<tr><td>" . $linha_colaborador['colaborador'] . "</td>";
            $n3 = 1;
            $dnumero3 = "d" . $n3;
            $relatorio_colaborador_pgi = 0;
            $relatorio_colaborador_egi = 0;
            $relatorio_colaborador_fgi = 0;
                while ($n3<=$dias){
                    if ($linha_colaborador[$dnumero3] == "P"){
                        $tabela_info .= <<<EOT
                        <div class="green2">P </div>
                        EOT;
                        $tabela_toda .= <<<EOT
                        <td class="green">P </td>
                        EOT;
                        $salva_presencas .= "P" . ",";
                        $n3++;
                        $relatorio_colaborador_pg++;
                        $relatorio_colaborador_tg++;
                        $relatorio_colaborador_pgi++;
                        $dnumero3 = "d" . $n3;
                    } elseif ($linha_colaborador[$dnumero3] == "E"){
                        $tabela_info .= <<<EOT
                        <div class="blue2">E </div>
                        EOT;
                        $tabela_toda .= <<<EOT
                        <td class="blue">E</td>
                        EOT;
                        $salva_presencas .= "E" . ",";
                        $n3++;
                        $relatorio_colaborador_eg++;
                        $relatorio_colaborador_tg++;
                        $relatorio_colaborador_egi++;
                        $dnumero3 = "d" . $n3;
                    } else {
                        $tabela_info .= <<<EOT
                        <div class="red2">F </div>
                        EOT;
                        $tabela_toda .= <<<EOT
                        <td class="red">F </td>
                        EOT;
                        $salva_presencas .= "F" . ",";
                        $n3++;
                        $relatorio_colaborador_fg++;
                        $relatorio_colaborador_tg++;
                        $relatorio_colaborador_fgi++;
                        $dnumero3 = "d" . $n3;
                    }
                }
            $tabela_info .= "<br>Total de Presenças: $relatorio_colaborador_pgi";
            $total_p_e_f .= $relatorio_colaborador_pgi . ",";
            $tabela_info .= "<br>Total de Eventos: $relatorio_colaborador_egi";
            $total_p_e_f .= $relatorio_colaborador_egi . ",";
            $tabela_info .= "<br>Total de Faltas: $relatorio_colaborador_fgi";
            $total_p_e_f .= $relatorio_colaborador_fgi . ",";
            $tabela_info .= "</li><br>"; 
            }
        } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
        } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
        $tabela_info .= "</ul>";
    } while($linha_posto=$sql_query_posto->fetch_assoc());

    $info_posto = "";
    $sql_query_posto = $conn->query($sql_code_posto) or die($mysqli->error);
    $linha_posto = $sql_query_posto->fetch_assoc();
    do{
        $relatorio_posto_p = 0;
        $relatorio_posto_f = 0;
        $relatorio_posto_e = 0;
        $relatorio_posto_t = 0;
        $n3 = 1;
        $dnumero3 = "d" . $n3;
        while ($n3<=$dias){
            if ($linha_posto[$dnumero3] == "P"){
               $n3++;
               $relatorio_posto_p++;
               $relatorio_posto_t++;
               $dnumero3 = "d" . $n3;
            } elseif ($linha_posto[$dnumero3] == "E"){
               $n3++;
               $relatorio_posto_t++;
               $dnumero3 = "d" . $n3;
            } else {
               $n3++;
               $relatorio_posto_f++;
               $relatorio_posto_t++;
               $dnumero3 = "d" . $n3;
            }
        }
        $info_posto .= "<h4>" . $linha_posto['posto_de_trabalho'] .  "</h4>";
        $info_posto .= "<p>Porcentagem de presença: " . number_format($relatorio_posto_p * 100 / $relatorio_posto_t, 2) . "%</p>";
        $info_posto .= "<p>Porcentagem de falta: " . number_format($relatorio_posto_f * 100 /$relatorio_posto_t, 2) . "%</p>";
    }while($linha_posto=$sql_query_posto->fetch_assoc());
    $info_colaborador = "";
    $sql_query_posto = $conn->query($sql_code_posto) or die($mysqli->error);
    $linha_posto = $sql_query_posto->fetch_assoc();
    $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
    $linha_colaborador = $sql_query_colaborador->fetch_assoc();
    do{
        $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
        $linha_colaborador = $sql_query_colaborador->fetch_assoc();
    do{
        if($linha_colaborador['posto_de_trabalho'] == $linha_posto['posto_de_trabalho']){
            $relatorio_colaborador_p = 0;
            $relatorio_colaborador_f = 0;
            $relatorio_colaborador_e = 0;
            $relatorio_colaborador_t = 0;
            $n3 = 1;
            $dnumero3 = "d" . $n3;
            while ($n3<=$dias){
                if ($linha_colaborador[$dnumero3] == "P"){
                    $n3++;
                    $relatorio_colaborador_p++;
                    $relatorio_colaborador_t++;
                    $dnumero3 = "d" . $n3;
                } elseif ($linha_colaborador[$dnumero3] == "E"){
                    $n3++;
                    $relatorio_colaborador_e++;
                    $relatorio_colaborador_t++;
                    $dnumero3 = "d" . $n3;
                } else {
                    $n3++;
                    $relatorio_colaborador_f++;
                    $relatorio_colaborador_t++;
                    $dnumero3 = "d" . $n3;
                }
            }
    }
    }while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
    }while($linha_posto=$sql_query_posto->fetch_assoc());
    
    $conteudo = <<<EOT
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório de $mes_extenso_atual de $ano</title>
        <link rel="stylesheet" href="../../css/relatorioquadro.css">
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    </head>
    <body>
    <div id="htmlpdf">
        <h1>Relatório de Quadro de Presença de $mes_extenso_atual de $ano </h1>
        <table id="tabela">
        <tr>
            <td id="titulo" rowspan="2"colspan="1">Posto de Trabalho</td>
            $mes_extenso_depende
        </tr>
        <tr>
            $diastab
        </tr>
            $tabela_toda
        </tr>
        </table>
        $tabela_info
    </div>
    <form method="post" id="make_pdf" action="pdfquadro.php" target="_blank">
        <input type="hidden" name="hidden_html" id="hidden_html">
        <button type="button" name="create_pdf" id="create_pdf">Gerar PDF</button>
    </form>
    EOT;
    $voltar = '<a href="bdrelatorioquadro.php" type="button" id="salvar">Salvar no Histórico</a><a href="quadropresenca.php" id="btn-submit1">Retornar</a>'; 
    $conteudo2 = <<<EOT
        <script>
        $(document).ready(function(){
            $("#create_pdf").click(function(){
                $("#hidden_html").val($("#htmlpdf").html());
                $("#make_pdf").submit();
            });
        });
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

    echo $conteudo . $voltar . $conteudo2;
    
    $_SESSION['titulo_quadro'] = "Relatório Quadro de Presença de $mes_extenso_atual de $ano";
    $_SESSION['conteudo_quadro'] = $conteudo . $conteudo2;
?>