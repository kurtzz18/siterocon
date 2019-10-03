<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
    include('../php/conexao.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Quiz </title>
    <link rel="stylesheet" type="text/css" href="../css/questoes.css">
</head>

<body>
    <div id="fundo"></div>
    <main>
        <header>
            <div id="information">
                <h1> <?php echo($_SESSION['nome']); ?> </h1>
                <h2>Pontuação: <?php echo($_SESSION['score_rascunho']); ?> </h2>
                <a href="../php/invalido.php">SAIR</a>
            </div>
        </header>

        <?php
            $sql=('select * from questoes where quiz_questao="6"');
            $sql_mostar=mysqli_query($conexao, $sql);
            $row=mysqli_fetch_array($sql_mostar);
        ?>

        <section>
            <div id="conteudo">
                <h1 id="questao_titulo">6ª Questão </h1><br>
                <div id="texto_questao">
                    <?php 
                        echo($row['pergunta']);
                    ?>
                </div>
                <form id="opcoes" action="#" method="post">
                    <div id="botoes">
                        <button class="botao_opc" value="<?php echo($row['opc_correta']);?>" name="resp1"><?php echo($row['resp1']); ?></button>
                        <button class="botao_opc" value="<?php echo($row['opc_correta']);?>" name="resp2"><?php echo($row['resp2']); ?></button>
                        <button class="botao_opc" value="<?php echo($row['opc_correta']);?>" name="resp3"><?php echo($row['resp3']); ?></button>
                        <button class="botao_opc" value="<?php echo($row['opc_correta']);?>" name="resp4"><?php echo($row['resp4']); ?></button>
                    </div>
                </form>
                <?php
                    if(isset($_POST['resp1'])){
                        $resp=$_POST['resp1'];
                        if($resp=="1"){
                            $_SESSION['score_rascunho']=$_SESSION['score_rascunho']+10;
                            header('location:quest7.php');
                        } else {
                            header('location:quest7.php');
                        }
                    }
                    if(isset($_POST['resp2'])){
                        $resp=$_POST['resp2'];
                        if($resp=="2"){
                            $_SESSION['score_rascunho']=$_SESSION['score_rascunho']+10;
                            header('location:quest7.php');
                        } else {
                            header('location:quest7.php');
                        }
                    }
                    if(isset($_POST['resp3'])){
                        $resp=$_POST['resp3'];
                        if($resp=="3"){
                            $_SESSION['score_rascunho']=$_SESSION['score_rascunho']+10;
                            header('location:quest7.php');
                        } else {
                            header('location:quest7.php');
                        }
                    }
                    if(isset($_POST['resp4'])){
                        $resp=$_POST['resp4'];
                        if($resp=="4"){
                            $_SESSION['score_rascunho']=$_SESSION['score_rascunho']+10;
                            header('location:quest7.php');
                        } else {
                            header('location:quest7.php');
                        }
                    }
                ?>
            </div>
        </section>
        <footer></footer>
    </main>
    <?php
        } else {
            header('location:../php/invalido.php');

        }                    
    ?>
    <script type="text/javascript">
        history.forward();
    </script>
</body>

</html>
