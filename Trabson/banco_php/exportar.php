<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$nomebanco = 'quiz_atualizado';


$conexao = mysqli_connect($host,$usuario,$senha,$nomebanco)or die('Erro de conexao'.mysqli_error());

$tabelas = array();
$result = mysqli_query($conexao,"SHOW TABLES;");
while($linha = mysqli_fetch_row($result)){
  $tabelas[] = $linha[0];
}

$conteudo = '';
foreach($tabelas as $tabela){
  $result = mysqli_query($conexao,"SELECT * FROM ".$tabela);
  $qtd_campos = mysqli_num_fields($result);
  
  $conteudo .= 'DROP TABLE '.$tabela.';';
  $linha2 = mysqli_fetch_row(mysqli_query($conexao,"SHOW CREATE TABLE ".$tabela));
  $conteudo .= "\n\n".$linha2[1].";\n\n";
  
  for($cont=0;$cont<$qtd_campos;$cont++){
    while($linha = mysqli_fetch_row($result)){
      $conteudo .= "INSERT INTO ".$tabela." VALUES(";
      for($contar=0;$contar<$qtd_campos;$contar++){
        $linha[$contar] = addslashes($linha[$contar]);
        if(isset($linha[$contar])){ $conteudo .= '"'.$linha[$contar].'"';}
        else{ $conteudo .= '""';}
        if($contar<$qtd_campos-1){ $conteudo .= ',';}
      }
      $conteudo .= ");\n";
    }
  }
  $conteudo .= "\n\n\n";
}

$conteudo .= "#Todos os direitos reservados &copy; Robson palmeirense.";

$arquivo = fopen($nomebanco.'.sql','w+');
fwrite($arquivo,$conteudo);
fclose($arquivo);
echo "Backup feito com Sucesso!";

?>