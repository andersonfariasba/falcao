<?php

/* Classe BUSINESS: Nome da Dao
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
*/

class AnexosBusiness extends CI_Model {

  //Cadastrar
  public function cadastrar($dados){
    try {
      $obj = $this->Factory->createPojo("anexos",$dados);
      $cadastroDao = $this->Factory->createDao("anexos");
      $cadastroDao->connect();
      $id = $cadastroDao->cadastrar($obj);
      $cadastroDao->disconnect();
   
      return $id;
    
    } 
    catch (Exception $exc) {
      throw $exc;
    }
  }

  //Listar com padrão codeigniter
  public function filtro($id_solicitacao){
    try {
      $cadastroDao = $this->Factory->createDao("anexos");
      $cadastroDao->connect();
      $list = $cadastroDao->filtro($id_solicitacao);
      $cadastroDao->disconnect();
    
      return $list;
  
    } catch (Exception $exc) {
      throw $exc;
    }
  }



  //Visualizar
  public function visualizar($id_anexo){
    try {
      $cadastroDao = $this->Factory->createDao("anexos");
      $cadastroDao->connect();
      $obj = $cadastroDao->visualizar($id_anexo);
      $cadastroDao->disconnect();
      return $obj;

    } catch (Exception $exc) {
      throw $exc;
    }
  }

  //Editar
  public function editar($dados){
    try {
      $cadastroDao = $this->Factory->createDao("anexos");
      $cadastroDao->connect();
      $cadastroDao->alterar($dados);
      $cadastroDao->disconnect();
    
    } catch (Exception $exc) {
      throw $exc;
    }
  }

  //Exclusão
  public function excluir($id_anexo){
    try {
      $cadastroDao = $this->Factory->createDao("anexos");
      $cadastroDao->connect();
      $cadastroDao->excluir($id_anexo);
      $cadastroDao->disconnect();
    } catch (Exception $exc) {
      throw $exc;
    }
  }
}

?>
