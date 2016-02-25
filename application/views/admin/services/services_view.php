<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Каталог услуг
      <!-- <small>advanced tables</small> -->
    </h1>
    <a class="breadcrumb add" href="/admin/services/create_service">Добавить услугу</a>
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
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Цена</th>
                        <th>Статус</th>
                        <th>Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($services as $item):?>
                      <tr>
                        <td class="center operations"><?php echo $i++;?></td>
                        <td class="center"><?php echo $item['serv_name'];?></td>
                        <td><?php echo character_limiter($item['serv_desc'],50);?></td>
                        <td class="center"><img class="img-thumbnail" src="<?php echo $item['serv_img'];?>" alt="<?php echo $item['serv_name'];?>" width="200"></td>
                        <td class="center"><?php echo $item['serv_price'];?></td>
                        <td class="center"><?php echo $item['serv_status']?'активна':'неактивна';?></td>
                        <td class="center operations">
                          <a href="/admin/services/edit_service/<?php echo $item['serv_id'];?>" title="Редактировать услугу">
                            <i class="fa fa-edit fa-2x"></i>
                          </a>
                          <a href="/admin/services/delete_service/<?php echo $item['serv_id'];?>"  onclick="return confirm('Вы точно хотите удалить услугу?');"title="Удалить услугу">
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
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Цена</th>
                        <th>Статус</th>
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

