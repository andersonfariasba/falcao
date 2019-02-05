<?php

/* Classe DAO: Nome da Dao
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
 * Documentação DB: https://www.codeigniter.com/userguide2/database/active_record.html
 */

class ClientesDao extends CI_Model {

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
    $sucess = $this->db->insert("clientes",$obj->toArray());
      if(!$sucess){
        throw new Exception($this->db->_error_message(),$this->db->_error_number());
      }
      
      $id = $this->db->insert_id();
      
      return $id;
  }


  //****** Listagem de Dados direto com SQL *****
  public function filtro($dados) {

    //Inicia o paramtro do sql como vazio
    $param = "";

    if ($dados["nome"] != NULL):
     $param .= " and nome LIKE '%".$dados['nome']."%' ";
    endif;
   
    //Realiza a query diretamente por SQL
    $query = $this->db->query("select id_cliente,nome,email,senha,data_cadastro,deletado from clientes where deletado = 0 ".$param." order by nome");
    
    $list = $query->result_array();

    return $list;

  }

  //Visualizar os dados
  public function visualizar($id_cliente){
    $this->db->from("clientes");
    $this->db->where("id_cliente",$id_cliente);
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
      $obj = $this->Factory->createPojo("clientes",$dados);

    }

      // Retorno do objeto
      return $obj;
  }

  // Alterar dados, como parâmetro passa os dados que serão ajustado
  public function alterar($dados){
    // Alterar dados referente a id chave passado no array de dados 
    $this->db->where('id_cliente',$dados['id_cliente']);
    // Atualiza os dados
    $sucess = $this->db->update("clientes",$dados);
    // Caso tenha algum erro retorna uma exception
    if(!$sucess){
      throw new Exception($this->db->_error_message(),  $this->db->_error_number());
    }
  }
  
  // Exclusão lógica
  public function excluir($id_cliente){
    // Verifica o id da tabela para excluir logicamente
    $this->db->where('id_cliente',$id_cliente);
    
    // Inclui o valor DELETADO_SIM(1) no campo deletado 
    $dados["deletado"] = DELETADO_SIM;
    
    //Alterar o dados  
    $sucess = $this->db->update("clientes",$dados);
    
    // Caso tenha algum erro retorna uma exception
    if(!$sucess){
      throw new Exception($this->db->_error_message(),$this->db->_error_number());
    }
  }

}

?>
