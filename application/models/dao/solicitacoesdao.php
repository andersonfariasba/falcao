<?php

/* Classe DAO: Nome da Dao
 * Autor: Nome do Autor
 * Última atualização: 31/07/2018
 * Contato: andersonjfarias@yahoo.com.br
 * Documentação DB: https://www.codeigniter.com/userguide2/database/active_record.html
 */

class SolicitacoesDao extends CI_Model {

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
    $sucess = $this->db->insert("solicitacoes",$obj->toArray());
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

    if ($dados["cliente"] != NULL):
     $param .= " and c.nome LIKE '%".$dados['cliente']."%' ";
    endif;

     if ($dados["codigo"] != NULL):
     $param .= " and s.codigo = '".$dados['codigo']."' ";
    endif;

    $data_de = $dados['data_de'];
    $data_ate = $dados['data_ate'];   
              
     if ($data_de != NULL && $data_ate != NULL):
             $objDateFormat = $this->DateFormat;
             $data_de = $objDateFormat->date_mysql($data_de);
             $data_ate = $objDateFormat->date_mysql($data_ate);
            
             $param .= "and DATE(s.data_solicitacao) BETWEEN '$data_de' AND '$data_ate'"; 
     endif;

      if ($data_de != NULL && $data_ate == NULL):
             $objDateFormat = $this->DateFormat;
             $data_de = $objDateFormat->date_mysql($data_de);
             $data_ate = $objDateFormat->date_mysql($data_ate);
            
             $param .= "and DATE(s.data_solicitacao) BETWEEN '$data_de' AND '$data_de'"; 
     endif;
   
    //Realiza a query diretamente por SQL
    $query = $this->db->query("select s.id_solicitacao,s.codigo,s.assunto,s.data_solicitacao,c.nome as cliente,se.servico,s.deletado from solicitacoes s
     left join clientes c
       on(c.id_cliente = s.id_cliente)
       left join servicos se
       on(se.id_servico=s.id_servico)
       where s.deletado = 0 ".$param." order by s.data_solicitacao");
    
    $list = $query->result_array();

    return $list;

  }

  //Visualizar os dados
  public function visualizar($id_solicitacao){
    $this->db->from("solicitacoes");
    $this->db->where("id_solicitacao",$id_solicitacao);
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
      $obj = $this->Factory->createPojo("solicitacoes",$dados);

    }

      // Retorno do objeto
      return $obj;
  }

  // Alterar dados, como parâmetro passa os dados que serão ajustado
  public function alterar($dados){
    // Alterar dados referente a id chave passado no array de dados 
    $this->db->where('id_solicitacao',$dados['id_solicitacao']);
    // Atualiza os dados
    $sucess = $this->db->update("solicitacoes",$dados);
    // Caso tenha algum erro retorna uma exception
    if(!$sucess){
      throw new Exception($this->db->_error_message(),  $this->db->_error_number());
    }
  }
  
  // Exclusão lógica
  public function excluir($id_solicitacao){
    // Verifica o id da tabela para excluir logicamente
    $this->db->where('id_solicitacao',$id_solicitacao);
    
    // Inclui o valor DELETADO_SIM(1) no campo deletado 
    $dados["deletado"] = DELETADO_SIM;
    
    //Alterar o dados  
    $sucess = $this->db->update("solicitacoes",$dados);
    
    // Caso tenha algum erro retorna uma exception
    if(!$sucess){
      throw new Exception($this->db->_error_message(),$this->db->_error_number());
    }
  }

}

?>
