      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Редактирование статьи
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

                    <div class="form-group">
                      <label for="region">Категория статьи</label>
                      <select class="form-control" name="blog_post_cat_id" id="blog_post_cat_id" required autofocus>
<!--                        <option value="" disabled>Не выбрана</option>-->
                        <?php foreach ($cats as $item): ?>
                          <option value="<?php echo $item['blog_cat_id']?>" <?php if($item['blog_cat_id'] == $post['blog_post_cat_id']):?>selected<?php endif?>><?php echo $item['blog_cat_name']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <!-- text input -->
                    <div class="form-group">
                      <label>Наименование статьи</label>
                      <input class="form-control" name="blog_post_title" value="<?php echo $post['blog_post_title']?>" type="text">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Текст статьи</label>
                      <textarea class="form-control ckeditor" name="blog_post_article"><?php echo $post['blog_post_article']?></textarea>
                    </div>

                    <table>
                      <tr>
                        <td>
                          <div class="form-group">
                            <label for="userfile">Изменить фото статьи</label>
                            <input id="userfile" name="userfile" type="file">
                            <p class="help-block">Большое фото будет приведено к ширине 800х600</p>
                          </div>
                        </td>
                        <td>
                          <img class="img-thumbnail" src="<?php echo $post['blog_post_img'];?>" alt="<?php echo $post['blog_post_title'];?>" width="200">
                        </td>
                      </tr>
                    </table>
                      <!-- radio -->
                      <div class="form-group">
                          <div class="radio">
                              <fieldset>
                                  <legend><strong>Статус слайда</strong></legend>
                                  <label>
                                      <input name="blog_post_status" id="optionsRadios1" value="1" type="radio" <?php if($post['blog_post_status'] == 1):?>checked<?php endif?>>
                                      Активна
                                  </label>
                                  <br>
                                  <label>
                                      <input name="blog_post_status" id="optionsRadios2" value="0" type="radio" <?php if($post['blog_post_status'] == 0):?>checked<?php endif?>>
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
