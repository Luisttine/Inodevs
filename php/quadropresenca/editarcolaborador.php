<?php
    session_start();
    include_once("../conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_colaborador = "SELECT * FROM presenca where id='$id'";
    $resultado_colaborador = mysqli_query($conn, $result_colaborador);
    $linha_colaborador = mysqli_fetch_assoc($resultado_colaborador);
    $nivel_acesso = $_SESSION['nivel_acesso'];
    if(!empty($_SESSION['ulogin'])){
    if($nivel_acesso == 2){
    if(!empty($id)){
    echo <<<EOT
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Colaborador</title>
                    <link rel="stylesheet" href="../../css/quadro.css">
                </head>
                <body>
                    <div class=principalforms>
                    <h1>Editar Colaborador</h1>
                EOT;
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    $linha_colaborador_id = $linha_colaborador['id'];
                    $linha_colaborador_colaborador = $linha_colaborador['colaborador'];
                    $linha_colaborador_posto = $linha_colaborador['posto_de_trabalho'];
                echo <<<EOT
                <form method="POST" action="peditarcolaborador.php">
                    <input type="hidden" name="id" value=" $linha_colaborador_id" required>
                <label>Colaborador: </label><br>
                <input type="text" name="colaborador" placeholder="Edite o nome do colaborador" value="$linha_colaborador_colaborador" required><br><br>
                <label>Posto de Trabalho:</label><br>
                <input type="text" name="posto_de_trabalho" placeholder="Edite o posto de trabalho deste colaborador" value="$linha_colaborador_posto" required><br><br>
                <label>Presenças: </label>
                <table>
                <tr>
                EOT;    
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
                        if ($mes == 2){
                            echo "<td id='titulo' colspan='28'>$mes_extenso[$mes]</td>";
                        } elseif ($mes == 4 ||  $mes == 6 || $mes == 9 || $mes == 11){
                            echo "<td id='titulo' colspan='30'>$mes_extenso[$mes]</td>";
                        } else {
                            echo "<td id='titulo' colspan='31'>$mes_extenso[$mes]</td>";
                        }
                echo "<tr>";
                        $n1 = 1;
                        while ($n1<=date('t')){
                            echo "<td id='titulo'>$n1</td>";
                            $n1++;
                        }
                echo "
                </tr>
                <tr>
                ";
                        $n3 = 1;
                        $dnumero = 'd' . $n3;
                        while ($n3<=date('d')){
                            if  ($linha_colaborador[$dnumero] == 'P') {
                                echo "<td class='branco'>
                                <select name='$n3'>
                                    <option selected value='P'>P</option>
                                    <option value=''>F</option>
                                    <option value='E'>E</option>
                                </select>
                                </td>";
                                $n3++;
                                $dnumero = 'd' . $n3;
                            }
                            else if ($linha_colaborador[$dnumero] == 'E'){
                                echo "<td class='branco'>
                                <select name='$n3'>
                                    <option value='P'>P</option>
                                    <option value=''>F</option>
                                    <option selected value='E'>E</option>
                                </select>
                                </td>";
                                $n3++;
                                $dnumero = 'd' . $n3;
                            }
                            else if ($n3 == date('d')){
                                echo "<td class='branco'>
                                <select name='$n3'>
                                    <option selected hidden value=''></option>
                                    <option value='P'>P</option>
                                    <option value=''>F</option>
                                    <option value='E'>E</option>
                                </select>
                                </td>";
                                $n3++;
                                $dnumero = 'd' . $n3;
                            }
                            else{
                                echo "<td class='branco'>
                                <select name='$n3'>
                                    <option value='P'>P</option>
                                    <option selected value=''>F</option>
                                    <option value='E'>E</option>
                                </select>
                                </td>";
                                $n3++;
                                $dnumero = 'd' . $n3;
                            }
                        }
                        while ($n3<=date('t')){
                            echo "<td class='branco'><input type='hidden' class='quadro' name='$n3' value=''></td>";
                            $n3++;
                        }
                        if ($mes == 2){
                            echo "<input type='hidden' name='29' value='' required>";
                            echo "<input type='hidden' name='30' value='' required>";
                            echo "<input type='hidden' name='31' value='' required>";
                        } 
                        if  ($mes == 4 ||  $mes == 6 || $mes == 9 || $mes == 11){
                            echo "<input type='hidden' name='31' value='' required>";
                        }    
                echo <<<EOT
                        </tr>
                        </tr>
                        </table>
                        <input type="submit" value="Editar">
                    </form>
                    <br><br>
                    <div class="left">
                    </div>
                    </div>
                    <div class="voltar2"><a href="quadropresenca.php">Retornar</a></div>
                </body>
                </html> 
                EOT;
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px; text-align: center;'> É necessário adicionar o id do colaborador!</p>";
        header('location: quadropresenca.php');
    }
    } else {
        $_SESSION['msg'] = "<br><p style='color: red; font-size: 18px'> Você não tem permissão!</p>";
        header('location: ../presenca.php');
    }
    } else {
        $_SESSION['msg'] = "<p style='color: red; font-size: 18px'> Você precisa estar logado!</p>";
        header('location: ../../index.php');
    }
?>