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
    <link rel="stylesheet" type="text/css" href="../css/alterar.css">
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
        <section id="listar">
            <table id="table_listar">
                <tr>
                    <td colspan="4" id="titulo_tabela">Lista de Questões</td>
                </tr>
                <?php 
                        $sql=('select * from questoes order by id_quest asc');
                        $mostrar_sql=mysqli_query($conexao, $sql);
                        while($row=mysqli_fetch_array($mostrar_sql)){
                            echo('
                                <tr><td colspan="4" id="titulo_pergunta"> Código da Questão: '.$row["id_quest"].' </td></tr>
                                <tr><td colspan="4">Numero da Questão: '.$row["quiz_questao"].'</td></tr>
                                <tr><td colspan="4"> '.$row["pergunta"].' </td></tr>
                                <tr>
                                    <td class="respostas"> 1° Resposta </td>
                                    <td class="respostas"> 2° Resposta </td>
                                    <td class="respostas"> 3° Resposta </td>
                                    <td class="respostas"> 4° Resposta </td>
                                </tr>
                                <tr>');
                                    if($row['opc_correta']==1){
                                        echo('<td style="background-color: rgba(255,255,255,0.2)">'.$row["resp1"].'</td>');
                                        echo('<td>'.$row["resp2"].'</td>');
                                        echo('<td>'.$row["resp3"].'</td>');
                                        echo('<td>'.$row["resp4"].'</td>');
                                    } elseif($row['opc_correta']==2){
                                        echo('<td>'.$row["resp1"].'</td>');
                                        echo('<td style="background-color: rgba(255,255,255,0.2)">'.$row["resp2"].'</td>');
                                        echo('<td>'.$row["resp3"].'</td>');
                                        echo('<td>'.$row["resp4"].'</td>');
                                    } elseif($row['opc_correta']==3){
                                        echo('<td>'.$row["resp1"].'</td>');
                                        echo('<td>'.$row["resp2"].'</td>');
                                        echo('<td style="background-color: rgba(255,255,255,0.2)">'.$row["resp3"].'</td>');
                                        echo('<td>'.$row["resp4"].'</td>');
                                    } else{
                                        echo('<td>'.$row["resp1"].'</td>');
                                        echo('<td>'.$row["resp2"].'</td>');
                                        echo('<td>'.$row["resp3"].'</td>');
                                        echo('<td style="background-color: rgba(255,255,255,0.2)">'.$row["resp4"].'</td>');
                                    }
                                echo('</tr>');
                        }
                    ?>
            </table>
        </section>
        <section id="formulario">
            <form method="POST" action="#" name="edit_form" autocomplete="off">
                <input class="cod" type="number" required="" placeholder="Código" name="codigo">
                <input type="submit" required="" value="Buscar" name="buscar">
            </form>

            <?php 
                if(isset($_POST['buscar'])){
                    $cod=$_POST['codigo'];
                    $sql=('select * from questoes where id_quest='.$cod.';');
                    $sql_mostrar=mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($sql_mostrar)){
                        $con=mysqli_fetch_array($sql_mostrar);
            ?>
            <form id="form_alter" method="POST" action="#" name="alt" autocomplete="off">
                <input class="cod" type="text" name="cod" placeholder="Código" value="<?php echo($con['id_quest']);?>" readonly>
                <textarea maxlength="255" name="pergunta" placeholder="Pergunta"><?php echo($con['pergunta']);?></textarea>
                <label class="container">
                    <input type="radio" value="1" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp1" placeholder="1° Pergunta"><?php echo($con['resp1']);?></textarea>
                <label class="container">
                    <input type="radio" value="2" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp2" placeholder="2° Resposta"><?php echo($con['resp2']);?></textarea>
                <label class="container">
                    <input type="radio" value="3" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp3" placeholder="3° Resposta"><?php echo($con['resp3']);?></textarea>
                <label class="container">
                    <input type="radio" value="4" name="resp_correta" required>
                    <span class="checkmark"></span>
                </label>
                <textarea maxlength="255" name="resp4" placeholder="4° Resposta"><?php echo($con['resp4']);?></textarea>
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
                <input type="submit" name="alterar" value="Alterar">
            </form>
            <?php
                }else{
                        echo('<script>window.alert("Valor Invalido!");</script>');
                    }
                }
                
                if(isset($_POST['alterar'])){
                    $resp_correta=$_POST['resp_correta'];
                    $cod=$_POST['cod'];
                    $pergunta=$_POST['pergunta'];
                    $resp1=$_POST['resp1'];
                    $resp2=$_POST['resp2'];
                    $resp3=$_POST['resp3'];
                    $resp4=$_POST['resp4'];
                    $num_valor=$_POST['num_valor'];
                    $comparar=('select * from questoes where quiz_questao="'.$num_valor.'";');
                    $comparar_mostrar=mysqli_query($conexao, $comparar);
                    $linhas=mysqli_num_rows($comparar_mostrar);
                    if($num_valor==0){
                        $sql_alter=('update questoes set quiz_questao="'. 0 .'", pergunta="'.$pergunta.'", resp1="'.$resp1.'", resp2="'.$resp2.'", resp3="'.$resp3.'", resp4="'.$resp4.'", opc_correta="'.$resp_correta.'"  where id_quest='.$cod.';');
                        $sql_mostrar=mysqli_query($conexao, $sql_alter);
                        if($sql_mostrar) echo('<script>window.alert("alterado com sucesso!");window.location="alterar.php";</script>');
                    } elseif($linhas==0 && $num_valor!="0") {
                        $sql_alter=('update questoes set quiz_questao="'. $num_valor .'", pergunta="'.$pergunta.'", resp1="'.$resp1.'", resp2="'.$resp2.'", resp3="'.$resp3.'", resp4="'.$resp4.'", opc_correta="'.$resp_correta.'"  where id_quest='.$cod.';');
                        $sql_mostrar=mysqli_query($conexao, $sql_alter);
                        if($sql_mostrar) echo('<script>window.alert("alterado com sucesso!");window.location="alterar.php";</script>');
                    } else {
                        echo('<script>window.alert("Não foi possivel alterar, Numero da questão já utilizado! ");</script>');
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
            location.href = "admin.php";
        }

    </script>
</body>

</html>
