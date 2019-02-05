<?php
class login extends MY_Controller {

    public function index(){
        
        $this->load->helper(array('form', 'url'));
        $this->loadLibrary("form_validation");

        //se nao estiver logado
        if (!$this->session->userdata("logged_in")) {
            
            $this->form_validation->set_rules('login', 'Login', 'required|alpha_dash');
            $this->form_validation->set_rules('senha', 'Senha', 'required|alpha_numeric|callback_validar_login');

            if ($this->form_validation->run() == FALSE) {
                $info['flag_email'] = false;
                $info['email_erro'] = false;
                $this->load->view("login", $info);
                return;
                
            }
        }
                
         redirect("solicitacao/filtro");
    }


    public function validar_login($senha){
        try {

            $login = $this->input->post("login");
            $usuarioBus = $this->Factory->createBusiness("acesso_usuarios");

            if ($usuarioBus->validar_login($login, $senha)) {
                return TRUE;
            } 
            else {
                $this->form_validation->set_message('validar_login', 'Login ou senha incorretos.');
                return FALSE;
            }
        } 
        
        catch (Excpeption $ex) {
            $this->loadError($ex);
        }
    }

    public function sair() {

        $this->load->helper('url');
        $this->session->sess_destroy();

        redirect("login", "refresh");
    }
}

?>
