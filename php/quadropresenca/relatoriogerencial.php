<?php
    include_once("../conexao.php");
    session_start();

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
    $mes_extenso_atual = $mes_extenso[$mes];
    if ($mes == 2){
        $dias = 28;
    } elseif ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11){
        $dias = 30;
    } else {
        $dias = 31;
    }
    $ano = date('Y');
    $n1 = 1;
    do{
        $n2 = 1;
        $dnumero2 = 'd' . $n2;
        while ($n2<=$dias){
                    if ($linha_posto[$dnumero2] == "P"){
                        $n2++;
                        $relatorio_posto_pg++;
                        $relatorio_posto_tg++;
                        $dnumero2 = 'd' . $n2;
                    } elseif ($linha_posto[$dnumero2] == 'E'){
                        $n2++;
                        $relatorio_posto_tg++;
                        $dnumero2 = 'd' . $n2;
                    } else{
                        $n2++;
                        $relatorio_posto_fg++;
                        $relatorio_posto_tg++;
                        $dnumero2 = 'd' . $n2;
                    }
                }  
        do{
            $sql_query_colaborador = $conn->query($sql_code_colaborador) or die($mysqli->error);
            $linha_colaborador = $sql_query_colaborador->fetch_assoc();           
        do{
            if ($linha_posto['posto_de_trabalho'] == $linha_colaborador['posto_de_trabalho']){
                $n3 = 1;
                $dnumero3 = "d" . $n3;
                while ($n3<=$dias){
                    if ($linha_colaborador[$dnumero3] == 'P'){
                        $n3++;
                        $relatorio_colaborador_pg++;
                        $relatorio_colaborador_tg++;
                        $dnumero3 = "d" . $n3;
                    } elseif ($linha_colaborador[$dnumero3] == 'E'){
                        $n3++;
                        $relatorio_colaborador_eg++;
                        $relatorio_colaborador_tg++;
                        $dnumero3 = "d" . $n3;
                    } else {
                        $n3++;
                        $relatorio_colaborador_fg++;
                        $relatorio_colaborador_tg++;
                        $dnumero3 = "d" . $n3;
                    }
                } 
            }
        } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
        } while($linha_colaborador=$sql_query_colaborador->fetch_assoc());
    } while($linha_posto=$sql_query_posto->fetch_assoc());

    $relatorio_geral_p = $relatorio_posto_pg + $relatorio_colaborador_pg;
    $relatorio_geral_f = $relatorio_posto_fg + $relatorio_colaborador_fg;
    $relatorio_geral_e = $relatorio_colaborador_eg;

    $numero1 = number_format($relatorio_geral_p * 100 / ($relatorio_posto_tg + $relatorio_colaborador_tg), 2);
    $numero2 = number_format($relatorio_geral_f * 100 / ($relatorio_posto_tg + $relatorio_colaborador_tg), 2);
    $numero3 = number_format($relatorio_geral_e * 100 /($relatorio_colaborador_tg + $relatorio_posto_tg), 2);
    $numero4 = number_format($relatorio_posto_pg * 100 / $relatorio_posto_tg, 2);
    $numero5 = number_format($relatorio_posto_fg * 100 / $relatorio_posto_tg, 2);
    $numero6 = number_format($relatorio_colaborador_pg * 100 / $relatorio_colaborador_tg, 2);
    $numero7 = number_format($relatorio_colaborador_fg * 100 /$relatorio_colaborador_tg, 2);
    $numero8 = number_format($relatorio_colaborador_eg * 100 /$relatorio_colaborador_tg, 2);

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
        $info_posto .= "<h5>" . $linha_posto['posto_de_trabalho'] .  "</h5>";
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
            $info_colaborador .= "<h5>" . $linha_colaborador['colaborador'].  "</h5>";
            $info_colaborador .= "<p>Posto de trabalho: " .  $linha_colaborador['posto_de_trabalho'];
            $info_colaborador .= "<p>Porcentagem de presença: " . number_format($relatorio_colaborador_p * 100 / $relatorio_colaborador_t, 2) . "%</p>";
            $info_colaborador .= "<p>Porcentagem de falta: " . number_format($relatorio_colaborador_f * 100 /$relatorio_colaborador_t, 2) . "%</p>";
            $info_colaborador .= "<p>Porcentagem de evento: " . number_format($relatorio_colaborador_e * 100 /$relatorio_colaborador_t, 2) . "%</p>";
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
        <link rel="stylesheet" href="../../css/relatorio.css">
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    </head>
    <body>
    <div id="htmlpdf">
            <h1>Relatório Gerencial de $mes_extenso_atual de $ano</h1>
            <h2>Gerais</h2> 
            <h3>Gráficos</h3>
            <div id="graficos">
                <div id="local3">
                    <div id="chart_div"></div>
                </div>
                <div id="local4">
                    <div id="blococ">
                        <div id="chart_div2"></div>
                    </div>
                    <div id="blocod">
                        <div id="chart_div3"></div>
                    </div>
                </div>
            </div>
        <div id="local1">
            <h5>Geral</h5>
            <p>Porcentagem de presença: $numero1%</p>
            <p>Porcentagem de faltas: $numero2%</p>
            <p>Porcentagem de evento: $numero3%</p>
        </div>
        <div id="local2">
            <div id="blocoa">
                <h6>Postos de Trabalho</h6>
                <p>Porcentagem de presença: $numero4%</p>
                <p>Porcentagem de faltas: $numero5%</p>
            </div>
            <div id="blocob">
            <h5>Colaboradores</h5>
                <p>Porcentagem de presença: $numero6%</p>
                <p>Porcentagem de falta: $numero7%</p>
                <p>Porcentagem de evento: $numero8%</p>
            </div>
        </div>
            <div id="left">
            <h6>Postos de Trabalho</h6>
                $info_posto
            </div>
            <div id="right">
            <h6>Colaboradores</h6>
                $info_colaborador
            </div>
    </div>
    <form method="post" id="make_pdf" action="pdfgerencial.php" target="_blank">
        <input type="hidden" name="hidden_html" id="hidden_html">
        <button type="button" name="create_pdf" id="create_pdf">Gerar PDF</button>
    </form>
    EOT;
    $voltar = '<a href="bdrelatoriogerencial.php" id="salvar">Salvar no Histórico</a><a href="quadropresenca.php" id="btn-submit1">Retornar</a>'; 
    $conteudo2 = <<<EOT
        <script>
        google.charts.load("current", {
        packages: ["controls", "corechart", "table"]
        }).then(function () {
        var data = new google.visualization.DataTable();
        data.addColumn("string", "Presenças");    
        data.addColumn("number", "Quantidade");
        data.addRows([
            ["Presenças", $relatorio_geral_p],
            ["Eventos", $relatorio_geral_e],
            ["Faltas", $relatorio_geral_f],
        ]);
        var container = document.getElementById("chart_div");
        var chart = new google.visualization.PieChart(container);
        google.visualization.events.addListener(chart, "ready", function(){
            container.innerHTML = `<img src="` + chart.getImageURI() + `">`;
        });
        var data2 = new google.visualization.DataTable();
        data2.addColumn("string", "Presenças");    
        data2.addColumn("number", "Quantidade");
        data2.addRows([
            ["Presenças", $relatorio_posto_pg],
            ["Eventos", $relatorio_posto_fg],
        ]);
        var container2 = document.getElementById("chart_div2");
        var chart2 = new google.visualization.PieChart(container2);
        google.visualization.events.addListener(chart2, "ready", function(){
            container2.innerHTML = `<img src="` + chart2.getImageURI() + `">`;
        });
        var data3 = new google.visualization.DataTable();
        data3.addColumn("string", "Presenças");    
        data3.addColumn("number", "Quantidade");
        data3.addRows([
            ["Presenças", $relatorio_colaborador_pg],
            ["Eventos", $relatorio_colaborador_eg],
            ["Faltas", $relatorio_colaborador_fg],
        ]);
        var container3 = document.getElementById("chart_div3");
        var chart3 = new google.visualization.PieChart(container3);
        google.visualization.events.addListener(chart3, "ready", function(){
            container3.innerHTML = `<img src="` + chart3.getImageURI() + `">`;
        });
        chart.draw(data, {
            height: 300,
            title: "Gráfico Geral de Presenças",
            width: 400,
            colors: ["green", "blue", "red"]
        });
        chart2.draw(data2, {
            height: 300,
            title: "Gráfico Geral de Presenças de Postos de Trabalho",
            width: 400,
            colors: ["green", "red"]
        });
        chart3.draw(data3, {
            height: 300,
            title: "Gráfico Geral de Presenças de Colaboradores",
            width: 400,
            colors: ["green", "blue", "red"]
        });
        });
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

    echo $conteudo . $voltar . $conteudo2;

    $_SESSION['titulo_gerencial'] = "Relatório Gerencial de $mes_extenso_atual de $ano";
    $_SESSION['conteudo_gerencial'] = $conteudo . $conteudo2;
?>