<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Статьи блога
      <!-- <small>advanced tables</small> -->
    </h1>
    <a class="breadcrumb add" href="/admin/posts/create_post">Добавить статью</a>
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
                        <th>Дата</th>
                        <th>Категория</th>
                        <th>Наименование</th>
                        <th>Фото</th>
                        <th>Статус</th>
                        <th>Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($posts as $item):?>
                      <tr>
                        <td class="center operations"><?php echo $i++;?></td>
                        <td class="center"><?php echo date('d-m-Y',$item['blog_post_date']);?></td>
                        <td class="center"><?php echo $item['blog_cat_name'];?></td>
                        <td class="center"><?php echo $item['blog_post_title'];?></td>
                        <td class="center"><img class="img-thumbnail" src="<?php echo $item['blog_post_img'];?>" alt="<?php echo $item['blog_post_title'];?>" width="200"></td>
                        <td class="center"><?php echo $item['blog_post_status']?'активна':'неактивна';?></td>
                        <td class="center operations">
                          <a href="/admin/posts/edit_post/<?php echo $item['blog_post_id'];?>" title="Редактировать статью">
                            <i class="fa fa-edit fa-2x"></i>
                          </a>
                          <a href="/admin/posts/delete_post/<?php echo $item['blog_post_id'];?>"  onclick="return confirm('Вы точно хотите удалить статью?');"title="Удалить статью">
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
                        <th>Категория</th>
                        <th>Наименование</th>
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

