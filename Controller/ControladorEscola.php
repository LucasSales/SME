<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/01/16
 * Time: 02:33
 */
include_once 'Conexao.php';
include_once '../Model/EscolaDAO.php';

if(isset($_POST['acao'])){
    $acao = $_POST['acao'];

    if($acao == "cadastrar"){
    $nome = $_POST['nome'];
    $idRegional = $_POST['idRegional'];
    $c = new ControladorEscola();
    $c->cadastrarEscola($nome, $idRegional);
    header('location:../admin/regional.php?id_regional='.$idRegional);
    }else if($acao == "editar"){
        $nome = $_POST['nome'];
        $idEscola = $_POST['idEscola'];
        $idRegional = $_POST['idRegional'];
        $c = new ControladorEscola();
        $c->editarEscola($idEscola, $nome);    

        header('location:../admin/regional.php?id_regional='.$idRegional);
    }

}else if(isset($_GET['idRegional'])){
    $opcao = $_GET['opcao'];
    $idEscola = $_GET['idEscola'];
    $idRegional = $_GET['idRegional'];
    $c = new ControladorEscola();
    $c->removerEscola($idEscola); 
        
    header('location:../admin/regional.php?id_regional='.$idRegional);
}





class ControladorEscola{
    private $dao;

    public function __construct(){
        $this->dao = new EscolaDAO(Conexao::getConexao());
    }

    public static function getInstance(){
        return new ControladorEscola();
    }

    public function cadastrarEscola($nome,$idRegional){
        if(isset($nome,$idRegional)){
            $escola = new Escola();
            $escola->setNome($nome);
            $escola->setIdRegional($idRegional);
            return $this->dao->inserir($escola);
        }
    }

    public function removerEscola($idEscola){
        if(isset($idEscola)){
            $escola = new Escola();
            $escola->setIdEscola($idEscola);
            return $this->dao->remover($escola);
        }
    }

    public function editarEscola($idEscola, $nome){
        if(isset($nome,$idEscola)){
            $escola = new Escola();
            $escola->setNome($nome);
            $escola->setIdEscola($idEscola);
            return $this->dao->editarEscola($escola);
        }
    }

    public function buscarEscola($idEscola){
        if(isset($idEscola)){
            return $this->dao->getEscola($idEscola);
        }
    }

    public function buscarEscolaPorRegional($idRegional){
        if(isset($idRegional)){
            $escola = new Escola();
            $escola->setIdRegional($idRegional);
            return $this->dao->getEscolasRegional($escola);
        }
    }

    public function buscarEscolas(){
        return $this->dao->getAllEscolas();
    }


}