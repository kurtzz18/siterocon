<?php 
	session_start();
	if(isset($_SESSION['admin'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>Atualização de Perguntas</title>
		<link rel="stylesheet" type="text/css" href="../css/crud.css">
		<link rel="icon" href="../img/admin.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/admin.png" type="image/x-icon" />
		<meta charset="utf-8">
		
	</head>
	<body>
	<div class="content">
		<form name="login" class="login" action="#" method="POST" autocomplete="off">
			<input type="text" name="id_perg" class="campotx" placeholder="Código da Pergunta" required><br>
			<input type="text" name="perg" class="campotx" placeholder="Pergunta" required><br>
			<input type="text" name="correta" class="campotx" placeholder="Alternativa Correta" required><br>
			<input type="text" name="errada1" class="campotx" placeholder="Alternativa Errada" required><br>
			<input type="text" name="errada2" class="campotx" placeholder="Alternativa Errada" required><br>
			<input type="text" name="errada3" class="campotx" placeholder="Alternativa Errada" required><br>
			<input type="text" name="numeroperg" class="campotx" placeholder="Numero da Pergunta" required><br>
			<input type="submit" name="att" class="botao" value="Atualizar">
		</form>
		<?php
			if(isset($_POST['att'])){
					$id_perg=$_POST['id_perg'];
					$perg=$_POST['perg'];
					$correta=$_POST['correta'];
					$errada1=$_POST['errada1'];
					$errada2=$_POST['errada2'];
					$errada3=$_POST['errada3'];
					$numeroperg=$_POST['numeroperg'];
					
					$sqlatt=('update perguntas set perg = "'.$perg.'", correta = "'.$correta.'", errada1 = "'.$errada1.'", 
					errada2 = "'.$errada2.'", errada3 = "'.$errada3.'", numeroperg='.$numeroperg.' where id_perg = '.$id_perg.';');
					$atualizar=mysqli_query($conexao,$sqlatt);
					if($atualizar) echo('<script>window.alert("Atualizado com sucesso!");window.location="read.php";</script>');
			}
		?>
		</div>
		<br>
		<br>
		<a href="crud.php"><div class="retornar">Retornar ao CRUD</div></a>
		<?php
		}else{
			header("location: ../invalido.php");
		}	
		?>
	</body>
</html>