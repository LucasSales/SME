<?php 
  
	include_once ('/var/www/html/SistemaSME/Model/AlunoDAO.php');
	$alunoDAO = new AlunoDAO();
	
	$periodo = array();
	$nivelOrt = array();
  	$nivelSila = array();
  	$nivelPreSila = array();
  	$nivelAfalb = array();
  	$nivelSilaAfalb = array();

	if(isset($_POST['formEscola'])){

		$idRegional = $_POST['regional'];
		$idPeriodo = $_POST['periodo'];
		$idEsc =$_POST['idEscola'];

		$arrayAlunos = $alunoDAO->getAlunosEscola($idEsc);

		$nivel = array();
	    $nomeNivel = array();
	    $cor = array();
	    $i = 0;
	    for($i = 0; $i < 4; $i++){

	      $nivelPreSila[$i] = $alunoDAO->getQtdPorMesPreSilabico($i,$idEsc);

	      $nivelSila[$i] = $alunoDAO->getQtdPorMesSilabico($i,$idEsc);

	      $nivelSilaAfalb[$i] = $alunoDAO->getQtdPorMesSilabicoAfalb($i,$idEsc);

	      $nivelAfalb[$i] = $alunoDAO->getQtdPorMesAfalbetico($i,$idEsc);

	      $nivelOrt[$i] = $alunoDAO->getQtdPorMesOrtagrafico($i,$idEsc);
	    }
	}else{
		
		$idRegional = $_GET['regional'];
		$idPeriodo = $_GET['periodo'];
		$idEsc =$_GET['idEscola'];
		

		$arrayAlunos = $alunoDAO->getAlunosEscola($idEsc);

	    $i = 0;
	    for($i = 0; $i < 4; $i++){

	      $nivelPreSila[$i] = $alunoDAO->getQtdPorMesPreSilabico($i,$idEsc);

	      $nivelSila[$i] = $alunoDAO->getQtdPorMesSilabico($i,$idEsc);

	      $nivelSilaAfalb[$i] = $alunoDAO->getQtdPorMesSilabicoAfalb($i,$idEsc);

	      $nivelAfalb[$i] = $alunoDAO->getQtdPorMesAfalbetico($i,$idEsc);

	      $nivelOrt[$i] = $alunoDAO->getQtdPorMesOrtagrafico($i,$idEsc);
	    }
	}
	$periodo[0] = '1 Periodo';
    $periodo[1] = '2 Periodo';
    $periodo[2] = '3 Periodo';
    $periodo[3] = '4 Periodo';


?>