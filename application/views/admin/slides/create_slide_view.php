<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавление слайда
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
                                <label>Заголовок слайда</label>
                                <!-- <input class="form-control" name="slide_title" value="" type="text"> -->
                                <input class="form-control" name="slide_name"
                                       value="<?php echo set_value('slide_name'); ?>" type="text" autofocus>
                            </div>

                            <!-- tex input -->
                            <div class="form-group">
                                <label>Описание слайда</label>
                                <input class="form-control" name="slide_desc"
                                       value="<?php echo set_value('slide_desc'); ?>" type="text">
                            </div>

                            <!-- tex input -->
                            <div class="form-group">
                                <label>Ссылка с кнопки слайда</label>
                                <select class="form-control" name="slide_button_url" id="slide_button_url" required>
                                    <option value="" disabled selected>Не выбрана</option>
                                    <?php foreach ($menu as $item): ?>
                                        <option
                                            value="/<?php echo $item['menu_slug'] ?>"><?php echo $item['menu_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!--                      <input class="form-control" name="slide_button_url" value="-->
                                <?php //echo set_value('slide_button_url'); ?><!--" type="text">-->
                                <!--                      <ul>-->
                                <!--                        <li>/home - Главная</li>-->
                                <!--                        <li>/about - О нас</li>-->
                                <!--                        <li>/pets - Наши животные</li>-->
                                <!--                        <li>/services - Наши услуги</li>-->
                                <!--                        <li>/blog - Блог</li>-->
                                <!--                      </ul>-->
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="userfile">Добавить слайд</label>
                                <input id="userfile" name="userfile" type="file">
                                <p class="help-block">Разрешение картинки будет приведено к размерам 1440x960</p>
                            </div>

                            <!-- radio -->
                            <div class="form-group">
                                <div class="radio">
                                    <fieldset>
                                        <legend><strong>Режим показа слайда</strong></legend>
                                        <label>
                                            <input name="slide_mode" id="optionsRadios1" value="fade"
                                                   type="radio" <?php echo set_radio('slide_status', 'fade', TRUE); ?>>
                                            Затухание
                                        </label>
                                        <br>
                                        <label>
                                            <input name="slide_mode" id="optionsRadios2" value="3dcurtain-vertical"
                                                   type="radio" <?php echo set_radio('slide_status', '3dcurtain-vertical'); ?>>
                                            Перелистывание
                                        </label>
                                        <br>
                                        <label>
                                            <input name="slide_mode" id="optionsRadios3" value="papercut"
                                                   type="radio" <?php echo set_radio('slide_status', 'papercut'); ?>>
                                            Разрезание
                                        </label>
                                    </fieldset>
                                </div>
                            </div>

                            <!-- radio -->
                            <div class="form-group">
                                <div class="radio">
                                    <fieldset>
                                        <legend><strong>Статус слайда</strong></legend>
                                        <label>
                                            <input name="slide_status" id="optionsRadios1" value="1"
                                                   type="radio" <?php echo set_radio('slide_status', '1', TRUE); ?>>
                                            Активный
                                        </label>
                                        <br>
                                        <label>
                                            <input name="slide_status" id="optionsRadios2" value="0"
                                                   type="radio" <?php echo set_radio('slide_status', '0', TRUE); ?>>
                                            Не активный
                                        </label>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary" value="Y">Добавить слайд
                                </button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
