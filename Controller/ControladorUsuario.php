<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/01/16
 * Time: 03:25
 */


include_once '../Model/AlunoDAO.php';
include_once '../Model/UsuarioDAO.php';
include_once 'Conexao.php';

if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
    if($acao == "cadastrar"){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmacaoSenha = $_POST['confirmar'];
        $idRegional = $_POST['idRegional'];

       if($senha == $confirmacaoSenha){
            $c = new ControladorUsuario();
            $c->cadastrarUsuario($email, $senha, $idRegional);
            header('location:../admin/index.php');
       }else{
            header('location:../admin/index.php');
       }
    }
}



class ControladorUsuario{
    private $dao;

    public function __construct(){
        $this->dao = new UsuarioDAO(Conexao::getConexao());
    }

    public static function getInstance(){
        return new ControladorUsuario();
    }

    public function cadastrarUsuario($email,$senha,$idRegional){
        if(isset($email,$senha,$idRegional)){
            $usuario = new Usuario();
            $usuario->setEmail($email);
            $usuario->setSenha($senha);
            $usuario->setIdRegional($idRegional);
            return $this->dao->inserir($usuario);
        }
    }

    public function removerUsuario($id){
        if(isset($id)){
            $usuario = new Usuario();
            $usuario->setIdAluno($id);
            return $this->dao->remover($usuario);
        }
    }

    public function editar($email,$senha,$idRegional,$id){
        if(isset($email,$senha,$idRegional,$id)){
            $usuario = new Usuario();
            $usuario->setEmail($email);
            $usuario->setSenha($senha);
            $usuario->setIdRegional($idRegional);
            $usuario->setId($id);
            return $this->dao->editarUsuaio($usuario);
        }
    }

    public function buscarUsuario($id){
        if(isset($id)){
            $usuario = new Usuario();
            $usuario->setId($id);
            return $this->dao->getUsuario($id);
        }
    }


    public function buscarAllUsuario(){
        return $this->dao->getAllUsuarios();
    }
}