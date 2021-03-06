      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление пользователя
            <!-- <small>advanced tables</small> -->
          </h1>
<!--           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-11">
              <div class="box">
                <!--<div class="box-header">
                  <h3 class="box-title">О компании</h3>
                </div> --><!-- /.box-header -->
                <div class="box-body">
                  <!-- <span class="text-red"><?php echo validation_errors(); ?></span> -->
                  <form role="form" method="post" accept-charset="utf-8">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Имя пользователя</label>
                      <?php echo form_error('user_name','<div class="text-red">', '</div>'); ?>
                      <input class="form-control" name="user_name" value="<?php echo set_value('user_name'); ?>" type="text" autofocus>
                    </div>
                    <div class="form-group">      
                      <label>Електронная почта </label>
                      <?php echo form_error('user_email','<div class="text-red">', '</div>'); ?>                      
                      <span class="error_message"> <?php echo $this->session->flashdata('message');?></span>                         
                      <input class="form-control" name="user_email" value="<?php echo set_value('user_email'); ?>" type="email">
                    </div>
                    <!-- text input -->
                    <div class="form-group">
                      <label>Номер телефона</label>
                      <?php echo form_error('user_phone','<div class="text-red">', '</div>'); ?>
                      <input class="form-control" name="user_phone" value="<?php echo set_value('user_phone'); ?>" type="tel">
                    </div>

                    <div class="form-group"> 
                      <label>Пароль</label>
                      <?php echo form_error('user_password','<div class="text-red">', '</div>'); ?>                      
                      <input class="form-control" name="user_password" value="" type="password">
                    </div>
                    <div class="form-group">
                      <label>Подтверждение пароля</label>
                      <?php echo form_error('passconf','<div class="text-red">', '</div>'); ?>                      
                      <input class="form-control" name="passconf" value="" type="password">
                    </div>                        
                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Статус пользователя</strong></legend>
                          <label>
                            <input name="user_status" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('user_status', '1', TRUE); ?>>
                            Администратор
                          </label>
                          <br>
                          <label>
                            <input name="user_status" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('user_status', '0', TRUE); ?>>
                            Пользователь
                          </label>  
                        </fieldset>                      
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить пользователя</button>                 
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
