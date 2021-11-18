<?php

    session_start();
    include_once("../conexao.php");

    if (isset($_SESSION['conteudo_gerencial'])){
        $conteudo_gerencial = $_SESSION['conteudo_gerencial'];
        $titulo_gerencial = $_SESSION['titulo_gerencial'];

        $result = <<<EOT
        INSERT INTO relatorios (titulo, tipo_relatorio, conteudo) VALUES ('$titulo_gerencial', 'Gerencial', '$conteudo_gerencial')
        EOT;
        $resultado = mysqli_query($conn, $result);

        unset($_SESSION['conteudo_gerencial'], $_SESSION['titulo_gerencial']);
    }

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
            font-size: 10px;
            font-family: Space, Helvetica, sans-serif, Mono, Arial;
            text-align: center;
        }
        h1 {
            padding-top: 3vh;
            font-size: 2.5em;
        } 
        h2 {
            padding-top: 0.7%;
            font-size: 2em;
        }
        h3 {
            padding-top: 0.7%;
            font-size: 2em;
            margin-bottom: 2vh;
        }
        p{
            font-size: 1.5em;
        }
        h4 {
            margin-top: 3vh;
            font-size: 2em;
        }
        h5{
            font-size: 2em;
            margin-top: 6vh;
        }
        h6{
            font-size: 2.1em;
            margin-top: 3vh;
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