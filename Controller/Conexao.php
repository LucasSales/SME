<?php

class Conexao{

	public static $conexao;

    public static function getConexao(){
        if(Conexao::$conexao!=null)
            return Conexao::$conexao;
        else
            return new PDO('mysql:host=localhost;dbname=SME', 'root',
                '123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
	/*
	protected function abrirConexao(){
		try{
			$conexao = new PDO("mysql:host=localhost;dbname=SME", "root", "123");
		}catch(PDOException $ex){
			echo $ex->getMessage();
			die();
		}		
				 		
		return $conexao;		
	}
	
	protected function fecharConexao($conexao){
		$conexao= null;
		
	}
	function Conectar(){
		try{
			$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
			$con = new PDO("mysql:host=localhost; dbname=SME;", "root", "123", $opcoes);
			return $con;
		} catch(Exception $e){
			echo 'Erro:' .$e->getMessage();
			return null;
		}
	}*/
}

