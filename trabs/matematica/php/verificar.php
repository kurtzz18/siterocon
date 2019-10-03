<?php 
    session_start();
    include('conexao.php');

    /* Pagina Entrar */

    if(isset($_POST['logar'])){
        $login=$_POST['login'];
        $senha=$_POST['senha'];
	$senha=strtolower($senha);
	$login=strtolower($login);
        $login=trim($login);
        $senha=trim($senha);

        $sql=('select * from usuarios where login="'.$login.'";');
        $sql_mostrar=mysqli_query($conexao, $sql);
        $cow=mysqli_fetch_array($sql_mostrar);

        $sql=('select * from usuarios where login="'.$login.'" and senha="'.sha1($senha.trim($cow["nome"])).'";');
        $sql_mostrar=mysqli_query($conexao, $sql);
        $row=mysqli_fetch_array($sql_mostrar);
            if($row["cargo"]==2){
                $_SESSION['usuario']=$row["login"];
                $_SESSION['nome']=$row["nome"];
                $_SESSION['cargo']=$row["cargo"];
                header('location:../admin/admin.php');
            }elseif($login==$row["login"] && $row["cargo"]!=2 && sha1($senha.trim($cow["nome"]))==$row["senha"]){
                $_SESSION['usuario']=$row["login"];
                $_SESSION['nome']=$row["nome"];
                $_SESSION['cargo']=$row["cargo"];
                header('location:../questoes/quest1.php');
            }
            else{
                echo('<script>window.alert("Usuario ou Senha incorretos!");window.location="../entrar.php";</script>');
            }
        }   

    if(isset($_POST['cadastrar'])){
        $nome=trim($_POST['nome_cadastro']);
        $login_cadastro=$_POST['login_cadastro'];
        $senha_cadastro=$_POST['senha_cadastro'];
        $confirm_senha=$_POST['confirm_senha'];
		$login_cadastro=strtolower($login_cadastro);
		$senha_cadastro=strtolower($senha_cadastro);
		$confirm_senha=strtolower($confirm_senha);

        $sql=('select * from usuarios where login="'.$login_cadastro.'";');
        $sql_mostrar=mysqli_query($conexao, $sql);
        $linhas=mysqli_num_rows($sql_mostrar);

        if($linhas==0)
            {
            if($senha_cadastro==$confirm_senha)
                {
					if(strlen($login_cadastro)>4 && strlen($senha_cadastro)>4){
                    $sqlcadastro=('insert into usuarios(nome, login, senha, pontuacao, cargo) values("'.$nome.'", "'.$login_cadastro.'", "'.sha1($senha_cadastro.trim($nome)).'", '. 0 .', '. 1 .');');
                    $query_cadastro=mysqli_query($conexao, $sqlcadastro);
					
                    echo('<script>alert("Perfil criado com sucesso!");window.location="../entrar.php";</script>');
                    } else {
						echo('<script>window.alert("Número de caracteres não atingido!");window.location="../entrar.php";</script>');
					}
                }
                    else
                        {
                            echo('<script>window.alert("Senhas não condizem!");window.location="../entrar.php";</script>');
                        }
            }else
                {
                    echo('<script>window.alert("Usuario invalido!");window.location="../entrar.php";</script>');
                }
    }

    /* Pagina Entrar */
?>
