<?php 
	session_start();
	if(isset($_SESSION['admin'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>Cadastro de Perguntas</title>
		<link rel="stylesheet" type="text/css" href="../css/crud.css">
		<link rel="icon" href="../img/admin.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/admin.png" type="image/x-icon" />
		<meta charset="utf-8">
		
	</head>
	<body>
	<div class="content">
		<form name="login" class="login" action="#" method="POST" autocomplete="off">
			<input type="text" name="perg" class="campotx" placeholder="Pergunta" required><br>
			<input type="text" name="correta" class="campotx" placeholder="Alternativa Correta" required><br>
			<input type="text" name="errada1" class="campotx" placeholder="Alternativa Errada" required><br>
			<input type="text" name="errada2" class="campotx" placeholder="Alternativa Errada" required><br>
			<input type="text" name="errada3" class="campotx" placeholder="Alternativa Errada" required><br>
			<input type="text" name="numeroperg" class="campotx" placeholder="Número da Pergunta" required><br>
			<input type="submit" name="enviar" class="botao" value="Enviar">
		</form>
	
		<?php
			if(isset($_POST['enviar'])){
					$perg=$_POST['perg'];
					$correta=$_POST['correta'];
					$errada1=$_POST['errada1'];
					$errada2=$_POST['errada2'];
					$errada3=$_POST['errada3'];
					$numeroperg=$_POST['numeroperg'];
					
					$sqlnum=('select numeroperg from perguntas;');
					$igual = mysqli_query($conexao,$sqlnum);
					$con=mysqli_fetch_array($igual);
					
					if($numeroperg==$con['numeroperg']){
						echo('<script>window.alert("Pergunta com esse numero já existe!"); window.location="create.php";</script>');
					}
					$sqlperg=('insert into perguntas(perg,correta,errada1,errada2,errada3,numeroperg) 
					values ("'.$perg.'","'.$correta.'","'.$errada1.'","'.$errada2.'","'.$errada3.'",'.$numeroperg.');');
					$inserir=mysqli_query($conexao,$sqlperg);
					if($inserir) echo('<script>window.alert("Inserido com sucesso!");window.location="read.php";</script>');
			}
		?>
		<br>
		<br>
		</div>
		<div class="retornar"><a href="crud.php">Retornar ao CRUD</a></div>
		<?php
		}else{
			header("location: ../invalido.php");
		}	
		?>
	</body>
</html>