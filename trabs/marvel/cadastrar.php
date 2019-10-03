<html>
	<head>
		<title>Cadastro</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<meta name="theme-color" content="#ffc000">
		<link rel="icon" href="img/logo.png" type="image/x-icon" />
		<link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
		<meta charset="utf-8">
	</head>
	<body>
		<div class="form-cads">
			<form name="cads" class="cads" action="#" method="POST" autocomplete="off">
				<input type="text" name="nick" class="campotx" placeholder="Nickname" required><br>
				<input type="password" name="senha" class="campotx" placeholder="Senha" required><br>
				<input type="password" name="senha2" class="campotx" placeholder="Confirmar Senha" required><br>
				<input type="text" name="nome" class="campotx" placeholder="Nome" required><br>
				<b><input type="submit" name="cadastrar" class="botao" value="Cadastrar"></b>
			</form>
		</div>
		<div class="butcad">
			<a href="index.php" class="link">Login</a>
		</div>
	<?php
		include 'conexao.php';
		
		if(isset($_POST['cadastrar'])){
			$nick=$_POST['nick'];
			$senha=$_POST['senha'];
			$senha2=$_POST['senha2'];
			$nome=$_POST['nome'];
			
			$sqlconf=('select nick from usuarios where nick="'.$nick.'";');
			$igual = mysqli_query($conexao,$sqlconf);
			$array=mysqli_fetch_array($igual);
			
			if($nick==$array['nick']){
				echo('<script>window.alert("Esse nick já foi usado!"); window.location="cadastrar.php";</script>');
			}else{
				if($senha == $senha2){
					$senhasha1=sha1($senha);
				
					$sqlcads=('insert into usuarios(nick,senha,nome,cadastro) values ("'.$nick.'","'.$senhasha1.'","'.$nome.'",now());');
					$cads=mysqli_query($conexao,$sqlcads);
					if($cads){ 
						echo('<script>window.alert("'.$nome.', o cadastro foi um sucesso!");window.location="index.php";</script>');
					}else{
						echo('<script>window.alert("Não Cadastrado!");window.location="cadastrar.php";</script>');
					}
				}else{	
					echo('<script>window.alert("Senhas diferentes!"); window.location="cadastrar.php";</script>');
				}
			}
		}
	?>
</body>
</html>