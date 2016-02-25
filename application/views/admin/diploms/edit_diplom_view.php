      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Редактирование информации о дипломе
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
                          <label>Название мероприятия</label>
                          <input class="form-control" name="diplom_name" value="<?php echo $diplom['diplom_name'];?>" type="text" autofocus>
                      </div>

                      <!-- text input -->
                      <div class="form-group">
                          <label>Дата и место проведения</label>
                          <input class="form-control" name="diplom_date" value="<?php echo $diplom['diplom_date'];?>" min="0" type="text">
                      </div>

                      <!-- text input -->
                      <div class="form-group">
                          <label>Описание</label>
                          <input class="form-control" name="diplom_desc" value="<?php echo $diplom['diplom_desc'];?>" type="text">
                      </div>

                      <!-- input photo-->
                      <table>
                          <tr>
                              <td>
                                  <div class="form-group">
                                      <label for="userfile">Изменить фото диплома</label>
                                      <input id="userfile" name="userfile" type="file">
                                      <p class="help-block">Большое фото будет приведено к ширине 160пх</p>
                                  </div>
                              </td>
                              <td>
                                  <img class="img-thumbnail" src="<?php echo $diplom['diplom_img'];?>" alt="<?php echo $diplom['diplom_name'];?>" width="200">
                              </td>
                          </tr>
                      </table>

                      <!-- radio -->
                      <div class="form-group">
                          <div class="radio">
                              <fieldset>
                                  <legend><strong>Статус диплома</strong></legend>
                                  <label>
                                      <input name="diplom_status" id="optionsRadios1" value="1" type="radio" <?php if($diplom['diplom_status'] == 1):?>checked<?php endif?>>
                                      Активен
                                  </label>
                                  <br>
                                  <label>
                                      <input name="diplom_status" id="optionsRadios2" value="0" type="radio" <?php if($diplom['diplom_status'] == 0):?>checked<?php endif?>>
                                      Неактивен
                                  </label>
                              </fieldset>
                          </div>
                      </div>

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
