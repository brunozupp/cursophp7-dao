<?php 

	require_once("config.php");

	// Carrega um usuário
	//$user = new Usuario();
	//$user->loadById(3);
	//echo $user;

	// Carrega uma lista de usuários
	//$lista = Usuario::getList();
	//echo json_encode($lista);

	// Carrega uma lista de usuários buscando pelo login
	//$search = Usuario::search("u");
	//echo json_encode($search);

	// Carrega um usuário usando o login e a senha
	//$user = new Usuario();
	//$user->login("bruno", "trator");
	//echo $user;

	// Criando um novo usuário
	//$aluno = new Usuario("aluno3", "@lun@3");
	//$aluno->insert();
	//echo $aluno;

	// Atualizando usuário
	//$usuario = new Usuario();
	//$usuario->loadById(8);
	//$usuario->update("professor", "!@#$%¨&*");
	//echo $usuario;

	// Deletando usuário
	$usuario = new Usuario();
	$usuario->loadById(7);
	$usuario->delete();

	echo $usuario;

?>