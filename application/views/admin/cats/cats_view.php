<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Категории блога
      <!-- <small>advanced tables</small> -->
    </h1>
    <a class="breadcrumb add" href="/admin/cats/create_cat">Добавить категорию</a>
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
                        <th>Статус</th>
                        <th>Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($cats as $item):?>
                      <tr>
                        <td class="center operations"><?php echo $i++;?></td>
                        <td><?php echo $item['blog_cat_name'];?></td>
                        <td class="center operations"><?php echo $item['blog_cat_status']?'Активна':'Неактивна';?></td>
                        <td class="center operations">
                          <a href="/admin/cats/edit_cat/<?php echo $item['blog_cat_id'];?>" title="Редактировать категорию">
                            <i class="fa fa-edit fa-2x"></i>
                          </a>
                          <a href="/admin/cats/delete_cat/<?php echo $item['blog_cat_id'];?>"  onclick="return confirm('Вы точно хотите удалить категорию?');"title="Удалить категорию">
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

