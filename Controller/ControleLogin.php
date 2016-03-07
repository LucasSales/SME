<?php  
include_once('../Model/UsuarioDAO.php');
include_once('ControladorUsuario.php');

$usuarioDAO = new UsuarioDAO();
$controlador = new ControladorUsuario();

if(!isset($_SESSION)){
	session_start();
}

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
	if($acao == "sair"){
		session_destroy();
		header('../index.php');
	}
}else if(isset($_GET['acao'])){
	$acao = $_GET['acao'];
	if($acao == "sair"){
		session_destroy();
		header('../index.php');
	}
}

$login = $_POST['email_login'];
$senha = $_POST['password_login'];


$bool1 = $usuarioDAO->usuarioExiste($login,$senha);
$bool2 = $usuarioDAO->isAdmin($login,$senha);



if($bool1){
	$_SESSION['email_login'] = $login;
	$_SESSION['password_senha'] = $senha;
	$idRegional = 1;
	$lista = $controlador->buscarAllUsuario();
	foreach ($lista as $user) {
		if($user->email == $login) $idRegional = $user->idRegional;
	}

	header('location:../coord/index.php?regional='.$idRegional);
} else if($bool2){
	$_SESSION['admin'] = "admin";
	$_SESSION['email_login'] = $login;
	$_SESSION['password_senha'] = $senha;

	header('location:../admin/index.php');
}else{
	unset ($_SESSION['email_login']); 
	unset ($_SESSION['password_senha']); 
	header('location:../index.php'); 
}


