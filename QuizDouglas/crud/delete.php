<?php 
	session_start();
	if(isset($_SESSION['admin'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>Destruição de Perguntas</title>
		<link rel="stylesheet" type="text/css" href="../css/crud.css">
		<link rel="icon" href="../img/admin.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/admin.png" type="image/x-icon" />
		<meta charset="utf-8">
		
	</head>
	<body>
	<div class="content">
		<form name="login" class="login" action="#" method="POST" autocomplete="off">
			<input type="text" name="id_perg" class="campotx" placeholder="Código da Pergunta" required><br>
			<input type="submit" name="excluir" class="botao" value="Excluir">
		</form>
		<?php
			if(isset($_POST['excluir'])){
					$id_perg=$_POST['id_perg'];
					
					
					$sqlexc=('delete from perguntas where id_perg = '.$id_perg.';');
					$excluir=mysqli_query($conexao,$sqlexc);
					if($excluir) echo('<script>window.alert("Excluido com sucesso!");window.location="read.php";</script>');
			}
		?>
		<br>
		<br>
		</div>
		<a href="crud.php"><div class="retornar">Retornar ao CRUD</div></a>
		<?php
		}else{
			header("location: ../invalido.php");
		}	
		?>
	</body>
</html>