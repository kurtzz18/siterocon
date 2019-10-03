<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$nomebanco = 'quiz_atualizado';

$conexao = mysqli_connect($host,$usuario,$senha);
mysqli_query($conexao,'CREATE DATABASE '.$nomebanco.';');
 
$banco = mysqli_select_db($conexao,$nomebanco);


$nomebanco = $nomebanco.'.sql';

$arquivo = fopen($nomebanco,'r+');
$conteudo = fread($arquivo,filesize($nomebanco));

$sql = explode(';',$conteudo);
foreach($sql as $executar){
  $result = mysqli_query($conexao,$executar);
  if($result){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$executar.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';
  }
}
fclose($arquivo);
echo 'Restaurado com sucesso!';

?>