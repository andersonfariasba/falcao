<?php

/* Classe Pojo: Nome da Pojo
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
 */

//Nome da classe com o nome Pojo no final
class ClientesPojo extends CI_Model {

 //Dados referente a tabela de banco de dados
 private $id_cliente;
 private $nome;
 private $email;
 private $senha;
 private $data_cadastro;
 private $deletado = false;

 //**** Metodo que organizar os dados para inserção pelo form
 public function populate($dados){
 
  if(isset($dados["id_cliente"]))
   $this->id_cliente = $dados["id_cliente"];

  if(isset($dados["nome"]))
   $this->nome = $dados["nome"];

   if(isset($dados["email"]))
   $this->email = $dados["email"];

   if(isset($dados["senha"]))
   $this->senha = $dados["senha"];

   if(isset($dados["data_cadastro"]))
   $this->data_cadastro = $dados["data_cadastro"];

  if(isset($dados["deletado"]))
   $this->deletado = $dados["deletado"];
 }
 //**** Final metodo que organizar os dados para inserção pelo form


 //******* Inicio Metódos gets e sets
 
  public function getId_cliente(){
    return $this->id_cliente;
  }

  public function setId_cliente($id_cliente){
    $this->id_cliente = $id_cliente;
  }

  public function getNome(){
    return $this->nome;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function getSenha(){
    return $this->senha;
  }

  public function setSenha($senha){
    $this->senha = $senha;
  }

  public function getData_cadastro(){
    return $this->data_cadastro;
  }

  public function setData_cadastro($data_cadastro){
    $this->data_cadastro = $data_cadastro;
  }

  public function getDeletado(){
    return $this->deletado;
  }

  public function setDeletado($deletado){
    $this->deletado = $deletado;
  }
 //******* Final Metódos gets e sets


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
