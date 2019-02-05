<?php

/* Classe BUSINESS: Nome da Dao
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
*/

class ServicosBusiness extends CI_Model {

  //Cadastrar
  public function cadastrar($dados){
    try {
      $obj = $this->Factory->createPojo("servicos",$dados);
      $cadastroDao = $this->Factory->createDao("servicos");
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
      $cadastroDao = $this->Factory->createDao("servicos");
      $cadastroDao->connect();
      $list = $cadastroDao->filtro($dados);
      $cadastroDao->disconnect();
    
      return $list;
  
    } catch (Exception $exc) {
      throw $exc;
    }
  }



  //Visualizar
  public function visualizar($id_servico){
    try {
      $cadastroDao = $this->Factory->createDao("servicos");
      $cadastroDao->connect();
      $obj = $cadastroDao->visualizar($id_servico);
      $cadastroDao->disconnect();
      return $obj;

    } catch (Exception $exc) {
      throw $exc;
    }
  }

  //Editar
  public function editar($dados){
    try {
      $cadastroDao = $this->Factory->createDao("servicos");
      $cadastroDao->connect();
      $cadastroDao->alterar($dados);
      $cadastroDao->disconnect();
    
    } catch (Exception $exc) {
      throw $exc;
    }
  }

  //Exclusão
  public function excluir($id_servico){
    try {
      $cadastroDao = $this->Factory->createDao("servicos");
      $cadastroDao->connect();
      $cadastroDao->excluir($id_servico);
      $cadastroDao->disconnect();
    } catch (Exception $exc) {
      throw $exc;
    }
  }
}

?>
