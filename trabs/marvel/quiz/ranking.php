<?php 
	session_start();
	if(isset($_SESSION['nick'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>Ranking</title>
		<link rel="stylesheet" type="text/css" href="../css/quiz.css">
		<link rel="icon" href="../img/ving.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/ving.png" type="image/x-icon" />
	</head>
	<body>
	<div class="rank">
		<center>
		<h1>Melhores Pontuações do Quiz</h1>
		<table class="trank">
		<?php
			$sqlscore=('select * from score ORDER BY score DESC LIMIT 10;');
			$score = mysqli_query($conexao,$sqlscore);
			$posi=1;
			
				echo('
                <tr>
					<td ><center>Posição</center></td>
                    <td ><center>Nick</center></td>
                    <td ><center>Score</center></td>
                </tr>
                ');
				
                while($con = mysqli_fetch_array($score)){
					echo('
                        <tr>
							<td ><center>'.$posi.'</center></td>
							<td ><center>'.$con['nick'].'</center></td>
							<td ><center>'.$con['score'].'</center></td>
                        </tr>
                     ');
					 $posi++;
					 }
		?>
		</table>
		</center>
	</div>
	
	<div class="sair">
		<a href="../invalido.php">Sair</a>
	</div>
	
	<?php
		}else{
			header("location: ../invalido.php");
		}	
		?>
	</body>
</html>