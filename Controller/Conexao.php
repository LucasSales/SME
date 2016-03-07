<?php

class Conexao{

	public static $conexao;

    public static function getConexao(){
        if(Conexao::$conexao!=null){
        	try {
        		return Conexao::$conexao;	
        	} catch (Exception $e) {
        		return false;
        	}
        }
        else{
        	try {
        		
            	return new PDO('mysql:host=localhost;dbname=SME', 'root',
                '123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        	} catch (Exception $e) {
        		return false;	
        	}
        }
    }
}

