<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Наша команда
      <!-- <small>advanced tables</small> -->
    </h1>
    <a class="breadcrumb add" href="/admin/team/create_team">Добавить запись</a>
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
                        <th>Должность</th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Статус</th>
                        <th>Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($team as $item):?>
                      <tr>
                        <td class="center operations"><?php echo $i++;?></td>
                        <td class="center"><?php echo $item['team_name'];?></td>
                        <td class="center"><?php echo $item['team_position'];?></td>
                        <td><?php echo character_limiter($item['team_desc'],50);?></td>
                        <td class="center"><img class="img-thumbnail" src="<?php echo $item['team_img'];?>" alt="<?php echo $item['team_name'];?>" width="200"></td>
                        <td class="center"><?php echo $item['team_status']?'активно':'неактивно';?></td>
                        <td class="center operations">
                          <a href="/admin/team/edit_team/<?php echo $item['team_id'];?>" title="Редактировать запись">
                            <i class="fa fa-edit fa-2x"></i>
                          </a>
                          <a href="/admin/team/delete_team/<?php echo $item['team_id'];?>"  onclick="return confirm('Вы точно хотите удалить запись?');"title="Удалить запись">
                            <i class="fa fa-close fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>№</th>
                        <th>Дата</th>
                        <th>Наименование</th>
                        <th>Описание</th>
                        <th>Фото</th>
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

