<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['cargo']=="2"){
                include('../php/conexao.php');
            } else {
                header('location:../php/invalido.php');
            }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Quiz </title>
    <link rel="stylesheet" type="text/css" href="../css/cadastrar.css">
</head>

<body>
    <div id="fundo"></div>
    <main>
        <button id="btn_voltar" onclick="voltar()" style="display:block">
            <svg version="1.1" id="Layer_1" x="20px" y="0px" viewBox="0 0 500 500" style="fill: #fff;">
                <g>
                    <path d="M198.608,246.104L382.664,62.04c5.068-5.056,7.856-11.816,7.856-19.024c0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12
			C361.476,2.792,354.712,0,347.504,0s-13.964,2.792-19.028,7.864L109.328,227.008c-5.084,5.08-7.868,11.868-7.848,19.084
			c-0.02,7.248,2.76,14.028,7.848,19.112l218.944,218.932c5.064,5.072,11.82,7.864,19.032,7.864c7.208,0,13.964-2.792,19.032-7.864
			l16.124-16.12c10.492-10.492,10.492-27.572,0-38.06L198.608,246.104z" />
                </g>
            </svg>
        </button>
        <section id="formulario">
            <form id="form_alter" method="POST" action="#" name="alt" autocomplete="off">
                <textarea maxlength="255" name="pergunta"  placeholder="Pergunta"></textarea>
                <label class="container">
                    <input type="radio" value="1" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp1"  placeholder="1° Pergunta"></textarea>
                <label class="container">
                    <input type="radio" value="2" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp2"  placeholder="2° Resposta"></textarea>
                <label class="container">
                    <input type="radio" value="3" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp3"  placeholder="3° Resposta"></textarea>
                <label class="container">
                    <input type="radio" value="4" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp4"  placeholder="4° Resposta"></textarea>
                <select name="num_valor">
                    <option value="0">Fora do Quiz(0)</option>
                    <option value="1">Numero 1</option>
                    <option value="2">Numero 2</option>
                    <option value="3">Numero 3</option>
                    <option value="4">Numero 4</option>
                    <option value="5">Numero 5</option>
                    <option value="6">Numero 6</option>
                    <option value="7">Numero 7</option>
                    <option value="8">Numero 8</option>
                    <option value="9">Numero 9</option>
                    <option value="10">Numero 10</option>
                </select>
                <input type="submit" name="cadastrar" value="Cadastrar">
            </form>
            <?php
                if(isset($_POST['cadastrar'])){
                    $pergunta=$_POST['pergunta'];
                    $resp1=$_POST['resp1'];
                    $resp2=$_POST['resp2'];
                    $resp3=$_POST['resp3'];
                    $resp4=$_POST['resp4'];
                    $resp_correta=$_POST['resp_correta'];
                    $num_valor=$_POST['num_valor'];
                    $comparar=('select * from questoes where quiz_questao="'.$num_valor.'";');
                    $comparar_mostrar=mysqli_query($conexao, $comparar);
                    $linhas=mysqli_num_rows($comparar_mostrar);
                    if($num_valor==0){
                        $sql_cadastrar=('insert into questoes(pergunta, quiz_questao, resp1, resp2, resp3, resp4, opc_correta) value("'.$pergunta.'", "0", "'.$resp1.'", "'.$resp2.'", "'.$resp3.'", "'.$resp4.'", "'.$resp_correta.'");');
                        $sql_mostrar=mysqli_query($conexao, $sql_cadastrar);
                        if($sql_mostrar) echo('<script>window.alert("Cadastrado com sucesso!");window.location="cadastrar_quest.php";</script>');
                    } elseif($linhas==0 && $num_valor!="0") {
                        $sql_cadastrar=('insert into questoes(pergunta, quiz_questao, resp1, resp2, resp3, resp4, opc_correta) value("'.$pergunta.'", "'. $num_valor .'", "'.$resp1.'", "'.$resp2.'", "'.$resp3.'", "'.$resp4.'", "'.$resp_correta.'");');
                        $sql_mostrar=mysqli_query($conexao, $sql_cadastrar);
                        if($sql_mostrar) echo('<script>window.alert("Cadastrado com sucesso!");window.location="cadastrar_quest.php";</script>');
                    } else {
                        echo('<script>window.alert("Não foi possivel cadastrar, Numero da questão já utilizado! ");</script>');
                    }
                }
            ?>
        </section>
        <footer id="rodape"></footer>
    </main>

    <?php
        } else {
            header('location:../php/invalido.php');
    
        }                    
    ?>
    <script>
        function voltar() {
            location.href="admin.php";
        }
    </script>
</body>

</html>
