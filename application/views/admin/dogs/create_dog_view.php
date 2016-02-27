      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление щенка в каталог
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
                      <label>Имя</label>
                      <input class="form-control" name="pet_name" value="<?php echo set_value('pet_name'); ?>" type="text" autofocus>
                    </div>

                    <!-- text input -->
                    <div class="form-group">
                      <label>Порода</label>
                      <input class="form-control" name="pet_breed" value="<?php echo set_value('pet_breed'); ?>" type="text">
                    </div>

                    <!-- date input -->
                    <div class="form-group">
                      <label>Дата рождения</label>
                      <input class="form-control" name="pet_birthday" value="<?php echo set_value('pet_birthday'); ?>" type="date" style="width:23%;">
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Пол</strong></legend>
                          <label>
                            <input name="pet_gender" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('pet_gender', '1', TRUE); ?>>
                            Мальчик
                          </label>
                          <br>
                          <label>
                            <input name="pet_gender" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('pet_gender', '0'); ?>>
                            Девочка
                          </label>
                        </fieldset>
                      </div>
                    </div>
                    <hr>

                    <!-- input photo-->
                    <div class="form-group">
                      <label for="userfile">Добавить фото щенка</label>
                      <input id="userfile" name="userfile" type="file">
                      <p class="help-block">Большое фото будет приведено к размерам 270х270</p>
                    </div>
                    <hr>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Описание щенка</label>
                      <textarea class="form-control ckeditor" name="pet_desc"><?php echo set_value('pet_desc'); ?></textarea>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Наличие документов</strong></legend>
                          <label>
                            <input name="pet_docs" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('pet_docs', '1'); ?>>
                            Есть
                          </label>
                          <br>
                          <label>
                            <input name="pet_docs" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('pet_docs', '0', TRUE); ?>>
                            Нет
                          </label>
                        </fieldset>
                      </div>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Наличие прививок</strong></legend>
                          <label>
                            <input name="pet_vactination" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('pet_vactination', '1'); ?>>
                            Есть
                          </label>
                          <br>
                          <label>
                            <input name="pet_vactination" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('pet_vactination', '0', TRUE); ?>>
                            Нет
                          </label>
                        </fieldset>
                      </div>
                    </div>
                    <hr>

                    <!-- text input -->
                    <div class="form-group">
                      <label>Цена</label>
                      <input class="form-control" name="pet_price" value="<?php echo set_value('pet_price'); ?>" min="0" type="number" style="width:23%;">
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Наличие скидки</strong></legend>
                          <label>
                            <input name="pet_discount" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('pet_discount', '1'); ?>>
                            Есть
                          </label>
                          <br>
                          <label>
                            <input name="pet_discount" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('pet_discount', '0', TRUE); ?>>
                            Нет
                          </label>
                        </fieldset>
                      </div>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Статус щенка</strong></legend>
                          <label>
                            <input name="pet_status" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('pet_status', '1', TRUE); ?>>
                            В наличии
                          </label>
                          <br>
                          <label>
                            <input name="pet_status" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('pet_status', '0'); ?>>
                            Резерв
                          </label>
                        </fieldset>
                      </div>
                    </div>

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить щенка</button>
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
