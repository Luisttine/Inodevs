
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    *{
        margin:0;
        padding: 0;
        font-size: 10px;
        font-family: Space, Helvetica, sans-serif, Mono, Arial;
    }
    
    .fundo{
        margin: 0;
        padding: 0;
        height: 99.8vh;
        max-width: 98%;
    }
    
    .container{
        position: flex;
        background-color: #fff;
        height: 45vw;
        margin-left: 5.8vh;
        width: 95%;
        padding-left: 2vw;
    }
    .container,h2 {
        font-size: 2.7em;
        padding-top: 1.9vh;
        padding-left: 2vw;
        padding-bottom: 1vh;
    }
    .container, h1{
        font-size: 4.4em;
        color: #000000;
    }

    .bloco{
        margin-top: 2vh;
        position: relative;
        height: 52vh;
        width: 97%;
        text-align: center;
        background-color: #fff;
    }

    .menu {
        margin-right: 4vw;
        display: grid;
        width: 100%;
        height: 4vh;
    }
        
    #op{
        height: 100%;
        width: 2%;
    }
        
    #deslogar{
        margin-top: 1vh;
        margin-right:0;
        height: 5vh;
        width: 28%;
        display: inline-block;
        margin-left: 63.9vw;
        padding-left: 10px;
        text-align: right;
    }

    textarea{
        position: relative;
        align-items: center;
        width: 54vw;
        height: 32vh;
        margin-top: 3vh;
        background: #C4C4C4;
        border-radius: 50px;
        outline: 0px auto;
        outline-offset: 0px;
        font-size: 2em;
        padding: 3vh;
    }

    .relogio{
        margin-top: 1.5%;
        font-size: 4.5em;
        text-align: center;
    }

    .caixa{
        margin-top: 10vh;
        width: 16vw;
        height: 5vw;
        justify-content: center;
        align-items: center;
        position: relative;
        border: 4px solid #272424;
        box-sizing: border-box;
        border-radius: 50px;
        margin-left: 35.5vw;
    }

    .caixa1{
        width: 100%;
        height: 4vh;
    }

    #envio {
        text-align: center;
        padding: 0;
        width: 12vw;
        border-radius: 50px;
        border: none;
    }
    #envio:hover {
        cursor: pointer;
    }

    
    #botao {
        height: 100%;
        height: 6vh;
        text-align: center;
        padding: 0;
        width: 12vw;
        border-radius: 50px;
        font-size: 2.2em;
        outline: 0px auto;
        outline-offset: 0px;
        border: none;
    }
    #botao:hover {
        cursor: pointer;
    }

    .blue{
        background-color: #3d7292;
        border: none;
        color: #fff;
    }
    .blue:hover{
        background-color: #2c5874;
    }

    .yellow{
        margin-top: 1vh;
        background-color: #E5C03B;
        color: #000;
    }
    .yellow:hover{
        background-color: darkgoldenrod;
    }

    .left{
        position: absolute;
        width: 59px;
        height: 100%;
        left: 0px;
        top: 0px;
        background: #002339;
    }
        </style>
     <title>Presença</title>
</head>
<body>
    <div class="fundo table" >
        <div class="container">
            <div class="menu">
                <div id="op">

                </div>
                <div id="deslogar">
                    <a href="../index.html"><input id="botao" class="blue" value="Deslogar"></a>
              </div>
            
            <div class = "caixa">
                        <div id= "meurelogio" class="relogio" onload="Tempo()"></div>
                        <script src="../js/relogio.js"></script>
            </div>
            <div class = "bloco">
                <h1>Marque sua presença</h1>
                <h2>Relatório do dia de trabalho:</h2>
            <form method ="POST" action="bdpresenca.php">
                <textarea rows="10" cols="40" maxlength="500" name="relatorio" required></textarea><br>
                <input id="botao" type="submit" value="Enviar" class="yellow">
            </form>
            </div>
        <div>
    </div>

    <div class="left"></div>

</body>
</html>
