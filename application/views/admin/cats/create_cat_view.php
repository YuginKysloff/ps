      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление категории
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
                  <form role="form" method="post" accept-charset="utf-8">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Наименование категории</label>
                      <input class="form-control" name="blog_cat_name" value="<?php echo set_value('blog_cat_name'); ?>" type="text" autofocus>
                    </div>
                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Статус категории</strong></legend>
                          <label>
                            <input name="blog_cat_status" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('blog_cat_status', '1', TRUE); ?>>
                            Активна
                          </label>
                          <br>
                          <label>
                            <input name="blog_cat_status" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('blog_cat_status', '0', TRUE); ?>>
                            Неактивна
                          </label>
                        </fieldset>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить категорию</button>
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
