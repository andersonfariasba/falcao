
  <!-- MENU LATERAL -->
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="margin-top:10px; ">
            <a href="#"><img src="<?= base_url(); ?>/img/logo.png" width="130px;" border="0" /></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          
          <!-- /menu prile quick info -->

          <br />

        

            <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>Módulos Sistema</h3>
              <ul class="nav side-menu">
                
              
              
                  <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                  
                    
                    <li><a href="<?php echo site_url('cliente/filtro');?>">Consultar</a>
                    </li>
                     <li><a href="<?php echo site_url('cliente/cadastrar');?>">Novo</a>
                    </li>
                  
                    </li>
                  
                  </ul>
                </li>

                <li><a><i class="fa fa-briefcase"></i> Solicitações <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                  
                    
                    <li><a href="<?php echo site_url('solicitacao/filtro');?>">Consultar</a>
                    </li>
                     <li><a href="<?php echo site_url('solicitacao/cadastrar');?>">Nova Solicitação</a>
                    </li>
                  
                    </li>
                  
                  </ul>
                </li>


                <li><a><i class="fa fa-gear"></i> Configurações <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('servico/filtro');?>">Serviços Oferecidos</a></li>
                    
                
                  
                    </li>
                  
                  </ul>
                </li>
            


                
            
            <li><a><i class="fa fa-key"></i> Acesso <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                  
                    <li><a href="<?php echo site_url('acesso_usuarios/filtro');?>">Usuários</a></li>
                  
                    </li>
                   
                  </ul>
                </li>

                   


              
            

              </ul>
            </div>
            
         



          </div>



       
        </div>
      </div> <!-- final menu lateral-->


  <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url(); ?>images/img.png" alt=""><?php echo $this->session->userdata('login'); ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  
              
                 <!-- <li>
                    <a href="javascript:;">Ajuda</a>
                  </li>-->
                  <li><a href="<?php echo site_url('login/sair');?>"><i class="fa fa-sign-out pull-right"></i> Sair do Sistema</a>
                  </li>
                </ul>
              </li>

              
               <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell-o"></i>
                  <span class="badge bg-red" id="total_msg"></span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                 <span id="listaMsgPendente"></span>

                

                </ul>

              </li>

              
               <!-- <li role="presentation" class="dropdown">
                <a href="<?php echo site_url('agenda_teste/visualizar');?>" target="__blank">
                  <i class="fa fa-calendar"></i>-->
                 

              </li>


              

           </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


<!-- /subnavbar -->
<?php //print_r($this->session->all_userdata()); ?>

<?php  //echo $this->session->userdata('login'); ?>
