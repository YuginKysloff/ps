      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление фото в галерею
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
                      <label>Наименование фото</label>
                      <input class="form-control" name="gal_name" value="<?php echo set_value('gal_name'); ?>" type="text" autofocus>
                    </div>

                    <div class="form-group">
                      <label for="userfile">Добавить фото</label>
                      <input id="userfile" name="userfile" type="file">
                      <p class="help-block">Большое фото будет приведено к ширине 800пх</p>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить фото</button>                 
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
