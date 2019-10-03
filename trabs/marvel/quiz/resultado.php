<?php 
	session_start();
	if(isset($_SESSION['nick'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>Resultado</title>
		<link rel="stylesheet" type="text/css" href="../css/quiz.css">
		<link rel="icon" href="../img/ving.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/ving.png" type="image/x-icon" />
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$nick=$_SESSION['nick'];
			$score=$_SESSION['pontuacao'];
			$sqlscore=('insert into score(score,nick) values ('.$score.',"'.$nick.'");');
			$okoko=mysqli_query($conexao,$sqlscore);
			echo('<script>window.alert("Parabéns '.$_SESSION['nick'].', você concluiu o quiz do UCM!");window.location="ranking.php";</script>');
		?>
		<?php
		}else{
			header("location: ../invalido.php");
		}	
		?>
	</body>
</html>