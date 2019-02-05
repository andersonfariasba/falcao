<?php

/* Classe Pojo: Serviços oferecidos pela empresa
 * Autor: Anderson Farias
 */

//Nome da classe com o nome Pojo no final
class ServicosPojo extends CI_Model {

 //Dados referente a tabela de banco de dados
 private $id_servico;
 private $servico;
 private $deletado = false;

 //**** Metodo que organizar os dados para inserção pelo form
 public function populate($dados){
 
  if(isset($dados["id_servico"]))
   $this->id_servico = $dados["id_servico"];

  if(isset($dados["servico"]))
   $this->servico = $dados["servico"];

  if(isset($dados["deletado"]))
   $this->deletado = $dados["deletado"];
 }
 //**** Final metodo que organizar os dados para inserção pelo form


 //******* Inicio Metódos gets e sets
 
  public function getId_servico(){
    return $this->id_servico;
  }

  public function setId_servico($id_servico){
    $this->id_servico = $id_servico;
  }

  public function getServico(){
    return $this->servico;
  }

  public function setServico($servico){
    $this->servico = $servico;
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
