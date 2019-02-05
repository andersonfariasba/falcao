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
				<h2>Cadastrar Serviço Oferecido</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a href="<?php echo site_url('servico/filtro'); ?>"><i class="fa fa-search"></i> <strong>Pesquisar</strong></a></li>
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
				<?php echo form_open('servico/cadastrar',array("onsubmit"=>"return validate()","class"=>"form-horizontal")); ?>

					<!-- Campos do Formuario -->
					<div class="form-group">

						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Nome do Serviço Oferecido</label>
							<input type="text" class="form-control" name="servico" id="servico" value="<?php echo set_value('servico')?>" />
						</div>

					</div>
					<!-- Final Campos do Formuario -->

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


