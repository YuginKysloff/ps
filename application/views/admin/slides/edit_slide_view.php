<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Редактирование слайда
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
                                <input class="form-control" name="slide_name" value="<?php echo $slide['slide_name'] ?>"
                                       type="text" autofocus>
                            </div>

                            <!-- textarea -->
                            <div class="form-group">
                                <label>Описание слайда</label>
                                <input class="form-control" name="slide_desc" value="<?php echo $slide['slide_desc'] ?>"
                                       type="text">
                            </div>

                            <!-- tex input -->
                            <div class="form-group">
                                <label>Ссылка с кнопки слайда</label>
                                <select class="form-control" name="slide_button_url" id="slide_button_url" required>
                                    <?php foreach ($menu as $item): ?>
                                        <option value="/<?php echo $item['menu_slug'] ?>"
                                                <?php if ('/' . $item['menu_slug'] == $slide['slide_button_url']): ?>
                                                    selected
                                                <?php endif ?>>
                                            <?php echo $item['menu_name'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                <!--                      <input class="form-control" name="slide_button_url" value="-->
                                <?php //echo $slide['slide_button_url']?><!--" type="text">-->
                                <!--                      <ul>-->
                                <!--                        <li>/home - Главная</li>-->
                                <!--                        <li>/about - О нас</li>-->
                                <!--                        <li>/pets - Наши животные</li>-->
                                <!--                        <li>/services - Наши услуги</li>-->
                                <!--                        <li>/blog - Блог</li>-->
                                <!--                      </ul>-->
                            </div>
                            <hr>
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="userfile">Изменить слайд</label>
                                            <input id="userfile" name="userfile" type="file">
                                            <p class="help-block">Разрешение картинки будет приведено к размерам
                                                1440x960</p>
                                        </div>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail" src="<?php echo $slide['slide_url']; ?>"
                                             alt="<?php echo $slide['slide_name']; ?>" width="200">
                                    </td>
                                </tr>
                            </table>

                            <!-- radio -->
                            <div class="form-group">
                                <div class="radio">
                                    <fieldset>
                                        <legend><strong>Режим показа слайда</strong></legend>
                                        <label>
                                            <input name="slide_mode" id="optionsRadios1" value="fade" type="radio"
                                                   <?php if ($slide['slide_mode'] == 'fade'): ?>checked<?php endif ?>>
                                            Затухание
                                        </label>
                                        <br>
                                        <label>
                                            <input name="slide_mode" id="optionsRadios2" value="3dcurtain-vertical"
                                                   type="radio"
                                                   <?php if ($slide['slide_mode'] == '3dcurtain-vertical'): ?>checked<?php endif ?>>
                                            Перелистывание
                                        </label>
                                        <br>
                                        <label>
                                            <input name="slide_mode" id="optionsRadios3" value="papercut" type="radio"
                                                   <?php if ($slide['slide_mode'] == 'papercut'): ?>checked<?php endif ?>>
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
                                            <input name="slide_status" id="optionsRadios1" value="1" type="radio"
                                                   <?php if ($slide['slide_status'] == 1): ?>checked<?php endif ?>>
                                            Активный
                                        </label>
                                        <br>
                                        <label>
                                            <input name="slide_status" id="optionsRadios2" value="0" type="radio"
                                                   <?php if ($slide['slide_status'] == 0): ?>checked<?php endif ?>>
                                            Не активный
                                        </label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary" value="Y">Сохранить
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
