<!--  TELA DE CADASTRAR DOS DADOS 
Referência Biblioteca Front-end: http://getbootstrap.com.br/docs/3.3/
Template: http://vellore.com.br/templates/base/
Icons: http://vellore.com.br/templates/base/icons.html
-->
<?php $objDateFormat = $this->DateFormat; ?>
<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="x_panel">
			
			<!-- Camada links topo parte direita -->
			<div class="x_title">
				<h2>Visualizar Solicitação</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a href="<?php echo site_url('solicitacao/filtro'); ?>"><i class="fa fa-search"></i> <strong>Pesquisar</strong></a></li>
				</ul>                     
			
				<div class="clearfix"></div>
			
			</div>
			<!-- Final Camada links topo parte direita -->

			<div class="x_content"> 
				
				<!-- Caso no controller seja referenciado a variável $msg = true 
				significa que o cadastro foi reaizado com sucesso.
				com isso verifica se a variável foi setada
				-->
				<?php if($msg==true){ ?>
					<div class="alert alert-success alert-dismissible fade in" role="alert"  id="msgOk">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
						<strong><i class="fa fa-check"></i> Cadastro realizado com sucesso!</strong>
					</div>
				<?php } ?>
				<!-- final mensagem de cadastro -->

				<!-- Exibe mensagem de validação dos campos obrigatórios
				referenciados no controller --> 
				<?php echo validation_errors(); ?>

				<!-- Inicio do formuário -->
				<?php echo form_open('solicitacao/editar/'.$obj->getId_solicitacao(),array("onsubmit"=>"return validate()","class"=>"form-horizontal")); ?>
				<input type="hidden" name="id_solicitacao" value="<?php echo $obj->getId_solicitacao(); ?>">  

					<div class="form-group">

						<div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Código</label>
							<input type="text" class="form-control" readonly id="codigo" value="<?php echo set_value('codigo',$obj->getCodigo())?>" />
						</div>

							<div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Data Cadastro</label>
							<input type="text" class="form-control" readonly id="codigo" value="<?php echo set_value('codigo',$objDateFormat->date_format($obj->getData_solicitacao()))?>" />
						</div>
					</div>

					<!-- Campos do Formuario -->
						<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Cliente</label>
							  <select class="form-control select2_single" name="id_cliente" id="id_cliente">
							  	<option value="">Selecione...</option>
                                        <?php foreach ($listClientes as $objCliente): ?>
                                        <option <?php if($objCliente['id_cliente']==$obj->getId_cliente()){ echo 'selected'; } ?> value="<?php echo $objCliente['id_cliente']; ?>">
                                        <?php echo $objCliente['nome']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                        </select>
						</div>
					</div>

					<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Serviço</label>
							  <select class="form-control select2_single" name="id_servico" id="id_servico">
							  	<option value="">Selecione...</option>
                                        <?php foreach ($listServicos as $objServico): ?>
                                        <option  <?php if($objServico['id_servico']==$obj->getId_servico()){ echo 'selected'; } ?> value="<?php echo $objServico['id_servico']; ?>">
                                        <?php echo $objServico['servico']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                        </select>
						</div>
					</div>

					<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Assunto</label>
							<input type="text" class="form-control" name="assunto" id="assunto" value="<?php echo set_value('assunto',$obj->getAssunto())?>" />
						</div>
					</div>

					<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Conteudo</label>
							<textarea class="form-control" name="conteudo"><?php echo $obj->getConteudo(); ?></textarea>
						</div>

					</div>
					<!-- Final Campos do Formuario -->

					            <!-- Campos do Formuario -->
       

						<!-- Linha entre o final do arquivo e inicio do botão -->
					<div class="ln_solid"></div>

					<!-- Botões de Salvar e Limpar-->
					<div>

						<div class="col-md-12 col-sm-12 col-xs-12">
							
								<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
						</div>

					</div>
					<!-- Final Botões de Salvar e Limpar-->


			</div> <!-- Final x_content -->
		
		</div> <!-- Fina X_panel -->

	</div> <!-- COLS Principal -->

</div> <!-- ROWS -->

<!-- Linha referente ao histórico -->
<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
      
      <!-- Camada links topo parte direita -->
      <div class="x_title">
        <h2>Arquivos Enviados</h2>
        
        <div class="clearfix"></div>
      
      </div>
      <!-- Final Camada links topo parte direita -->

      <div class="x_content"> 
        <!-- Listagem de Historico de agendamentos -->

           <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            
            <!-- Colunas exibidas na página -->
            <thead>
               <tr class="fundoTituloTabela">
                <th>DATA</th>
                <th>VISUALIZAR</th>
               
               </tr>
            </thead>
            <!-- Final Colunas exibidas na página -->

            
            <!-- Linha referente aos registros da listagem -->
            <tbody>
               <!-- $list = Array populada no controller no metodo do filtro -->
               <?php foreach ($listAnexos as $objHistorico): ?>
                 <tr class="dadosTabela">
                
                  <td><?php echo $objDateFormat->date_format($objHistorico['data_cadastro']); ?></td>
                 
                   <td><a href="<?php echo base_url()."/doc/{$objHistorico['arquivo']}" ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-cloud-download"></i> <strong>Download</strong></a></td>                           
                </tr>

              <?php endforeach;?>
             
            </tbody>

            <!-- Final Linha referente aos registros da listagem -->


          </table>

        <!-- final listagem de Histórico de agendamento -->
      </div>

    </div>
  </div>
</div>
<!-- final histórico -->

<script type="text/javascript">
// Caso $msg seja true ocuta a mensagem de cadastro depois de aguns segundos
<?php if($msg==true){ ?>

//função para ocultar mensagem de cadastro: arquivo: js/base.js
hideMessage();

<?php } ?>

/* Abaixo pode ser incuido bibliotecas ou scripts Js

</script>


<link href="<?= base_url() ?>css/select/select2.min.css" rel="stylesheet">
<script src="<?= base_url() ?>js/select/select2.full.js"></script>
<script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Selecione...",
        allowClear: true
      });
      
      $(".select2_group").select2({});
      
      $(".select2_multiple").select2({
        maximumSelectionLength: 20,
        placeholder: "Selecione ...",
        allowClear: true
      });

    });
</script>

<script src="<?= base_url(); ?>js/jquery.repeatable.js"></script>

<script>
  //$(function() {
    $(".todos_labels .repeatable").repeatable({
      addTrigger: ".todos_labels .add",
      deleteTrigger: ".todos_labels .delete",
      template: "#todos_labels",
      startWith: 1,
      max: 100
    });

    $(".todos_labels2 .repeatable2").repeatable({
      addTrigger: ".todos_labels2 .add",
      deleteTrigger: ".todos_labels2 .delete",
      template: "#todos_labels2",
      startWith: 1,
      max: 5
    });
//}
</script>