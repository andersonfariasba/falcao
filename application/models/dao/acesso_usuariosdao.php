<?php
/* Classe(DAO): Usuários
* Autor: Anderson Farias
* Última atualização: 25/06/2015
* Contato: andersonjfarias@yahoo.com.br
*/

class Acesso_usuariosDao extends CI_Model {
    

    public function connect(){
        $this->load->database();
    }

    public function disconnect(){
        $this->db->close();
    }


    public function cadastrar($objUser){
        $sucess = $this->db->insert("acesso_usuarios",$objUser->toArray());
        if(!$sucess){
            throw new Exception($this->db->_error_message(),$this->db->_error_number());
        }

        $cod_user = $this->db->insert_id();

        return $cod_user;
    }
    
    
    public function filtro($dados) {
     	
    	$this->db->from("acesso_usuarios");
    	$this->db->order_by("login");
    	$this->db->where("deletado",DELETADO);
    	
    	if ($dados["login"] != NULL):
    		$this->db->like("login", $dados["login"]);
    	endif;

        $query = $this->db->get();
    
    	if ($query == FALSE) {
    		throw new Exception($this->db->_error_message(), $this->db->_error_number());
    	}
    
    	$listUser = array();
    
    	if ($query != NULL) {
    		foreach ($query->result_array() as $dados) {
    
    			$listUser[] = $this->visualizar($dados["id_usuario"]);
    		}
    	}
    	return $listUser;
    }

  
    
 

    

    public function visualizar($id_usuario){
        $this->db->from("acesso_usuarios");
        $this->db->where("id_usuario",$id_usuario);
        $query = $this->db->get();
    
        if($query==FALSE){
            throw new Exception($this->db->_error_message(),$this->db->_error_number());
        }

        $objUser = NULL;
    
        if($query->num_rows()>0){
            $dados = $query->row_array();
            $objUser = $this->Factory->createPojo("acesso_usuarios",$dados);      
                
        }
    
        return $objUser;
    
    
    }
    
    
    
    public function alterar($objUser){
    	$this->db->where('id_usuario',$objUser->getId_usuario());
    	$sucess = $this->db->update("acesso_usuarios",$objUser->toArray());
    	
    	if(!$sucess){
    		throw new Exception($this->db->_error_message(),  $this->db->_error_number());
    	}
    
    }
    
    
    public function excluir($id_usuario){
        $this->db->where('id_usuario',$id_usuario);
        $dados["deletado"] = DELETADO_SIM;
        $sucess = $this->db->update("acesso_usuarios",$dados);
         if(!$sucess){
             throw new Exception($this->db->_error_message(),$this->db->_error_number());
         }
    }
    
    
    public function getByLoginSenha($login,$senha){
        $this->db->from("acesso_usuarios"); //tabela
        $this->db->where("login",$login); //coluna e o código passado como parametro
        $this->db->where("senha",md5($senha.CRIPTOGRAFIA));
        $this->db->where("deletado",DELETADO);
        
        $query = $this->db->get();

        if($query==FALSE){
            throw new Exception($this->db->_error_message(),$this->db->_error_number());
        }
        $objUser = NULL;

        if($query->num_rows()>0){
            //pega os dados
            $dados = $query->row_array();
            $objUser = $this->Factory->createPojo("acesso_usuarios",$dados);
            
        }

        return $objUser;
    }
}
?>
