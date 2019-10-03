<html !DOCTYPE>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/verify.css">
</head>

<body>
    <?php
			
			if (isset($_POST['enviar'])){
				session_start();
				$x=1;
				$y=1;
				/*for($r=1;$r<=6;$r++){
					$variavel='sala'.$r.'j1';
					$$variavel[$r]=array();
				
				}*/
				$jurado1s1=array();
				$jurado1s2=array();
				$jurado1s3=array();
				$jurado1s4=array();
				$jurado1s5=array();
				$jurado1s6=array();
				
				/*for($r=1;$r<=6;$r++){
					$variavel='sala'.$r.'j2';
					$$variavel[$r]=array();
				
				}*/
				$jurado2s1=array();
				$jurado2s2=array();
				$jurado2s3=array();
				$jurado2s4=array();
				$jurado2s5=array();
				$jurado2s6=array();
				
				/*for($r=1;$r<=6;$r++){
					$variavel='sala'.$r.'j2';
					$$variavel[$r]=$r;
				
				}*/
				$jurado3s1=array();
				$jurado3s2=array();
				$jurado3s3=array();
				$jurado3s4=array();
				$jurado3s5=array();
				$jurado3s6=array();
				
				
				$nome = array(1=>"1 Info",2=>"2 Info",3=>"3 Info",4=>"1 Adm",5=>"2 Adm",6=>"3 Adm",);
				$jurados=3;
				$quesitos=11;
			
			
					for($y=1;$y<=$quesitos;$y++){
						$jurado1s1[$y]=$_POST['n'.$y.'s1j1'];
						$jurado1s2[$y]=$_POST['n'.$y.'s2j1'];
						$jurado1s3[$y]=$_POST['n'.$y.'s3j1'];
						$jurado1s4[$y]=$_POST['n'.$y.'s4j1'];
						$jurado1s5[$y]=$_POST['n'.$y.'s5j1'];
						$jurado1s6[$y]=$_POST['n'.$y.'s6j1'];
						
						$jurado2s1[$y]=$_POST['n'.$y.'s1j2'];
						$jurado2s2[$y]=$_POST['n'.$y.'s2j2'];
						$jurado2s3[$y]=$_POST['n'.$y.'s3j2'];
						$jurado2s4[$y]=$_POST['n'.$y.'s4j2'];
						$jurado2s5[$y]=$_POST['n'.$y.'s5j2'];
						$jurado2s6[$y]=$_POST['n'.$y.'s6j2'];
						
						$jurado3s1[$y]=$_POST['n'.$y.'s1j3'];
						$jurado3s2[$y]=$_POST['n'.$y.'s2j3'];
						$jurado3s3[$y]=$_POST['n'.$y.'s3j3'];
						$jurado3s4[$y]=$_POST['n'.$y.'s4j3'];
						$jurado3s5[$y]=$_POST['n'.$y.'s5j3'];
						$jurado3s6[$y]=$_POST['n'.$y.'s6j3'];
						
					}
				
			$medias1=array();
			$medias2=array();
			$medias3=array();
			$medias4=array();
			$medias5=array();
			$medias6=array();
			
			//Primeiro quesito
			
			$medias1[1]=(($jurado1s1[1]+$jurado1s1[2]+$jurado1s1[3]+$jurado1s1[4])/4+($jurado2s1[1]+$jurado2s1[2]+$jurado2s1[3]+$jurado2s1[4])/4+
			($jurado3s1[1]+$jurado3s1[2]+$jurado3s1[3]+$jurado3s1[4])/4)/3;	
			
			$medias2[1]=(($jurado1s2[1]+$jurado1s2[2]+$jurado1s2[3]+$jurado1s2[4])/4+($jurado2s2[1]+$jurado2s2[2]+$jurado2s2[3]+$jurado2s2[4])/4+
			($jurado3s2[1]+$jurado3s2[2]+$jurado3s2[3]+$jurado3s2[4])/4)/3;
			
			$medias3[1]=(($jurado1s3[1]+$jurado1s3[2]+$jurado1s3[3]+$jurado1s3[4])/4+($jurado2s3[1]+$jurado2s3[2]+$jurado2s3[3]+$jurado2s3[4])/4+
			($jurado3s3[1]+$jurado3s3[2]+$jurado3s3[3]+$jurado3s3[4])/4)/3;
			
			$medias4[1]=(($jurado1s4[1]+$jurado1s4[2]+$jurado1s4[3]+$jurado1s4[4])/4+($jurado2s4[1]+$jurado2s4[2]+$jurado2s4[3]+$jurado2s4[4])/4+
			($jurado3s4[1]+$jurado3s4[2]+$jurado3s4[3]+$jurado3s4[4])/4)/3;
			
			$medias5[1]=(($jurado1s5[1]+$jurado1s5[2]+$jurado1s5[3]+$jurado1s5[4])/4+($jurado2s5[1]+$jurado2s5[2]+$jurado2s5[3]+$jurado2s5[4])/4+
			($jurado3s5[1]+$jurado3s5[2]+$jurado3s5[3]+$jurado3s5[4])/4)/3;
			
			$medias6[1]=(($jurado1s6[1]+$jurado1s6[2]+$jurado1s6[3]+$jurado1s6[4])/4+($jurado2s6[1]+$jurado2s6[2]+$jurado2s6[3]+$jurado2s6[4])/4+
			($jurado3s6[1]+$jurado3s6[2]+$jurado3s6[3]+$jurado3s6[4])/4)/3;
			
			
			//Segundo quesito
			
			$medias1[2]=(($jurado1s1[5]+$jurado1s1[6]+$jurado1s1[7])/3+($jurado2s1[5]+$jurado2s1[6]+$jurado2s1[7])/3+
			($jurado3s1[5]+$jurado3s1[6]+$jurado3s1[7])/3)/3;
			
			$medias2[2]=(($jurado1s2[5]+$jurado1s2[6]+$jurado1s2[7])/3+($jurado2s2[5]+$jurado2s2[6]+$jurado2s2[7])/3+
			($jurado3s2[5]+$jurado3s2[6]+$jurado3s2[7])/3)/3;
			
			$medias3[2]=(($jurado1s3[5]+$jurado1s3[6]+$jurado1s3[7])/3+($jurado2s3[5]+$jurado2s3[6]+$jurado2s3[7])/3+
			($jurado3s3[5]+$jurado3s3[6]+$jurado3s3[7])/3)/3;
			
			$medias4[2]=(($jurado1s4[5]+$jurado1s4[6]+$jurado1s4[7])/3+($jurado2s4[5]+$jurado2s4[6]+$jurado2s4[7])/3+
			($jurado3s4[5]+$jurado3s4[6]+$jurado3s4[7])/3)/3;
			
			$medias5[2]=(($jurado1s5[5]+$jurado1s5[6]+$jurado1s5[7])/3+($jurado2s5[5]+$jurado2s5[6]+$jurado2s5[7])/3+
			($jurado3s5[5]+$jurado3s5[6]+$jurado3s5[7])/3)/3;
			
			$medias6[2]=(($jurado1s6[5]+$jurado1s6[6]+$jurado1s6[7])/3+($jurado2s6[5]+$jurado2s6[6]+$jurado2s6[7])/3+
			($jurado3s6[5]+$jurado3s6[6]+$jurado3s6[7])/3)/3;
			
			//Terceiro queisito
			
			$medias1[3]=(($jurado1s1[8]+$jurado1s1[9]+$jurado1s1[10]+$jurado1s1[11])/4+($jurado2s1[8]+$jurado2s1[9]+$jurado2s1[10]+$jurado2s1[11])/4+
			($jurado3s1[8]+$jurado3s1[9]+$jurado3s1[10]+$jurado3s1[11])/4)/3;
			
			$medias2[3]=(($jurado1s2[8]+$jurado1s2[9]+$jurado1s2[10]+$jurado1s2[11])/4+($jurado2s2[8]+$jurado2s2[9]+$jurado2s2[10]+$jurado2s2[11])/4+
			($jurado3s2[8]+$jurado3s2[9]+$jurado3s2[10]+$jurado3s2[11])/4)/3;
			
			$medias3[3]=(($jurado1s3[8]+$jurado1s3[9]+$jurado1s3[10]+$jurado1s3[11])/4+($jurado2s3[8]+$jurado2s3[9]+$jurado2s3[10]+$jurado2s3[11])/4+
			($jurado3s3[8]+$jurado3s3[9]+$jurado3s3[10]+$jurado3s3[11])/4)/3;
			
			$medias4[3]=(($jurado1s4[8]+$jurado1s4[9]+$jurado1s4[10]+$jurado1s4[11])/4+($jurado2s4[8]+$jurado2s4[9]+$jurado2s4[10]+$jurado2s4[11])/4+
			($jurado3s4[8]+$jurado3s4[9]+$jurado3s4[10]+$jurado3s4[11])/4)/3;
			
			$medias5[3]=(($jurado1s5[8]+$jurado1s5[9]+$jurado1s5[10]+$jurado1s5[11])/4+($jurado2s5[8]+$jurado2s5[9]+$jurado2s5[10]+$jurado2s5[11])/4+
			($jurado3s5[8]+$jurado3s5[9]+$jurado3s5[10]+$jurado3s5[11])/4)/3;
			
			$medias6[3]=(($jurado1s6[8]+$jurado1s6[9]+$jurado1s6[10]+$jurado1s6[11])/4+($jurado2s6[8]+$jurado2s6[9]+$jurado2s6[10]+$jurado2s6[11])/4+
			($jurado3s6[8]+$jurado3s6[9]+$jurado3s6[10]+$jurado3s6[11])/4)/3;
			
		
			echo('<table>');
			echo('<tr><td colspan="4">Media por quesito</td></tr><tr><td>Nome </td><td> Mestre Sala e Porta bandeira </td><td> Comissão de Frente </td><td>Sala</td></tr>
			<tr><td>'.$nome[1].'</td><td>'.number_format($medias1[1],2).'</td><td>'.number_format($medias1[2],2).'</td><td>'.number_format($medias1[3],2).'</td></tr>
			<tr><td>'.$nome[2].'</td><td>'.number_format($medias2[1],2).'</td><td>'.number_format($medias2[2],2).'</td><td>'.number_format($medias2[3],2).'</td></tr>
			<tr><td>'.$nome[3].'</td><td>'.number_format($medias3[1],2).'</td><td>'.number_format($medias3[2],2).'</td><td>'.number_format($medias3[3],2).'</td></tr>
			<tr><td>'.$nome[4].'</td><td>'.number_format($medias4[1],2).'</td><td>'.number_format($medias4[2],2).'</td><td>'.number_format($medias4[3],2).'</td></tr>
			<tr><td>'.$nome[5].'</td><td>'.number_format($medias5[1],2).'</td><td>'.number_format($medias5[2],2).'</td><td>'.number_format($medias5[3],2).'</td></tr>
			<tr><td>'.$nome[6].'</td><td>'.number_format($medias6[1],2).'</td><td>'.number_format($medias6[2],2).'</td><td>'.number_format($medias6[3],2).'</td></tr>
			</table>');
				
				$_SESSION['medias1']  = $medias1;
				$_SESSION['medias2']  = $medias2;
				$_SESSION['medias3']  = $medias3;
				$_SESSION['medias4']  = $medias4;
				$_SESSION['medias5']  = $medias5;
				$_SESSION['medias6']  = $medias6;
				$_SESSION['nome']  = $nome;
			
			
				
			}else{
				header('location:index.php');
			}
			
			?>
    <form name="resultado" action="res.php" method="POST">
        <input type="submit" name="resultado" value="Resultado"><br />
        <input type="button" value="Imprimir" onClick="window.print()"/>
    </form>

</body>

</html>
