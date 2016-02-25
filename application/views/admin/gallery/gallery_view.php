<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Галерея фото для оформления статей блога
      <!-- <small>advanced tables</small> -->
    </h1>
    <a class="breadcrumb add" href="/admin/gallery/create_img">Добавить фото</a>
    <!--           <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
              </ol> -->
  </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>Ссылка</th>
                        <th>Фото</th>
                        <th>Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($gallery as $item):?>
                      <tr>
                        <td class="center operations"><?php echo $i++;?></td>
                        <td class="center"><?php echo $item['gal_name'];?></td>
                        <td class="center"><?php echo $item['gal_img'];?></td>
                        <td class="center"><img class="img-thumbnail" src="<?php echo $item['gal_img'];?>" alt="<?php echo $item['gal_name'];?>" width="200"></td>
                        <td class="center operations">
                          <a href="/admin/gallery/edit_img/<?php echo $item['gal_id'];?>" title="Редактировать фото">
                            <i class="fa fa-edit fa-2x"></i>
                          </a>
                          <a href="/admin/gallery/delete_img/<?php echo $item['gal_id'];?>"  onclick="return confirm('Вы точно хотите удалить фото?');"title="Удалить фото">
                            <i class="fa fa-close fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>Ссылка</th>
                        <th>Фото</th>
                        <th>Операции</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

