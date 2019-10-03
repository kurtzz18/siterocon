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
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
    <div id="fundo"></div>
    <main>
        <button id="btn_voltar" onclick="voltar()">
            <svg version="1.1" id="Layer_1" x="20px" y="0px" viewBox="0 0 500 500" style="fill: #fff;">
                <g>
                    <path d="M198.608,246.104L382.664,62.04c5.068-5.056,7.856-11.816,7.856-19.024c0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12
			C361.476,2.792,354.712,0,347.504,0s-13.964,2.792-19.028,7.864L109.328,227.008c-5.084,5.08-7.868,11.868-7.848,19.084
			c-0.02,7.248,2.76,14.028,7.848,19.112l218.944,218.932c5.064,5.072,11.82,7.864,19.032,7.864c7.208,0,13.964-2.792,19.032-7.864
			l16.124-16.12c10.492-10.492,10.492-27.572,0-38.06L198.608,246.104z" />
                </g>
            </svg>
        </button>
        <section id="boas_vindas">
            <h1>Seja Bem Vindo <?php echo($_SESSION['nome']); ?>!</h1>
            <a href="../php/invalido.php">SAIR</a>
            <a id="btn_quiz" href="../questoes/quest1.php">FAZER QUIZ</a>
        </section>
		<div id="botoes_adm">
                <button class="botao_opc" onclick="list()">Listar Questões</button><br>
                <button class="botao_opc" onclick="alter()">Alterar Questões</button><br>
                <button class="botao_opc" onclick="ex_quest()">Excluir Questões</button><br>
                <button class="botao_opc" onclick="ex_usu()">Excluir Usuarios</button><br>
                <button class="botao_opc" onclick="cadastrar()">Cadastrar Questões</button>
            </div>
        <section id="listar">
            <table id="table_listar">
                <tr>
                    <td colspan="4" id="titulo_tabela">Lista de Questões</td>
                </tr>
                <?php 
                        $num=1;
                        $sql=('select * from questoes order by id_quest asc');
                        $mostrar_sql=mysqli_query($conexao, $sql);
                        while($row=mysqli_fetch_array($mostrar_sql)){
                            echo('
                                <form name="form1" method="post">
                                <tr><td colspan="4" id="titulo_pergunta">'.$num.'° Questão</td></tr>
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
                            $num++;
                        }
                    ?>
            </table>
        </section>
        <footer id="rodape"></footer>
    </main>

    <?php
        } else {
            header('location:../php/invalido.php');
    
        }                    
    ?>
    <script type="text/javascript">
        function list() {
            document.getElementById("botoes_adm").style.display = "none";
            document.getElementById("rodape").style.display = "block";
            document.getElementById("listar").style.display = "block";
            document.getElementById("btn_voltar").style.display = "block";
        }

        function voltar() {
            document.getElementById("botoes_adm").style.display = "block";
            document.getElementById("rodape").style.display = "none";
            document.getElementById("listar").style.display = "none";
            document.getElementById("btn_voltar").style.display = "none";
        }

        function alter() {
            location.href = "alterar.php";
        }

        function ex_quest() {
            location.href = "excluir_quest.php";
        }

        function ex_usu() {
            location.href = "excluir_usu.php";
        }

        function cadastrar() {
            location.href = "cadastrar_quest.php";
        }

    </script>
</body>

</html>
