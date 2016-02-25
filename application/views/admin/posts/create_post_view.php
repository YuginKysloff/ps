      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление статьи в блог
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
                    <table style="width:100%;">
                      <tr>
                        <td>
                          <div class="form-group">
                            <label for="region">Категория статьи</label>
                            <select class="form-control" name="blog_post_cat_id" id="blog_post_cat_id" required autofocus>
                              <option value="" disabled selected>Не выбрана</option>
                              <?php foreach ($cats as $item): ?>
                                <option value="<?php echo $item['blog_cat_id']?>"><?php echo $item['blog_cat_name']?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </td>
                        <td>
                          <button type="button" class="btn btn-default" style="margin-left: 5%;" onclick="location.href='/admin/cats/create_cat'">Добавить категорию</button>
                        </td>
                      </tr>
                    </table>
<!-- text input -->
                    <div class="form-group">
                      <label>Наименование статьи</label>
                      <input class="form-control" name="blog_post_title" value="<?php echo set_value('blog_post_title'); ?>" type="text">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Текст статьи</label>
                      <textarea class="form-control ckeditor" name="blog_post_article"><?php echo set_value('blog_post_article'); ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="userfile">Добавить фото статьи</label>
                      <input id="userfile" name="userfile" type="file">
                      <p class="help-block">Большое фото будет приведено к ширине 800х600</p>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Статус статьи</strong></legend>
                          <label>
                            <input name="blog_post_status" id="optionsRadios1" value="1" type="radio" <?php echo set_radio('blog_post_status', '1', TRUE); ?>>
                            Активна
                          </label>
                          <br>
                          <label>
                            <input name="blog_post_status" id="optionsRadios2" value="0" type="radio" <?php echo set_radio('blog_post_status', '0', TRUE); ?>>
                            Неактивна
                          </label>
                        </fieldset>
                      </div>
                    </div>

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить статью</button>
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
