<?php
/* 
* Classe Pojo: Anexos 
 */

//Nome da classe com o nome Pojo no final
class AnexosPojo extends CI_Model {

 //Dados referente a tabela de banco de dados
 private $id_anexo;
 private $id_solicitacao;
 private $arquivo;
 private $data_cadastro;
 private $deletado = false;

 //**** Metodo que organizar os dados para inserção pelo form
 public function populate($dados){
 
  if(isset($dados["id_anexo"]))
   $this->id_anexo = $dados["id_anexo"];

  if(isset($dados["id_solicitacao"]))
   $this->id_solicitacao = $dados["id_solicitacao"];

  if(isset($dados["arquivo"]))
   $this->arquivo = $dados["arquivo"];

  if(isset($dados["data_cadastro"]))
   $this->data_cadastro = $dados["data_cadastro"];

  if(isset($dados["deletado"]))
   $this->deletado = $dados["deletado"];
 }
 //**** Final metodo que organizar os dados para inserção pelo form


 //******* Inicio Metódos gets e sets
  public function getId_anexo(){
    return $this->id_anexo;
  }

  public function setId_anexo($id_anexo){
    $this->id_anexo = $id_anexo;
  }

  public function getId_solicitacao(){
    return $this->id_solicitacao;
  }

  public function setId_solicitacao($id_solicitacao){
    $this->id_solicitacao = $id_solicitacao;
  }

  public function getArquivo(){
    return $this->arquivo;
  }

  public function setArquivo($arquivo){
    $this->arquivo = $arquivo;
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
