<?php
	session_start();
	if(isset($_SESSION['nome'])){
?>
<html>
	<head>
	<meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/resp.css">
		<title>
			Tabela do Carnaval
		</title>
	</head>
	<body>
        
		<?php
			if (isset($_POST['resultado'])){
				echo('<table border="1px solid">');
				
				$y=1;
				
				$vencedor=0;
				$k=1;
				$j=1;
				$media = array();
				
				/*$media[1]=($_SESSION['medias1'][1]+$_SESSION['medias1'][2]+$_SESSION['medias1'][3])/3;
				$media[2]=($_SESSION['medias2'][1]+$_SESSION['medias2'][2]+$_SESSION['medias2'][3])/3;
				$media[3]=($_SESSION['medias3'][1]+$_SESSION['medias3'][2]+$_SESSION['medias3'][3])/3;
				$media[4]=($_SESSION['medias4'][1]+$_SESSION['medias4'][2]+$_SESSION['medias4'][3])/3;
				$media[5]=($_SESSION['medias5'][1]+$_SESSION['medias5'][2]+$_SESSION['medias5'][3])/3;
				$media[6]=($_SESSION['medias6'][1]+$_SESSION['medias6'][2]+$_SESSION['medias6'][3])/3;*/
				
					for($y=1;$y<=6;$y++){
						$media[$y]=array_sum($_SESSION['medias'.$y])/3;
						echo('<tr><td>'.$_SESSION['nome'][$y].'</td><td>'.number_format($media[$y],2).'</td></tr>');
							
						
					}
				
					$comparador=$media[1];
					$y=1;
					$v=1;

					for($y;$y<=6;$y++){
						
						if($media[$y]>$comparador){
							$comparador=$media[$y];
							$vencedor=$_SESSION['nome'][$y];
							$j++;
							
						}else if($media[1]>$media[$y]){
							$v++;
						}
					}
			
			$status = true;

			foreach($media as $value) {
				if($media[1] != $value) {
				$status = false;
			break;
			}
			
						
			}
			echo('</table><br/><br/>');
			if($status==true){
				echo ('<div class="final">Todos são iguais com média de '.number_format($media[1],2).'</div>'); 
			}else if($j>1){
					echo('<div class="final">'.$vencedor.' é o vencedor com média de '.number_format($comparador,2).'</div>');
				}else if($v==6){
						echo('<div class="final">'.$_SESSION['nome'][1].' é o vencedor com média de '.number_format($media[1],2).'</div>');
					}
					else{
						foreach($media as $indice => $value) {
					
						if($media[1] == $value) {
					
						echo('<div class="final">'.$_SESSION['nome'][$indice].' empatou com média de '.number_format($media[$indice],2).'</div>');
					
					}
				}
			}
			}
			
		?>
		<form name="resultado" action="#" method="POST">
			<input type="submit" name="finalizar" value="Finalizar"><br/>
            <input type="button" value="Imprimir" onClick="window.print()"/>
		</form>
        
		
		<?php
			if (isset($_POST['finalizar'])){
			
				session_destroy();
				header('location:index.php');
			}
	}else{
		header('location:index.php');
	}
			
		?>
		
	</body>
</html>
		