<?php

/* Classe BUSINESS: Nome da Dao
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
*/

class SolicitacoesBusiness extends CI_Model {

  //Cadastrar
  public function cadastrar($dados){
    try {
      $obj = $this->Factory->createPojo("solicitacoes",$dados);
      $cadastroDao = $this->Factory->createDao("solicitacoes");
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
  public function filtro($dados=null){
    try {
      $cadastroDao = $this->Factory->createDao("solicitacoes");
      $cadastroDao->connect();
      $list = $cadastroDao->filtro($dados);
      $cadastroDao->disconnect();
    
      return $list;
    } catch (Exception $exc) {
      throw $exc;
    }
  }



  //Visualizar
  public function visualizar($id_solicitacao){
    try {
      $cadastroDao = $this->Factory->createDao("solicitacoes");
      $cadastroDao->connect();
      $obj = $cadastroDao->visualizar($id_solicitacao);
      $cadastroDao->disconnect();
      return $obj;

    } catch (Exception $exc) {
      throw $exc;
    }
  }

  //Editar
  public function editar($dados){
    try {
      $cadastroDao = $this->Factory->createDao("solicitacoes");
      $cadastroDao->connect();
      $cadastroDao->alterar($dados);
      $cadastroDao->disconnect();
    
    } catch (Exception $exc) {
      throw $exc;
    }
  }

  //Exclusão
  public function excluir($id_solicitacao){
    try {
      $cadastroDao = $this->Factory->createDao("solicitacoes");
      $cadastroDao->connect();
      $cadastroDao->excluir($id_solicitacao);
      $cadastroDao->disconnect();
    } catch (Exception $exc) {
      throw $exc;
    }
  }

}

?>
