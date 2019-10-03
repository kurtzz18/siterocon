<?php 
	session_start();
	if(isset($_SESSION['ban'])){
		include('conexao.php');
 ?>
 <html>
	<head>
		<title>Banimento</title>
		<link rel="stylesheet" type="text/css" href="css/quiz.css">
		<link rel="stylesheet" type="text/css" href="css/crud.css">
		<link rel="icon" href="img/ving.png" type="image/x-icon" />
		<link rel="shortcut icon" href="img/ving.png" type="image/x-icon" />
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		echo('<center><h1 class="ban">'.$_SESSION['ban'].' você foi banido por um período indeterminado</h1></center>');
		
		}else{
			header("location: invalido.php");
		}	
		?>
		<a href="invalido.php"><div class="sair">Sair</div></a>
	</body>
</html>