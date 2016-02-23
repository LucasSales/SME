<?php  
	include_once '/var/www/html/SistemaSME/Model/AlunoDAO.php';
	include_once '/var/www/html/SistemaSME/Model/Aluno.php';

	$aluno = new Aluno();
	$alunoDAO = new AlunoDAO();

	$idAluno = $_GET['idAluno'];
	$aluno = $alunoDAO->getAluno($idAluno);
	
	if(isset($_POST['idAluno'])){
		$idAluno = $_POST['idAluno'];
    	$aluno->nome = $_POST['nomeAluno'];

    	$alunoDAO->editarAluno($aluno,$idAluno);

    	$aluno = $alunoDAO->getAluno($idAluno);

    	header("Location: http://localhost/SistemaSME/View/ListaAlunosEscolaNew.php?idEscola=$aluno->idEscola");
	}
?>