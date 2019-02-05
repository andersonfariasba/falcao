<?php

/* Classe DAO: Nome da Dao
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
 * Documentação DB: https://www.codeigniter.com/userguide2/database/active_record.html
 */

class AnexosDao extends CI_Model {

  //Conexão com o banco de dados
  public function connect(){
    $this->load->database();
  }
  //Disconecta do banco de dados
  public function disconnect(){
    $this->db->close();
  }

  //Cadastra os dados
  public function cadastrar($obj){
    $sucess = $this->db->insert("anexos",$obj->toArray());
      if(!$sucess){
        throw new Exception($this->db->_error_message(),$this->db->_error_number());
      }
      
      $id = $this->db->insert_id();
      
      return $id;
  }

  //****** Listagem de Dados direto com SQL *****
  public function filtro($id_solicitacao) {

    
    //Realiza a query diretamente por SQL
    $query = $this->db->query("select id_anexo,arquivo,data_cadastro,deletado from anexos where deletado = 0 and id_solicitacao = ".$id_solicitacao." order by id_anexo desc");
    
    $list = $query->result_array();

    return $list;

  }

  //Visualizar os dados
  public function visualizar($id_anexo){
    $this->db->from("anexos");
    $this->db->where("id_anexo",$id_anexo);
    $query = $this->db->get();

    // Caso tenha algum erro retorna uma exception
    if($query==FALSE){
      throw new Exception($this->db->_error_message(),$this->db->_error_number());
    }

    // Cria um objeto para receber os dados
    $obj = NULL;

    // Se existir dados armazena os dados no objeto
    if($query->num_rows()>0){
      $dados = $query->row_array();
      $obj = $this->Factory->createPojo("anexos",$dados);
    }

      // Retorno do objeto
      return $obj;
  }

  // Alterar dados, como parâmetro passa os dados que serão ajustado
  public function alterar($dados){
    // Alterar dados referente a id chave passado no array de dados 
    $this->db->where('id_anexo',$dados['id_anexo']);
    // Atualiza os dados
    $sucess = $this->db->update("anexos",$dados);
    // Caso tenha algum erro retorna uma exception
    if(!$sucess){
      throw new Exception($this->db->_error_message(),  $this->db->_error_number());
    }
  }
  
  // Exclusão lógica
  public function excluir($id_anexo){
    // Verifica o id da tabela para excluir logicamente
    $this->db->where('id_anexo',$id_anexo);
    
    // Inclui o valor DELETADO_SIM(1) no campo deletado 
    $dados["deletado"] = DELETADO_SIM;
    
    //Alterar o dados  
    $sucess = $this->db->update("anexos",$dados);
    
    // Caso tenha algum erro retorna uma exception
    if(!$sucess){
      throw new Exception($this->db->_error_message(),$this->db->_error_number());
    }
  }

}

?>
