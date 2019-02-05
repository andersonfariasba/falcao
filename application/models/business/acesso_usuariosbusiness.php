<?php
/* Classe(business): Usuários
 * Autor: Anderson Farias
 * última atualização: 25/06/2015
 * Contato: andersonjfarias@yahoo.com.br
 */

class Acesso_usuariosBusiness extends CI_Model {

    //CADASTRA
	public function cadastrar($dados){
        try {

            $objUser = $this->Factory->createPojo("acesso_usuarios",$dados);
            $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $cod_user = $userDao->cadastrar($objUser);
		    $userDao->disconnect();
		    return $cod_user;
             } 
        
        catch (Exception $exc) {
	        throw $exc;
        }
    }

    //LISTA
    public function filtro($dados){
    	try {
    		
    	    $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $listUser = $userDao->filtro($dados);
            $userDao->disconnect();
            return $listUser;

            } catch (Exception $exc) {
                throw $exc;
            }
    }

          //LISTA
    public function listar_aprovador($perfil){
      try {
        
          $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $listUser = $userDao->listar_aprovador($perfil);
            $userDao->disconnect();
            return $listUser;

            } catch (Exception $exc) {
                throw $exc;
            }
    }

          //LISTA
    public function listar_por_perfil($id_perfil){
      try {
        
          $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $listUser = $userDao->listar_por_perfil($id_perfil);
            $userDao->disconnect();
            return $listUser;

            } catch (Exception $exc) {
                throw $exc;
            }
    }
    
    
    //VISUALIZA
    public function visualizar($id_user){
    	try {
    	    $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $objUser = $userDao->visualizar($id_user);
            $userDao->disconnect();
            return $objUser;
                
            } catch (Exception $exc) {
                throw $exc;
            }
    }

     public function visualizar_por_email($email){
      try {
          $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $objUser = $userDao->visualizar_por_email($email);
            $userDao->disconnect();
            return $objUser;
                
            } catch (Exception $exc) {
                throw $exc;
            }
    }

     public function visualizar_por_colaborador($id_colaborador){
      try {
          $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $objUser = $userDao->visualizar_por_colaborador($id_colaborador);
            $userDao->disconnect();
            return $objUser;
                
            } catch (Exception $exc) {
                throw $exc;
            }
    }
    
    
    
    //EDITAR
    public function editar($dados){
    	try {
    	    $objUser = $this->Factory->createPojo("acesso_usuarios",$dados);
            $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $userDao->alterar($objUser);
            $userDao->disconnect();
                
            } catch (Exception $exc) {
                throw $exc;
            }
    }
    

    public function excluir($id_user){
    	try {
    	    $userDao = $this->Factory->createDao("acesso_usuarios");
            $userDao->connect();
            $userDao->excluir($id_user);
            $userDao->disconnect();
    	} catch (Exception $exc) {
                throw $exc;
            }
    }
    
    
     public function validar_login($login,$senha){
            try {
                 $userDao = $this->Factory->createDao("acesso_usuarios");
                 $userDao->connect();
                 $objUser = $userDao->getByLoginSenha($login,$senha);
                 $userDao->disconnect();
                 
                    if($objUser!=null){
                        $dadosSessao = $objUser->toArray();
                        unset($dadosSessao['senha']);
                        $dadosSessao['logged_in'] = true;
                        $this->session->set_userdata($dadosSessao);
                        return TRUE;
                    }
                    return FALSE;
                 //return $objUser;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        }


}

?>
