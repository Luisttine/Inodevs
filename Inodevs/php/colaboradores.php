<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Colaboradores</title>
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box; 
        font-family: Space, Helvetica, sans-serif, Mono, Arial;
        color: #323232;
        border: none;
    }

    body{
        margin:5px;
        padding-top:2vh; 
        background-size: cover; 
    }

    .left{
        position: absolute;
        width: 59px;
        height: 100%;
        left: 0px;
        top: 0px;
        background: #002339;
    }

    a{
        text-decoration: none;
    }

    a.links{
        display: none;
    }

    h1{
        font-size: 3.6em;
        color: rgb(0, 0, 0);
        font-weight: bold;
        text-align: center;
    }

    h1:after{
        content: ' ';
        display: block;
        width: 100%;
        height: 0.3vh;
        margin-top: 10px;
        background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
        background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
    } 

    input:not([type="checkbox"]){
        width: 95%;
        padding: 10px;
        margin-bottom: 22px;
    }

    #main-container {
        width: 50%;
        height: 60vh;
        margin-left: 25%;
        margin-top: 1.5%;
        background-color: #FFF;
        border-radius: 10px;
        padding-top: 10px;
        padding-right: 20px;
        padding-left: 35px;
        position: sticky;
        border: 0.15em solid #000000;
    }
        
    #main-container h1 {
        text-align: center;
        font-size: 1.6rem;
    }
        
    form {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; 
    }
        
    .full-box {
        flex: 1 1 100%;
        position: relative;
    }
        
    .half-box {
        flex: 1 1 45%;
        position: relative;
    }

    .m-box {
        flex: 1 1 50%;
        position: absolute;
        width: 20%;
        margin-top: 2%;
        left:80%;
    }
        
    .middle-box {
        flex: 1 1 50%;
        position: absolute;
        width: 95%;
        margin-top: 10%;
        left: 50%;
        transform: translateX(-50%);
    }   
        
    input[type="submit"] {
        background-color: #E5C03B;;
        color: black;
        padding: 8px 5px;
        font-size: 20px;  
        margin-bottom: 10px;  
        border-radius: 20px;
    }
        
    input[type="submit"]:hover{
        background: darkgoldenrod;
    }
        
    input, label[type="fullbox"] {
        width: 100%; 
    }
        


    label {
        font-weight: bold;
        font-size: 0.8rem;
    }
        
    input {
        border-bottom: 2px solid #323232;
        padding: 15px;
        font-size: .9rem;
        margin-bottom: 40px;
    }
        
    input:focus [type="lastname"] {
        outline: none;
        display: block;
    }
        
    input:focus[type="checkbox"] {
        display:inline-block;
    }
        
    a {
        color: #3579a0;
        text-decoration: none;
    }
        
    a.links{
        display: none;
    }
        
    .spacing{
        height: 10%;
        width: 10%;
    }
    </style>
  
</head>
<body>
    <div class="m-box">
        <a href="../html/controle.html"><input  id="btn-submit1" type="submit" value="Retornar"></a>
    </div>
    <br><br><br>
    <div id="main-container">
    <h1>Cadastro de Colaborador</h1><BR>
    <form  method="POST" action="bdcolaborador.php">
      <div class="full-box">
        <label for="name">Nome Completo</label>
        <input type="text" name="nome_completo" placeholder="Digite o nome completo" required>
      </div>
      <div class="half-box spacing">
        <label for="endereço">Matricula</label>
        <input type="text" name="matricula" placeholder="Ex: 1502556561" required>
      </div>
      <div class="half-box">
        <label for="situacao">Situação do Cadastro</label>
      
        <div class="table_cell table_title two">
            <select name="situacao">
              <option value="" disabled selected hidden>Selecione uma situação de cadastro...</option>
              <option>Em admissão</option>
              <option>Empregado</option>
              <option>Em demissão</option>  
            </select>
        </div>

      </div>
      <div class="half-box">
        <label for="cpf">CPF</label><br>
        <input type="text" name="cpf" placeholder="Ex.: 000.000.000-00" required>
      </div>
      <div class="half-box">
        <label for="funcao">Função</label>
        <input type="text" name="funcao" placeholder="Digite a função" required>
      </div>
      <div class="half-box">
        <label for="data_adimissao">Data de adimissão</label>
        <input type="date" name="data_admissao" placeholder="Ex.: 10/10/2020" required>
      </div>
      <div class="half-box">
        <label for="data_demissao">Data de demissão</label>
        <input type="date" name="data_demissao" placeholder="Ex.: 11/10/2020" required>
      </div>
      <div class="half-box">
        <label for="tipo_cobertura">Tipo de cobertura</label>
       
        <div class="table_cell table_title two">
        
              <select name="tipo_cobertura">
                <option value="" disabled selected hidden>Selecione um tipo de cobertura...</option>
                <option>Fixo</option>
                <option>Flutuante</option>          
              </select>
              <br><br>
              <div class="middle-box">
                <input type="submit" value="Cadastrar">
              </div>
    </form>

        </div>
      </div>

  </div>
  <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
<div class="left"></div>
</body>
</html>
    