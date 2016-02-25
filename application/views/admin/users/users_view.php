<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Пользователи
      <!-- <small>advanced tables</small> -->
    </h1>
    <a class="breadcrumb add" href="/admin/users/create_user">Добавить пользователя</a>
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
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
                        <th>Статус</th>
                        <th>Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($users as $item):?>
                      <tr>
                        <td class="center operations"><?php echo $i++;?></td>
                        <td class="center"><a href="#"><?php echo $item['user_name'];?></a></td>
                        <td class="center"><?php echo $item['user_phone'];?></td>
                        <td class="center"><a href="mailto:<?php echo $item['user_email'];?>"><?php echo $item['user_email'];?></a></td>
                        <td class="center operations"><?php echo $item['user_status']?'Администратор':'Пользователь';?></td>
                        <td class="center operations">
                          <a href="/admin/users/edit_user/<?php echo $item['user_id'];?>" title="Редактировать пользователя">
                            <i class="fa fa-edit fa-2x"></i>
                          </a>
                          <a href="/admin/users/delete_user/<?php echo $item['user_id'];?>" onclick="return confirm('Вы точно хотите удалить пользователя?');" title="Удалить пользователя">
                            <i class="fa fa-close fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
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

