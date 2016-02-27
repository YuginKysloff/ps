<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Редактирование данных о компании
            <!-- <small>advanced tables</small> -->
        </h1>

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
                                <label>Название компании</label>
                                <input class="form-control" name="set_company"
                                       value="<?php echo $about['set_company']; ?>" type="text">
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Краткое описание сайта до 160 символов (необходимо для поисковиков).</label>
                                <input class="form-control" name="set_desc" value="<?php echo $about['set_desc']; ?>"
                                       type="text">
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Теги сайта через запятую (необходимо для поисковиков).</label>
                                <input class="form-control" name="set_tags" value="<?php echo $about['set_tags']; ?>"
                                       type="text">
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Адрес компании</label>
                                <input class="form-control" name="set_address"
                                       value="<?php echo $about['set_address']; ?>" type="text">
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Телефон компании</label>
                                <input class="form-control" name="set_phone" value="<?php echo $about['set_phone']; ?>"
                                       type="tel">
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>E-mail компании</label>
                                <input class="form-control" name="set_email" value="<?php echo $about['set_email']; ?>"
                                       type="email">
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Группа вконтакте</label>
                                <input class="form-control" name="set_vk" value="<?php echo $about['set_vk']; ?>"
                                       type="text">
                            </div>

                            <!-- radio -->
                            <div class="form-group">
                                <div class="radio">
                                    <fieldset>
                                        <legend><strong>Порядок прокрутки слайдов в главном слайдере</strong></legend>
                                        <label>
                                            <input name="set_slider_order" id="optionsRadios1" value="1" type="radio"
                                                   <?php if ($about['set_slider_order'] == 1): ?>checked<?php endif ?>>
                                            Сверху вниз
                                        </label>
                                        <br>
                                        <label>
                                            <input name="set_slider_order" id="optionsRadios2" value="0" type="radio"
                                                   <?php if ($about['set_slider_order'] == 0): ?>checked<?php endif ?>>
                                            Снизу вверх
                                        </label>
                                    </fieldset>
                                </div>
                            </div>
                            <hr>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Заголовок статьи о компании</label>
                                <input class="form-control" name="set_about_title"
                                       value="<?php echo $about['set_about_title']; ?>" type="text">
                            </div>
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Статья о компании</label>
                                <textarea class="form-control ckeditor"
                                          name="set_about"><?php echo $about['set_about']; ?></textarea>
                            </div>
                            <hr>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Заголовок статьи об услугах</label>
                                <input class="form-control" name="set_serv_title"
                                       value="<?php echo $about['set_serv_title']; ?>" type="text">
                            </div>
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Статья об услугах</label>
                                <textarea class="form-control ckeditor"
                                          name="set_serv"><?php echo $about['set_serv']; ?></textarea>
                            </div>
                            <hr>
                            <!--button-->
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary" value="Y">Применить
                                    изменения
                                </button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
