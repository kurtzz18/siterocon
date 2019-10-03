<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
    include('php/conexao.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Quiz </title>
    <link rel="stylesheet" type="text/css" href="css/alterar.css">
</head>

<body>
    <div id="fundo"></div>
    <main>
        </button>
        <section id="boas_vindas">
            <h1>Ranking</h1>
            <a href="php/invalido.php">SAIR</a>
            <a id="refazer" href="questoes/quest1.php">REFAZER QUIZ</a>
        </section>
        <section id="listar">
            <table id="table_listar">
                <tr id="titulo_pergunta" style="font-size:25px;">
                    <td>Colocação</td>
                    <td>Nome</td>
                    <td>Pontuação</td>
                </tr>
                <?php 
                        $k=1;
                        $sql=('select * from usuarios order by pontuacao desc');
                        $mostrar_sql=mysqli_query($conexao, $sql);
                        while($row=mysqli_fetch_array($mostrar_sql)){
                            echo('
                                <tr><td>'.$k.'° </td><td>'.$row["nome"].' </td><td> '.$row["pontuacao"].' </td></tr>');
                            $k++;
                        }
                    ?>
            </table>
        </section>
        <footer id="rodape"></footer>
    </main>
    <?php
        } else {
            header('location:php/invalido.php');
        }                    
        ?>
</body>

</html>
