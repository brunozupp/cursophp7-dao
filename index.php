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
	$user = new Usuario();
	$user->login("bruno", "trator");
	echo $user;

?>