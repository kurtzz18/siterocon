<html>
	<head>
		<title>UCM - Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<meta name="theme-color" content="#ffc000">
		<link rel="icon" href="img/ving.png" type="image/x-icon" />
		<link rel="shortcut icon" href="img/ving.png" type="image/x-icon" />
		<meta charset="utf-8">
	</head>
	<body>
		<div class="form-login">
			<form name="login" class="login" action="#" method="POST" autocomplete="off">
				<input type="text" name="nick" class="campotx" placeholder="Nickname" required><br>
				<input type="password" name="senha" class="campotx" placeholder="Senha" required><br>
				<b><input type="submit" name="logar" class="botao" value="Logar"></b>
			</form>
		</div>
		<div class="butlog">
			<a href="cadastrar.php" class="link">Cadastre-se</a>
		</div>
	
		
		<?php
		include 'conexao.php';

		session_start();

			if(isset($_POST['logar'])){
				$senha=$_POST['senha'];
				$nick=$_POST['nick'];
				
				$senhasha1=sha1($senha);

				$sqlpesq=('select * from usuarios where nick="'.$nick.'" and senha="'.$senhasha1.'";');
				$resul=mysqli_query($conexao,$sqlpesq);
				$array=mysqli_fetch_array($resul);
				
				
				
				if(mysqli_num_rows($resul)){
					if($array['nivel']==2){
						$_SESSION['admin']=$nick;
						echo('<script>window.alert("Olá '.$_SESSION['admin'].', Seja Bem Vindo a Página de Adm´s"); window.location="crud/crud.php";</script>');
					}
					if($array['nivel']==0){
						$_SESSION['ban']=$nick;
						echo('<script>window.alert("'.$_SESSION['ban'].', você foi banido"); window.location="ban.php";</script>');
					}
					
					$con=mysqli_fetch_array($resul);
					$_SESSION['nick']=$nick;
					
					echo('<script>window.alert("Bem vindo '.$_SESSION['nick'].'"); window.location="quiz/home.php";</script>');
					
				}else{
					echo('<script>window.alert("Erro"); window.location="index.php";</script>');
				}
			}

	?>
	</body>
</html>