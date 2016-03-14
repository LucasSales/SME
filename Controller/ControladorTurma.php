<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/01/16
 * Time: 03:07
 */
include_once 'Conexao.php';
include_once '../Model/TurmaDAO.php';

if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
    if($acao == "cadastrar"){
        $nome = $_POST['nome'];
        $idEscola = $_POST['idEscola'];
        var_dump($idEscola);
        $c = new ControladorTurma();
        $c->cadastrarTurma($nome, $idEscola);

        header('location:../coord/escola.php?idEscola='.$idEscola);

    }
}




class ControladorTurma{
    private $dao;

    public function __construct(){
        $this->dao = new TurmaDAO(Conexao::getConexao());
    }

    public static function getInstance(){
        return new ControladorTurma();
    }

    public function cadastrarTurma($nome,$idEscola){
        if(isset($nome,$idEscola)){
            $turma = new Turma();
            $turma->setNome($nome);
            $turma->setIdEscola($idEscola);
            return $this->dao->inserir($turma);
        }
    }

    public function removerTurma($idTurma){
        if(isset($idTurma)){
            $turma = new Turma();
            $turma->setIdTurma($idTurma);
            return $this->dao->remover($turma);
        }
    }

    public function editar($nome,$idEscola,$idTurma){
        if(isset($nome,$idEscola,$idTurma)){
            $turma = new Turma();
            $turma->setIdTurma($idTurma);
            $turma->setNome($nome);
            $turma->setIdEscola($idEscola);
            return $this->dao->editarTurma($turma);
        }
    }
    public function buscarTurmasEscola($idEscola){
        if(isset($idEscola)){
            $turma = new Turma();
            $turma->setIdEscola($idEscola);
            return $this->dao->getTurmasEscolas($idEscola);
        }
    }

    public function buscarTurmas(){
        return $this->dao->getAllTurmas();
    }

    public function getTurma($idTurma){
        return $this->dao->getTurma($idTurma);
    }
}