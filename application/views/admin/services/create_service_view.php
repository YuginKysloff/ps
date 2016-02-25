      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление услуги в каталог
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
                      <label>Название услуги</label>
                      <input class="form-control" name="serv_name" value="<?php echo set_value('serv_name'); ?>" type="text" autofocus>
                    </div>

                    <!-- input photo-->
                    <div class="form-group">
                      <label for="userfile">Добавить фото услуги</label>
                      <input id="userfile" name="userfile" type="file">
                      <p class="help-block">Большое фото будет приведено к размерам 570х240</p>
                    </div>
                    <hr>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Описание услуги</label>
                      <textarea class="form-control ckeditor" name="serv_desc"><?php echo set_value('serv_desc'); ?></textarea>
                    </div>

                    <!-- text input -->
                    <div class="form-group">
                      <label>Цена</label>
                      <input class="form-control" name="serv_price" value="<?php echo set_value('serv_price'); ?>" min="0" type="number" style="width:23%;">
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Статус услуги</strong></legend>
                          <label>
                            <input name="serv_status" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('serv_status', '1'); ?>>
                            Активна
                          </label>
                          <br>
                          <label>
                            <input name="serv_status" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('serv_status', '0', TRUE); ?>>
                            Неактивна
                          </label>
                        </fieldset>
                      </div>
                    </div>

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить услугу</button>
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
