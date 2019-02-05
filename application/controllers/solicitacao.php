<?php
/* Classe Controller Solicitações
 * Autor: Nome do Autor
*/

class Solicitacao extends MY_Controller {

  //Validação dos dados para as ações de Cadastrar e Editar
  // Chamar no inicio dos metodos de cadastrar ou editar
  private function Rules(){
    //Informa o campo a ser validado conforme parametros:
    //1º Nome do campo, 2º Nome a ser exibido na mensagem padrão, 3º Tipo de Validação 
    $this->form_validation->set_rules('id_cliente','Cliente','required');
     $this->form_validation->set_rules('id_servico','Serviço','required');
    //Padrão para o layot da mensagem de erro
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert"  id="msgOk">
    <strong><i class="fa fa-check"></i></strong> ', '</div>');
  }

  //Ação ao chamar a url: categoria/cadastrar
  //$msg = caso seja diferente de null mostrar a mensagem de sucesso na View de cadastrar
  public function cadastrar($msg=null){
    //Carrega as biblitecas de form, e url (links) do codeigniter que serão utilizadas na View
    $this->load->helper(array('form','url'));
    //Carrega a bibliteca de Validação do Codeigniter padrão
    $this->load->library('form_validation');
    // Chama o metodo de Validação criado no inicio do controller determinando quais campos
    // precisam ser validados
    $this->Rules();
    
    //Passa a variável de mensagem de sucesso para view
    $info['msg'] = $msg;

    //Tela de cadastrar inicial
    if($this->form_validation->run()==FALSE){
         
      //Lista de Clientes
      $clientesBusiness = $this->Factory->createBusiness("clientes");
      $listClientes = $clientesBusiness->filtro();
      $info["listClientes"] = $listClientes;

      //Lista de Serviços
      $servicosBusiness = $this->Factory->createBusiness("servicos");
      $listServicos = $servicosBusiness->filtro();
      $info["listServicos"] = $listServicos;

      $content = $this->load->view("solicitacao/cadastrar",$info,TRUE);
      $this->loadPage($content);   
    }
    
    // Caso o formulario seja submetido (Ação no botão de Salvar)
    else{
    
      // Pega todos os dados dos campos referente ao formulário
        $dados = $this->input->post();

          //Biblioteca Upload
       $this->load->library('upload');

       $qtd_arquivos = isset($dados['todos_labels']) ? sizeof($dados['todos_labels']) : 0;
     

      $dados['data_solicitacao'] = date('Y-m-d');
      $dados['codigo'] = substr(md5(uniqid(rand(), true)),0,6);

      $solicitacaoBusiness = $this->Factory->createBusiness("solicitacoes");
      $id_solicitacao = $solicitacaoBusiness->cadastrar($dados);



      //Se qtd de arquivos for maior > 0
      if($qtd_arquivos > 0) {
        for($i=0;$i<$qtd_arquivos;$i++){

        $config['upload_path'] = './doc/'; //Caminho onde será salvo
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpeg|png|JPG|JPEG|gif|jpg|zip|rar|csv';//Tipos de imagem aceito
        $config['max_size'] = '13096';//Tamanho - Aqui aceitamos até 2 Mb
        $config['overwrite']  = FALSE;//Não irá sobre-escrever o arquivo
        $config['encrypt_name'] = TRUE;//Trocará o nome do arquivo para um HASH - TRUE PADRÃO
                   
        $_FILES['userfile']['name'] = $_FILES['todos_labels']['name']['new'.$i]['arquivo'];
        $_FILES['userfile']['type'] = $_FILES['todos_labels']['type']['new'.$i]['arquivo'];
        $_FILES['userfile']['tmp_name']= $_FILES['todos_labels']['tmp_name']['new'.$i]['arquivo'];
        $_FILES['userfile']['error'] = $_FILES['todos_labels']['error']['new'.$i]['arquivo'];
        $_FILES['userfile']['size'] = $_FILES['todos_labels']['size']['new'.$i]['arquivo'];

          if($_FILES['todos_labels']['error']['new'.$i]['arquivo']!=UPLOAD_ERR_OK){
             echo "<script>alert('Erro no Upload, verifique o tamanho do arquivo.')</script>";
             echo "<script>history.back()</script>";
             exit;
          }

        
        //Salva os dados do arquivo
          //Comfigura os dados para executar o upload
        $this->upload->initialize($config);
        $this->upload->do_upload();
        $dadosUp = $this->upload->data();


        $dadosArquivo['id_solicitacao'] = $id_solicitacao;
        $dadosArquivo['data_cadastro'] = date('Y-m-d');
        $dadosArquivo['arquivo'] = $dadosUp['file_name'];
        $arquivoBusiness = $this->Factory->createBusiness("anexos");
        $id_arquivo = $arquivoBusiness->cadastrar($dadosArquivo);

        
        }//Final For
      } //Final IF
     
      
      // Mensagem de Sucesso como true para ser exibido na view
      $msg = true;
      
      // Redireciona para tela de cadastrar incial com a mensagem de sucesso setado como true
      // Na tela de cadastro que está a mensagem de sucesso 
      redirect('solicitacao/editar/'.$id_solicitacao."/".$msg);
    }
  }


