<?php 
	
  include("/var/www/html/SistemaSME/Model/AlunoDAO.php");
  include("/var/www/html/SistemaSME/Model/Aluno.php");

  $aluno = new Aluno();
  $alunoDAO = new AlunoDAO();

  if(isset($_POST['nomeAluno'])){
    $aluno->idEscola = $_POST['idEscola'];
    $aluno->nome = $_POST['nomeAluno'];

    $alunoDAO->inserirAluno($aluno);
  }

  /*$i = 0;
  $periodo = array();

  $periodo[0] = '1 Periodo';
  $periodo[1] = '2 Periodo';
  $periodo[2] = '3 Periodo';
  $periodo[3] = '4 Periodo';
    
  if((isset($_POST['nomeAluno']))){
    
    $nivelOrt = array();
    $nivelSila = array();
    $nivelPreSila = array();
    $nivelAfalb = array();
    $nivelSilaAfalb = array();
    
    $aluno->nome = $_POST['nomeAluno'];
    $aluno->nivel = $_POST['nivel'];
    $aluno->idEscola = $_POST['idEscola'];
    $aluno->periodo = $_POST['periodo'];
  

    $alunoDAO->inserirAluno($aluno);
    
    
    for($i = 0; $i < 4; $i++){

      $nivelPreSila[$i] = $alunoDAO->getQtdPorMesPreSilabico($i,$aluno->idEscola);

      $nivelSila[$i] = $alunoDAO->getQtdPorMesSilabico($i,$aluno->idEscola);

      $nivelSilaAfalb[$i] = $alunoDAO->getQtdPorMesSilabicoAfalb($i,$aluno->idEscola);

      $nivelAfalb[$i] = $alunoDAO->getQtdPorMesAfalbetico($i,$aluno->idEscola);

      $nivelOrt[$i] = $alunoDAO->getQtdPorMesOrtagrafico($i,$aluno->idEscola);
    }
    
  }else if(!(empty($_GET['idEscola']))){

    $nivelOrt = array();
    $nivelSila = array();
    $nivelPreSila = array();
    $nivelAfalb = array();
    $nivelSilaAfalb = array();
    
    $aluno->idEscola = $_GET['idEscola'];
    

    for($i = 0; $i < 4; $i++){

      $nivelPreSila[$i] = $alunoDAO->getQtdPorMesPreSilabico($i,$aluno->idEscola);

      $nivelSila[$i] = $alunoDAO->getQtdPorMesSilabico($i,$aluno->idEscola);

      $nivelSilaAfalb[$i] = $alunoDAO->getQtdPorMesSilabicoAfalb($i,$aluno->idEscola);

      $nivelAfalb[$i] = $alunoDAO->getQtdPorMesAfalbetico($i,$aluno->idEscola);

      $nivelOrt[$i] = $alunoDAO->getQtdPorMesOrtagrafico($i,$aluno->idEscola);
    }

  }*/
?>