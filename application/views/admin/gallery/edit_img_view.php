      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Редактирование фото
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
                      <input class="form-control" name="gal_name" value="<?php echo $img['gal_name']?>" type="text" autofocus>
                    </div>
                    <table>
                      <tr>
                        <td>
                          <div class="form-group">
                            <label for="userfile">Изменить фото</label>
                            <input id="userfile" name="userfile" type="file">
                            <p class="help-block">Большое фото будет приведено к ширине 800пх</p>
                          </div>
                        </td>
                        <td>
                          <img class="img-thumbnail" src="<?php echo $img['gal_img'];?>" alt="<?php echo $img['gal_name'];?>" width="200">                           
                        </td>
                      </tr>
                    </table>
                    <!-- radio -->
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Сохранить изменения</button>                 
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
