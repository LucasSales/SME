<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/01/16
 * Time: 03:52
 */
include_once '../Model/PeriodoDAO.php';
include_once 'ControladorAluno.php';
include_once 'Conexao.php';


if(isset($_POST['acao_periodo'])){

    $acao = $_POST['acao_periodo'];
    if($acao == "cadastrar"){
            $controladorAluno = new ControladorAluno();
            $controladorPeriodo = new ControladorPeriodo();
            $idEscola = $_POST['idEscola'];    
            $periodo = $_POST['periodo'];
            $alunos = $controladorAluno->buscarAlunosPorEscola($idEscola);


            foreach ($alunos as $aluno) {
                # code...
                
                $nivel_aluno = $_POST['id'.$aluno->idAluno];

                if($controladorPeriodo->existe($periodo, $aluno->idAluno)){
                    
                    $c = new ControladorPeriodo();
                    $c->editar($nivel_aluno, $periodo, $aluno->idAluno);
                    header('location:../coord/escola.php?idEscola='.$idEscola);
                    
                }else{
                    $c = new ControladorPeriodo();
                    $c->cadastrarNivelDoAlunoPeriodo($periodo, $nivel_aluno, $aluno->idAluno);
                    header('location:../coord/escola.php?idEscola='.$idEscola);
                }

            }
        /*$controladorAluno = new ControladorAluno();
        $idEscola = $_POST['idEscola'];
        
        $periodo = $_POST['periodo'];
        
        $alunos = $controladorAluno->buscarAlunosPorEscola($idEscola);

          
        foreach ($alunos as $aluno) {
            # code...
            $nivel_aluno = $_POST['id'.$aluno->idAluno];
            $c = new ControladorPeriodo();
            $c->cadastrarNivelDoAlunoPeriodo($periodo, $nivel_aluno, $aluno->idAluno);
        }
        */
    }
}
    
class ControladorPeriodo{
    private $dao;

    public function __construct(){
        $this->dao = new PeriodoDAO(Conexao::getConexao());
    }

    public static function getInstance(){
        return new ControladorPeriodo();
    }

    public function cadastrarNivelDoAlunoPeriodo($idPeriodo, $nivel, $idAluno){
        
            $periodo = new Periodo();
            $periodo->setNivel($nivel);
            $periodo->setIdAluno($idAluno);
            $periodo->setIdPeriodo($idPeriodo);
            $this->dao->inserir($periodo);
        
    }

    public function removerPeriodo($idPeriodo){
        if(isset($idPeriodo)){
            $periodo = new Periodo();
            $periodo->setIdPeriodo($idPeriodo);
            return $this->dao->remover($periodo);
        }
    }

    public function editar($nivel,$idPeriodo,$idAluno){
            $periodo = new Periodo();
            $periodo->idPeriodo=$idPeriodo;
            $periodo->nivel = $nivel;
            $periodo->idAluno=$idAluno;
            $this->dao->editar($periodo);
    }

    public function getDadosAlunoPorPeriodo($idPeriodo){
        if(isset($idPeriodo)){
            $periodo = new Periodo();
            $periodo->setIdPeriodo($idPeriodo);
            return $this->dao->getIdAlunoPeriodo($periodo);
        }
    }

    public function getNivelAlunoPeriodo($idPeriodo,$idAluno){
        if(isset($idPeriodo) & isset($idAluno))
            return $this->dao->getNivelAluno($idPeriodo,$idAluno);
    }

    public function existe($idPeriodo, $idAluno){
        $periodo = new Periodo();
        $periodo->idPeriodo = $idPeriodo;
        $alunos = $this->dao->getIdAlunoPeriodo($periodo);

        if(isset($alunos)){
            foreach ($alunos as $aluno) {
            # code...
                if($aluno->idAluno == $idAluno){
                    return true;
                }
            }
            return false;            
        }else{
            return false;
        }
    }

    
    public function getValoresDaEscolaDoPeriodo($idEscola, $periodo){
        $valores = $this->dao->getValoresEscolaPeriodo($idEscola, $periodo);
        return $valores;
    }

}




      /*$controladorAluno = new ControladorAluno();
        $idEscola = $_POST['idEscola'];
        $periodo = $_POST['periodo'];
        $alunos = $controladorAluno->buscarAlunosPorEscola($idEscola);

        headear('location:alunos.php');
        foreach ($alunos as $aluno) {
            # code...
            $nivel_aluno = $_POST[$aluno->idAluno];

            if(existe($periodo, $aluno->idAluno)){
                
                header('location:existe.php');
                $c = new ControladorPeriodo();
                $c->editar($nivel, $periodo, $aluno->idAluno);
                header('location:../coord/escola.php?idEscola='.$idEscola);
            }else{
                header('location:naoexiste.php');
                $c = new ControladorPeriodo();
                $c->cadastrarNivelDoAlunoPeriodo($periodo, $nivel, $aluno->idAluno);
                header('location:../coord/escola.php?idEscola='.$idEscola);
            }

        }
        */
