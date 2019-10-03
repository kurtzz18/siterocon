<?php 
	session_start();
	if(isset($_SESSION['admin'])){
		include('../conexao.php');
 ?>
<html>
	<head>
		<title>Leitura de Perguntas</title>
		<link rel="stylesheet" type="text/css" href="../css/crud.css">
		<link rel="icon" href="../img/admin.png" type="image/x-icon" />
		<link rel="shortcut icon" href="../img/admin.png" type="image/x-icon" />
		<meta charset="utf-8">
		
	</head>
	<body>
	<?php
			$sql_exibir = ('select * from perguntas;');
			$resul = mysqli_query($conexao,$sql_exibir);
            
			 echo('<table class="tread" >
                <tr class="indice">
                    <td style="border:2px solid;"><center>Código</center></td>
                    <td style="border:2px solid;"><center>Pergunta</center></td>
                    <td style="border:2px solid;"><center>Correta</center></td>
                    <td style="border:2px solid;"><center>Errada 1</center></td>
                    <td style="border:2px solid;"><center>Errada 2</center></td>
                    <td style="border:2px solid;"><center>Errada 3</center></td>
                    <td style="border:2px solid;"><center>Nº da Pergunta</center></td>
                </tr>
                ');
				
                while($con = mysqli_fetch_array($resul)){
					echo('
                        <tr>
							<td style="border:2px solid;"><center>'.$con['id_perg'].'</center></td>
							<td style="border:2px solid;"><center>'.$con['perg'].'</center></td>
							<td style="border:2px solid;"><center>'.$con['correta'].'</center></td>
							<td style="border:2px solid;"><center>'.$con['errada1'].'</center></td>
							<td style="border:2px solid;"><center>'.$con['errada2'].'</center></td>
							<td style="border:2px solid;"><center>'.$con['errada3'].'</center></td>
							<td style="border:2px solid;"><center>'.$con['numeroperg'].'</center></td>
                        </tr>
                     ');}
			?>
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