<?php

    require_once 'dompdf/autoload.inc.php';

    use Dompdf\Dompdf;

    class Pdf extends Dompdf{
        public function __construct(){
            parent::__construct();
        }
    }
    if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != ''){
        $file_name = 'relatorio.pdf';
        $html = <<<EOT
        <style>
        *{
            margin: 0;
            padding: 0;
            font-size: 12px;
            font-family: Space, Helvetica, sans-serif, Mono, Arial;
            margin-left: 1,7%;
            padding-top: 9vh;
        }

        #tabela{
            width: 90%;
            margin-left: 1.75%;
        }

        h1 {
            margin-top: 1%;
            padding-top: 18vh;
            font-size: 2.5em;
            text-align: center;
            margin-right: 3%;
            margin-bottom: 7vh;
        }
        
        h2 {
            margin-top: 3vh;
            font-size: 2em;
        }
        
        h3 {
            padding-top: 2vh;
            font-size: 1.5em;
        }
        
        p{
            font-size: 2em;
        }
        
        h4 {
            font-size: 2em;
            margin-top: 3.5vh;
            margin-bottom: 1vh;
        }
        
        table {
            border: solid 1px black;
            border-collapse: collapse;
            border-radius: 10px;
            margin-top: 1%;
            height: 80%;
        }
        
        td {
            border: solid 1px black;
            padding: 5px;
            background: lightgray;
        }
        
        #titulo{
            background: lightslategray;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        
        .green {
            font-weight: bold;
            color: green;
        }
        
        .red {
            font-weight: bold;
            color: red;
        }
        
        .blue {
            font-weight: bold;
            color: blue;
        }
        
        .green2 {
            font-weight: bold;
            color: green;
            display: inline-block;
        }
        
        .red2 {
            font-weight: bold;
            color: red;
            display: inline-block;
        }
        
        .blue2 {
            font-weight: bold;
            color: blue;
            display: inline-block;
        }
        
        ul {
            list-style-type: none;
        }
        
        </style>
        EOT;
        $html .= $_POST["hidden_html"];
        $pdf = new Pdf();
        $pdf->loadHtml($html);
        $pdf->render();
        $pdf->stream($file_name, array("Attachment" => false));
    }

?>