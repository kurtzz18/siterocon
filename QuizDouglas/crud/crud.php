<?php 
	session_start();
	if(isset($_SESSION['admin'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>Página de Administrador</title>
		<link rel="stylesheet" type="text/css" href="../css/crud.css">
		<link rel="icon" href="../img/admin.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/admin.png" type="image/x-icon" />
		<script type="text/javascript" src="../js/crud.js"></script>
		<meta charset="utf-8">
	</head>
	<body>
		<center>
			<a href="create.php"><div class="crud">C</div></a>
			<a href="read.php"><div class="crud">R</div></a>
			<a href="update.php"><div class="crud">U</div></a>
			<a href="delete.php"><div class="crud">D</div></a>
		</center>
		<br><br>
		<div class="sair"><a href="../invalido.php">Sair</a></div>
		<?php
		}else{
			header("location: ../invalido.php");
		}	
		?>
	</body>
</html>