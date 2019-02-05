<!--  TELA DE CADASTRAR DOS DADOS 
Referência Biblioteca Front-end: http://getbootstrap.com.br/docs/3.3/
Template: http://vellore.com.br/templates/base/
Icons: http://vellore.com.br/templates/base/icons.html
-->

<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="x_panel">
			
			<!-- Camada links topo parte direita -->
			<div class="x_title">
				<h2>Cadastrar Solicitação</h2>
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
				<?php echo form_open_multipart('solicitacao/cadastrar',array("onsubmit"=>"return validate()","class"=>"contact form-horizontal","id"=>"ajax_form")); ?>

					<!-- Campos do Formuario -->
						<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Cliente</label>
							  <select class="form-control select2_single" name="id_cliente" id="id_cliente">
							  	<option value="">Selecione...</option>
                                        <?php foreach ($listClientes as $objCliente): ?>
                                        <option value="<?php echo $objCliente['id_cliente']; ?>">
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
                                        <option value="<?php echo $objServico['id_servico']; ?>">
                                        <?php echo $objServico['servico']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                        </select>
						</div>
					</div>

					<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Assunto</label>
							<input type="text" class="form-control" name="assunto" id="assunto" value="<?php echo set_value('assunto')?>" />
						</div>
					</div>

					<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Conteudo</label>
							<textarea class="form-control" name="conteudo"></textarea>
						</div>

					</div>
					<!-- Final Campos do Formuario -->

					            <!-- Campos do Formuario -->
          <div class="form-group">

              
              <!-- MIOLO FORM FOTOS -->
                <fieldset class="todos_labels">

          <div class="repeatable"></div>

          <br />
          <div class="form-group">
            <!--<input type="button" value="Incluir" class="btn btn-success add" align="center">-->
            
            <button type="button" class="btn btn-success add" id="incluir">
            <i class="fa fa-plus-circle"> <span style="font-family:sans-serif;">Incluir Arquivo</span></i> 
            </button>
          
          </div>

        </fieldset>

        <!-- INPUTS ADD -->

        <script type="text/template" id="todos_labels">
      <div class="field-group row" id="up">
        
       <div class="col-lg-6" style="display:none;">
        <label for="duedate_{?}">Título Arquivo</label>
        <input type="text" class="span6 form-control" name="todos_labels[{?}][titulo]" value="{titulo}" id="titulo_{?}" maxlength="100">
      </div>

        <div class="col-lg-3">
        <label for="task_{?}">Arquivo</label>
        <input type="file" class="span6 form-control" name="todos_labels[{?}][arquivo]" value="{arquivo}" id="arquivo_{?}">
        </div> 
        
            

      <div class="col-lg-3">
      <label for=""></label><br>
      <!--  <input type="button" class="btn btn-danger span-2 delete"/>-->
          <button type="button" class="btn btn-danger span-2 delete"><i class="fa fa-trash"></i> </button>
      </div>
      </div>
    </script>

        <!-- FINAL INPUTS ADD -->
        
        </div>


						<!-- Linha entre o final do arquivo e inicio do botão -->
					<div class="ln_solid"></div>

					<!-- Botões de Salvar e Limpar-->
					<div>

						<div class="col-md-12 col-sm-12 col-xs-12">
								<button type="reset" class="btn btn-danger"><i class="fa fa-remove"></i> Limpar</button>
								<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
						</div>

					</div>
					<!-- Final Botões de Salvar e Limpar-->


			</div> <!-- Final x_content -->
		
		</div> <!-- Fina X_panel -->

	</div> <!-- COLS Principal -->

</div> <!-- ROWS -->

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

      
      $('#ajax_form').submit(function(){
      		$('#ajax_form_unidade').submit(function(){

  $.ajax({
    type: "POST",
    url: "<?php echo site_url('solicitacao/cadastrar'); ?>",
    data: $('form.contact').serialize(),
    success: function(msg){
        alert("ok");
       },

       error: function(u){
      //alert("failure");
    }
  });

  return false;
});

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