  //Listagem
  //Ação ao chamar a url: categoria/filtro
  public function filtro(){
    try {
  
      $this->load->helper(array('form','url'));

      // Tela inicial da listagem de dados
      if ($this->input->post() == NULL) {

        // Chama o padrão Business que possui o acesso a base de dados 
        $cadastroBusiness = $this->Factory->createBusiness("solicitacoes");
        $list = $cadastroBusiness->filtro(null);
        $info['list'] = $list;

        $content = $this->load->view("solicitacao/filtro",$info,TRUE);
        $this->loadPage($content);
      }

      // Caso seja solicitado a ação de pesquisar pelo filtro
      else{

      // Pega os dados do campo do formulário de pesquisa
      $dados = $this->input->post();

      // Chama o padrão Business que possui o acesso a base de dados
      $cadastroBusiness = $this->Factory->createBusiness("solicitacoes");
      // Observar que o parâmetro $dados está sendo enviado para listar apenas 
      // os dados referente ao desejado
      $list = $cadastroBusiness->filtro($dados);
      
      //Armazena os dados da listagem para ser exibido na view de pesquisa
      $info['list'] = $list;

      // Chama a view de cadastrar
      $content = $this->load->view("solicitacao/filtro",$info,TRUE);
      $this->loadPage($content);	

      }
    } catch (Exception $exc){
  
        $this->loadError($ex);  
    }
  }

   //Ação ao chamar a url: categoria/editar/$id
  //$msg = caso seja diferente de null mostrar a mensagem de sucesso na View de editar
  public function editar($id_solicitacao,$msg=null){
     //Carrega as biblitecas de form, e url (links) do codeigniter que serão utilizadas na View
    $this->load->helper(array('form','url'));
    //Carrega a bibliteca de Validação do Codeigniter padrão
    $this->load->library('form_validation');
    // Chama o metodo de Validação criado no inicio do controller determinando quais campos
    // precisam ser validados
    $this->Rules();

     //Tela de Editar inicial
    if($this->form_validation->run()==FALSE){
      
    
      $cadastroBusiness = $this->Factory->createBusiness("solicitacoes");
      $obj = $cadastroBusiness->visualizar($id_solicitacao);
      $info["obj"] = $obj;

      $anexosBusiness = $this->Factory->createBusiness("anexos");
      $listAnexos = $anexosBusiness->filtro($id_solicitacao);
      $info["listAnexos"] = $listAnexos;

     //Lista de Clientes
      $clientesBusiness = $this->Factory->createBusiness("clientes");
      $listClientes = $clientesBusiness->filtro();
      $info["listClientes"] = $listClientes;

      //Lista de Serviços
      $servicosBusiness = $this->Factory->createBusiness("servicos");
      $listServicos = $servicosBusiness->filtro();
      $info["listServicos"] = $listServicos;
      
      $info['msg'] = $msg; //Null, pois está na tela inicial e não teve ação de confirmar a edição 

       // Chama a view de Editar
      $content = $this->load->view("solicitacao/editar",$info,TRUE);
      $this->loadPage($content);
    }

     // Caso o formulario seja submetido (Ação no botão de Salvar)
    else{
  
      // Pega todos os dados dos campos referente ao formulário
      $dados = $this->input->post();

      $categoriaBusiness = $this->Factory->createBusiness("solicitacoes");
      $cod_categoria = $categoriaBusiness->editar($dados);
      
      // Mensagem de Sucesso como true para ser exibido na view
      $msg = true;
      
      // Redireciona para tela de cadastrar inicial com a mensagem de sucesso setado como true
      // Na tela de cadastro que está a mensagem de sucesso 
      redirect('solicitacao/editar/'.$dados['id_solicitacao'].'/'.$msg);
    }
  }

  //Exclusão
  //Ação ao chamar a url: categoria/excluir/$id
  public function excluir($id_solicitacao){
    //Carrega as biblitecas de form, e url (links) do codeigniter que serão utilizadas na View
    $this->load->helper(array('form','url'));
    
    //Chama o metodo de excluir do padrão bussiness
    $cadastroBusiness = $this->Factory->createBusiness("solicitacoes");
    $cadastroBusiness->excluir($id_solicitacao);
    
    //redireciona para o filtro de pesquisa após a exclusão
    redirect("solicitacao/filtro");
  }
}

?>
