      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Редактирование информации о собаке
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-11">
              <div class="box">
                <div class="box-body">
                  <form role="form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                      <!-- text input -->
                      <div class="form-group">
                          <label>Имя</label>
                          <input class="form-control" name="dog_name" value="<?php echo $dog['dog_name'];?>" type="text" autofocus>
                      </div>

                      <div class="form-group">
                          <label for="dog_breed">Порода</label>
                          <select class="form-control" size="1" name="dog_breed" id="dog_breed" style="width:23%;"
                                  required>
                              <? foreach ($breeds as $item): ?>
                                  <option value="<?= $item['breed_id']; ?>"
                                          <?php if($item['breed_id'] == $dog['dog_breed']):?>
                                              selected
                                          <?php endif?>>
                                      <?= $item['breed_name']; ?>
                                  </option>
                              <? endforeach; ?>
                          </select>
                      </div>

                      <!-- date input -->
                      <div class="form-group">
                          <label>Дата рождения</label>
                          <input class="form-control" name="dog_birthday" value="<?php echo date('Y-m-d',$dog['dog_birthday']); ?>" type="date" style="width:23%;">
                      </div>

                      <!-- radio -->
                      <div class="form-group">
                          <div class="radio">
                              <fieldset>
                                  <legend><strong>Пол</strong></legend>
                                  <label>
                                      <input name="dog_gender" id="optionsRadios1" value="1" type="radio" <?php if($dog['dog_gender'] == 1):?>checked<?php endif?>>
                                      Мужской
                                  </label>
                                  <br>
                                  <label>
                                      <input name="dog_gender" id="optionsRadios2" value="0" type="radio" <?php if($dog['dog_gender'] == 0):?>checked<?php endif?>>
                                      Женский
                                  </label>
                              </fieldset>
                          </div>
                      </div>
                      <hr>

                      <!-- input photo-->
                      <table>
                          <tr>
                              <td>
                                  <div class="form-group">
                                      <label for="userfile">Изменить фото собаки</label>
                                      <input id="userfile" name="userfile" type="file">
                                      <p class="help-block">Большое фото будет приведено к размерам 270х270</p>
                                  </div>
                              </td>
                              <td>
                                  <img class="img-thumbnail" src="<?php echo $dog['dog_img'];?>" alt="<?php echo $dog['dog_name'];?>" width="200">
                              </td>
                          </tr>
                      </table>
                      <hr>

                      <!-- textarea -->
                      <div class="form-group">
                          <label>Описание собаки</label>
                          <textarea class="form-control ckeditor" name="dog_desc"><?php echo $dog['dog_desc']; ?></textarea>
                      </div>

                      <!-- textarea -->
                      <div class="form-group">
                          <label>Раскладка собаки</label>
                          <textarea class="form-control ckeditor" name="dog_genealogy"><?php echo $dog['dog_genealogy']; ?></textarea>
                      </div>

                      <!-- radio -->
                      <div class="form-group">
                          <div class="radio">
                              <fieldset>
                                  <legend><strong>Статус собаки</strong></legend>
                                  <label>
                                      <input name="dog_status" id="optionsRadios1" value="1" type="radio" <?php if($dog['dog_status'] == 1):?>checked<?php endif?>>
                                      Активна
                                  </label>
                                  <br>
                                  <label>
                                      <input name="dog_status" id="optionsRadios2" value="0" type="radio" <?php if($dog['dog_status'] == 0):?>checked<?php endif?>>
                                      Неактивна
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
