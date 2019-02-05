<!--  TELA DE PESQUISAR DOS DADOS 
Referência Biblioteca Front-end: http://getbootstrap.com.br/docs/3.3/
Template: http://vellore.com.br/templates/base/
Icons: http://vellore.com.br/templates/base/icons.html
-->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
     
      <!-- CAMADA LINKS DIREITA DA TELA DE PESQUISA -->
      <div class="x_title">
        <!-- Titulo da listagem -->
        <h2>Pesquisa de Serviços Oferecidos</h2>
          <ul class="nav navbar-right panel_toolbox">
            <!-- Link de Cadastrar -->
            <li><a href="<?php echo site_url('servico/cadastrar'); ?>"><i class="fa fa-plus-circle"></i> <strong>Novo</strong></a></li>
            <!-- Exibir Modal de Pesquisa para filtrar os dados -->
            <li><a data-toggle="modal" href="#modal_pesquisa"><i class="fa fa-search"></i> <strong>Pesquisar</strong></a></li>
          </ul>
          
          <div class="clearfix"></div>
      
      </div>
      <!-- FINAL CAMADA LINKS DIREITA DA TELA DE PESQUISA -->


        <!-- ********* INICIO MIOLO LISTAGEM **********-->
        <div class="x_content"> 

          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            
            <!-- Colunas exibidas na página -->
            <thead>
               <tr class="fundoTituloTabela">
                <th>SERVIÇO</th>
                <th>OPERAÇÕES</th>
              </tr>
            </thead>
            <!-- Final Colunas exibidas na página -->

            
            <!-- Linha referente aos registros da listagem -->
            <tbody>
               <!-- $list = Array populada no controller no metodo do filtro -->
               <?php foreach ($list as $obj): ?>
                 <tr class="dadosTabela">

                  <!-- Coluna nome da categoria -->
                  <td><?php echo $obj['servico']; ?></td>
                  
                  <!-- Coluna de ações - Editar e Excluir -->
                  <td class="td-actions">
                     <!-- Chama a controller de editar -->
                  <a href="<?php echo site_url('servico/editar/'.$obj['id_servico']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Editar</a>
                  
                  <!-- Chama o model de exclusão -->
                  <a href="#" class="confirm-delete btn btn-danger btn-sm" data-id="<?php echo $obj['id_servico']; ?>"><i class="fa fa-trash"></i> Excluir</a>
                  </td>

                </tr>

              <?php endforeach;?>
             
            </tbody>

            <!-- Final Linha referente aos registros da listagem -->


          </table>

        </div>  <!-- FINAL MIOLO LISTAGEM -->

        <!-- ********* FINAL MIOLO **********-->
    </div> <!-- FINAL XPANEL -->
  </div> <!-- FINAL COL -->
</div><!-- FINAL ROWS -->

           <!-- ******* Modal de Exclusão (Padrão, não precisa alterar) -->
      <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Deseja realmente excluir o item?</h4>
            </div>
           
      <div class="modal-footer">
      <!-- Ao clicar em confirmar será rodado o script no final deste arquivo -->
      <a href="#" id="btnYes" class="btn btn-danger"><i class="fa fa-trash"></i> Confirmar exclusão</a>
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Fechar Janela</a>
     
    </div>
          </div>
        </div>
      </div>

      <!-- ********* Final Modal de Exclusão -->

      
      <!-- Inicio Modal Pesquisa -->

      <!-- Start Calendar modal -->
      <div id="modal_pesquisa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-search"></i> Pesquisar</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal">
             
             <!-- Alterar o controller desejado do form -->
             <form class="form-horizontal" method="post" id="forgot_form" action="<?php echo base_url(); ?>servico/filtro/">
                  
               <!-- 
               Inclui campos desejado na pesquisa, por padrão deixar os campos com o mesmo nome
               da coluna da tabela, em alguns casos pode ser diferente   
               IMPORTANTE: Na DAO quando realiza a o filtro é baseado nesse campo(name) para fazer a consulta.
               Fluxo Dados: View -> Controller -> Bussines -> Dao      
                -->
                  
                  <!-- Pesquisar Campo Nome Categoria -->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Serviço</label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="servico" value="<?php echo set_value('servico')?>" maxlength="50"/>
                    </div>
                  </div>
                  <!-- Final Pesquisa Campo Categoria -->

                  
                  <!-- Outro Campo Categoria -->
                  <!--<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria</label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="categoria" value="<?php echo set_value('categoria')?>" maxlength="50"/>
                    </div>
                  </div>-->
                  <!-- Final Outro Campo Categoria -->             
                
              </div>
            </div>
            <div class="modal-footer">
              <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Fechar Janela</a>
              <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Pesquisar</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- final modal pesquisa -->



<!-- OPERAÇÃO PARA EXCLUSÃO DE DADOS (Alterar apenas o controller desejado no final do script) -->
<script type="text/javascript">
$(function () {

 //Padrão
  $('#CalenderModalNew').on('show', function() {
    var id = $(this).data('id'),
    removeBtn = $(this).find('.danger');
  });

  //Padrão
  $(document).on('click', '.confirm-delete', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    $('#CalenderModalNew').data('id', id).modal('show');
  });

  // Padrão, em alguns casos pode ser solicitado um segundo parametro que deve ser criado como variável 
  // igualmente como está sendo feito com o id
  $('#btnYes').click(function() {
    // handle deletion here
    var id = $('#CalenderModalNew').data('id');
    $('[data-id='+id+']').remove();
    $('#CalenderModalNew').modal('hide');
    
    // Alterar apenas o controller ou em alguns casos adicionar mais um parametro para o metodo de excluir
    location.href="<?php echo site_url('servico/excluir'); ?>/"+id;

  });
  
  //FINAL OPERAÇÃO EXCLUSÃO

  





});

</script>      