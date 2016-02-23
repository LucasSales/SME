<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/01/16
 * Time: 02:57
 */
include_once 'Turma.php';
include_once '../Controller/Conexao.php';

class TurmaDAO{
    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }


    public function getTurmasEscolas(Turma $turma){
        try{
            $sql = "select * from turma where idEscola = ".$turma->idEscola;

            $resultado = $this->conexao->query($sql);

            $arrayTurmas = array();

            foreach ($resultado as $valor) {
                # code...
                $turma = new Turma();
                $turma->idTurma = $valor['idTurma'];
                $turma->idEscola = $valor['idEscola'];
                $turma->nome = $valor['nome_turma'];

                array_push($arrayTurmas, $turma);
            }
                

            return $arrayTurmas;

        }catch(Exception $e){
            return false;
        }
    }

    public function getAllTurmas(){
        try{
            $sql = "select * from turma";

            $a = $this->conexao->prepare($sql);

            if(!$a->execute())
                return false;

            $arrayTurmas = array();

            while ($turma = $a->fetchObject())
                array_push($arrayTurmas, $turma);

            return $arrayTurmas;
        }catch(Exception $e){
            return false;
        }
    }

    public function inserir(Turma $turma){

        try {
            $sql = "insert into turma(nome_turma, idEscola) values (?,?)";

            $a = $this->conexao->prepare($sql);

            $a->bindParam(1, $turma->getNome());
            $a->bindParam(2, $turma->getIdEscola());

            return $a->execute();

        }catch (Exception $e) {
            return false;
        }
    }
    public function remover(Turma $turma){
        try{
            $sql = "delete from turma where idTurma = ? ";

            $a = $this->conexao->prepare($sql);

            $a->bindParam(1,$turma->getIdTurma());

            return $a->execute();
        }catch(Exception $e){
            return false;
        }
    }

    public function editarTurma(Turma $turma){

        try{
            $sql = "update turma set nome_turma = ?, idEscola = ? where idTurma= ?";

            $a = $this->conexao->prepare($sql);
            $a->bindParam(1,$turma->getNome());
            $a->bindParam(2,$turma->getIdEscola());
            $a->bindParam(3,$turma->getIdTurma());

            return $a->execute();

        }catch(Exception $e){
            return false;
        }
    }

    public function getTurma($idTurma){
        try{
            $sql = "select * from turma where idTurma = ".$idTurma;

            $resultado = $this->conexao->query($sql);

            $turma = new Turma();

            foreach ($resultado as $valor) {
                $turma->idEscola = $valor['idEscola'];
                $turma->idTurma = $valor['idTurma'];
                $turma->nome = $valor['nome_turma']; 
            }

            return $turma;

        }catch(Exception $e){
            return false;
        }
    }

}