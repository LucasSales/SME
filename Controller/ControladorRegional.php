<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/01/16
 * Time: 02:52
 */
include_once 'Conexao.php';
include_once '../Model/RegionalDAO.php';
include_once '../Model/Usuario.php';

if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
    if($acao == "cadastrar"){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $c = new ControladorRegional();
        $c->cadastrarRegional($nome, $email, $senha);
        header('location:../admin/index.php');
    }else if($acao == "editar"){
        $nome = $_POST['nome'];
        $idRegional = $_POST['idRegional'];
        $c = new ControladorRegional();
        $c->editar($nome, $idRegional);
        header('location:../admin/regional.php?id_regional='.$idRegional);

    }
}else if(isset($_GET['acao'])){
    $acao = $_GET['acao'];
    if($acao == "excluir"){
        $idRegional = $_GET['idRegional'];
        $c = new ControladorRegional();
        $c->removerRegional($idRegional);
        header('location:../admin/index.php');
    }
}




class ControladorRegional{
    private $dao;

    public function __construct(){
        $this->dao = new RegionalDAO(Conexao::getConexao());
    }

    public static function getInstance(){
        return new ControladorRegional();
    }

    public function cadastrarRegional($nome, $email_acesso, $senha_acesso){
        if(isset($nome)){
            $regional = new Regional();
            $usuario = new Usuario();

            $regional->setNome($nome);
            $usuario->email = $email_acesso;
            $usuario->senha = $senha_acesso;

            return $this->dao->inserir($regional, $usuario);
        }
    }

    public function getRegional($idRegional){
        if(isset($idRegional))
            return $this->dao->getRegionalPorId($idRegional);
    }

    public function removerRegional($idRegional){
        if(isset($idRegional)){
            $regional = new Regional();
            $regional->setIdRegional($idRegional);
            return $this->dao->remover($regional);
        }
    }

    public function editar($nome,$idRegional){
        if(isset($nome,$idRegional)){
            $regional = new Regional();
            $regional->setIdRegional($idRegional);
            $regional->setNome($nome);
            return $this->dao->editarRegional($regional);
        }
    }


    public function buscarTodasRegionais(){
        return $this->dao->getAllRegionais();
    }
}