<?php 
	include_once '/var/www/html/SistemaSME/Model/AlunoDAO.php';
	include_once '/var/www/html/SistemaSME/Model/Aluno.php';

	$alunoDAO = new AlunoDAO();
	$aluno = new Aluno();
	
	$idAluno = $id = $_GET['cod'];
	$idEscola = $_GET['idEscola'];

	$alunoDAO->removerAluno($idAluno);


	header("Location: http://localhost/SistemaSME/View/ListaAlunosEscolaNew.php?idEscola=$idEscola");

?>