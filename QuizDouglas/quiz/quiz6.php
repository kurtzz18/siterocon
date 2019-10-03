<?php 
	session_start();
	if(isset($_SESSION['nick'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>6.</title>
		<link rel="stylesheet" type="text/css" href="../css/quiz.css">
		<link rel="icon" href="../img/ving.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/ving.png" type="image/x-icon" />
		<meta charset="utf-8">
	</head>
	<body>
	<div class="quiz">
		<?php  
			$sql_perguntas=('select * from perguntas where numeroperg=6;');
			$resul = mysqli_query($conexao,$sql_perguntas);
			$con = mysqli_fetch_array($resul);
			
				echo('
					<div class="pergunta">6. '.$con['perg'].'?</div><br>
					<form name="alternativas" action="#" method="POST">
						<input type="submit" name="alternativa" class="alternativa" value="'.$con['errada1'].'"><br>
						<input type="submit" name="alternativa" class="alternativa" value="'.$con['errada2'].'"><br>
						<input type="submit" name="alternativa" class="alternativa" value="'.$con['errada3'].'"><br>
						<input type="submit" name="alternativa1" class="alternativa" value="'.$con['correta'].'"><br>
					</form>
				');
				if(isset($_POST['alternativa1'])){
					$_SESSION['pontuacao']=$_SESSION['pontuacao']+10;
					header("location: quiz7.php");
				}else if(isset($_POST['alternativa'])){
					header("location: quiz7.php");
				}
			
			}else{
				header("location: ../invalido.php");
			}
		?>
	</div>
	</body>
</html>