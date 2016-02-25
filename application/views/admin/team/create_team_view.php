      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление записи
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
                  <form role="form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                    <!-- text input -->
                    <div class="form-group">
                      <label>ФИО</label>
                      <input class="form-control" name="team_name" value="<?php echo set_value('team_name'); ?>" type="text" autofocus>
                    </div>

                    <!-- text input -->
                    <div class="form-group">
                      <label>Должность</label>
                      <input class="form-control" name="team_position" value="<?php echo set_value('team_position'); ?>" type="text">
                    </div>

                    <!-- text input -->
                    <div class="form-group">
                      <label>Описание</label>
                      <input class="form-control" name="team_desc" value="<?php echo set_value('team_desc'); ?>" type="text">
                    </div>

                    <!-- input photo-->
                    <div class="form-group">
                      <label for="userfile">Добавить фото</label>
                      <input id="userfile" name="userfile" type="file">
                      <p class="help-block">Большое фото будет приведено к размерам 375x375</p>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Статуc</strong></legend>
                          <label>
                            <input name="team_status" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('team_status', '1'); ?>>
                            Активен
                          </label>
                          <br>
                          <label>
                            <input name="team_status" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('team_status', '0', TRUE); ?>>
                            Неактивен
                          </label>
                        </fieldset>
                      </div>
                    </div>

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить запись</button>
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
