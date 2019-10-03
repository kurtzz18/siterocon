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
    <link rel="stylesheet" type="text/css" href="../css/excluir.css">
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
                                <tr><td id="titulo_pergunta"> Código '.$row["id_quest"].' </td></tr>
                                <tr><td> '.$row["pergunta"].' </td></tr>
                                <tr><td><a href="excluir_quest.php?ex='.$row['id_quest'].'">
                                <svg version="1.1" id="lixinho"  x="0px" y="0px" width="20px" height="20px" viewBox="0 0 774.266 774.266" style="fill: #fff;">
                                        <g>
	                                        <g>
                                                <path d="M640.35,91.169H536.971V23.991C536.971,10.469,526.064,0,512.543,0c-1.312,0-2.187,0.438-2.614,0.875
                                                    C509.491,0.438,508.616,0,508.179,0H265.212h-1.74h-1.75c-13.521,0-23.99,10.469-23.99,23.991v67.179H133.916
                                                    c-29.667,0-52.783,23.116-52.783,52.783v38.387v47.981h45.803v491.6c0,29.668,22.679,52.346,52.346,52.346h415.703
                                                    c29.667,0,52.782-22.678,52.782-52.346v-491.6h45.366v-47.981v-38.387C693.133,114.286,670.008,91.169,640.35,91.169z
                                                     M285.713,47.981h202.84v43.188h-202.84V47.981z M599.349,721.922c0,3.061-1.312,4.363-4.364,4.363H179.282
                                                    c-3.052,0-4.364-1.303-4.364-4.363V230.32h424.431V721.922z M644.715,182.339H129.551v-38.387c0-3.053,1.312-4.802,4.364-4.802
                                                    H640.35c3.053,0,4.365,1.749,4.365,4.802V182.339z"/>
                                                <rect x="475.031" y="286.593" width="48.418" height="396.942"/>
                                                <rect x="363.361" y="286.593" width="48.418" height="396.942"/>
                                                <rect x="251.69" y="286.593" width="48.418" height="396.942"/>
                                            </g>
                                        </g>
                                    </svg></a></td></tr>');
                        }
                    ?>
            </table>
        </section>
            <?php 
                if(isset($_GET['ex'])){
                    $cod=$_GET['ex'];
                    $sql_del=('delete from questoes where id_quest='.$cod.';');
                    $sql_rodar=mysqli_query($conexao, $sql_del);
					echo('<script>window.alert("Apagado com sucesso");window.location="excluir_quest.php";</script>');
                }
            ?>
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
