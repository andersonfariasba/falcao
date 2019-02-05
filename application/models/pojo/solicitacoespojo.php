<?php

/* Classe Pojo: Nome da Pojo
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
 */

//Nome da classe com o nome Pojo no final
class SolicitacoesPojo extends CI_Model {

 //Dados referente a tabela de banco de dados
 private $id_solicitacao;
 private $id_servico;
 private $id_cliente;
 private $codigo;
 private $assunto;
 private $conteudo;
 private $data_solicitacao;
 private $deletado = false;

 //**** Metodo que organizar os dados para inserção pelo form
 public function populate($dados){
 
  if(isset($dados["id_solicitacao"]))
   $this->id_solicitacao = $dados["id_solicitacao"];

  if(isset($dados["id_servico"]))
   $this->id_servico = $dados["id_servico"];

  if(isset($dados["id_cliente"]))
   $this->id_cliente = $dados["id_cliente"];

  if(isset($dados["codigo"]))
   $this->codigo = $dados["codigo"];

 if(isset($dados["assunto"]))
   $this->assunto = $dados["assunto"];

 if(isset($dados["conteudo"]))
   $this->conteudo = $dados["conteudo"];

 if(isset($dados["data_solicitacao"]))
   $this->data_solicitacao = $dados["data_solicitacao"];

  if(isset($dados["deletado"]))
   $this->deletado = $dados["deletado"];
 }
 //**** Final metodo que organizar os dados para inserção pelo form


 //******* Inicio Metódos gets e sets
 
  public function getId_solicitacao(){
    return $this->id_solicitacao;
  }

  public function setId_solicitacao($id_solicitacao){
    $this->id_solicitacao = $id_solicitacao;
  }

  public function getId_servico(){
    return $this->id_servico;
  }

  public function setId_servico($id_servico){
    $this->id_servico = $id_servico;
  }

  public function getId_cliente(){
    return $this->id_cliente;
  }

  public function setId_cliente($id_cliente){
    $this->id_cliente = $id_cliente;
  }

  public function getCodigo(){
    return $this->codigo;
  }

  public function setCodigo($codigo){
    $this->codigo = $codigo;
  }

  public function getAssunto(){
    return $this->assunto;
  }

  public function setAssunto($assunto){
    $this->assunto = $assunto;
  }

  public function getConteudo(){
    return $this->conteudo;
  }

  public function setConteudo($conteudo){
    $this->conteudo = $conteudo;
  }

  public function getData_solicitacao(){
    return $this->data_solicitacao;
  }

  public function setData_solicitacao($data_solicitacao){
    $this->data_solicitacao = $data_solicitacao;
  }

  public function getDeletado(){
    return $this->deletado;
  }

  public function setDeletado($deletado){
    $this->deletado = $deletado;
  }

 //Metódo padrão da pojo para inserção de dados
 public function toArray(){
  $inArray = array();
  foreach(get_object_vars($this) as $attribute => $value){
   if(is_float($this->$attribute)){
    $inArray[$attribute] = number_format($this->$attribute,4,".","");
   }
   else
   {
    $inArray[$attribute] = $this->$attribute;
   }
  }

  return $inArray;

 }

}

?>
