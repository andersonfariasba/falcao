<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

				<div class="x_title">
					<h2>Editar Usuário</h2>
					<ul class="nav navbar-right panel_toolbox">
					<li><a href="<?php echo site_url('acesso_usuarios/cadastrar'); ?>"><i class="fa fa-plus-circle"></i> <strong>Novo Usuário</strong></a></li>
					<li><a href="<?php echo site_url('acesso_usuarios/filtro'); ?>"><i class="fa fa-search"></i> <strong>Pesquisar Usuário</strong></a></li>
					
					</ul>                     
					<div class="clearfix"></div>
				</div>

				<!-- ********* INICIO MIOLO **********-->
				<div class="x_content"> <!-- INICIO MIOLO-->

					<?php if($msg==true){ ?>
					<div class="alert alert-success alert-dismissible fade in" role="alert"  id="msgOk">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
						<strong><i class="fa fa-check"></i> Cadastro realizado com sucesso!</strong>
					</div>
					<?php } ?>

			  	   <?php echo validation_errors(); ?>
                   
                   
                 <?php echo form_open('acesso_usuarios/editar/'.$objUser->getId_usuario(),array("onsubmit"=>"return validate()","class"=>"form-horizontal")); ?>
				   <input type="hidden" name="id_usuario" value="<?php echo $objUser->getId_usuario(); ?>">
    			  
    			   <input type="hidden" name="senha" class="span4" id="senha" value="<?php echo set_value('senha',$objUser->getSenha());?>">
    	
				
					
				
					

					<div class="form-group">
						
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Login</label>
							<input type="text" class="form-control" name="login" value="<?php echo set_value('login',$objUser->getLogin())?>" maxlength="50"/>
						</div>
					</div>


					<div class="form-group">
						
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label>Senha</label>
							<input type="password" class="form-control" name="nova_senha" id="nova_senha" value="<?php echo set_value('nova_senha')?>" maxlength="50"/>
						</div>
					</div>




					<div class="ln_solid"></div>

					<div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
							</form>
						</div>
					</div>
				</div>

		</div>  <!-- FINAL MIOLO -->

	</div> <!-- FINAL COL -->

</div> <!-- FINAL ROWS -->






<script type="text/javascript">

<?php if($msg==true){ ?>
//função para ocultar mensagem de cadastro: arquivo: js/base.js
hideMessage();

<?php } ?>

</script>


