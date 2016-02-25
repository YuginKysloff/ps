<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Каталог щенков
      <!-- <small>advanced tables</small> -->
    </h1>
    <a class="breadcrumb add" href="/admin/pets/create_pet">Добавить щенка</a>
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
                        <th>Пол</th>
                        <th>Возраст</th>
                        <th>Порода</th>
                        <th>Фото</th>
                        <th>Цена</th>
                        <th>Статус</th>
                        <th>Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($pets as $item):?>
                      <tr>
                        <td class="center operations"><?php echo $i++;?></td>
                        <td class="center"><?php echo $item['pet_name'];?></td>
                        <td class="center"><?php echo $item['pet_gender']?'м':'ж';?></td>
                        <td class="center"><?php echo round((time() - $item['pet_birthday'])/604800, 1);?> нед</td>
                        <td class="center"><?php echo $item['pet_breed'];?></td>
                        <td class="center"><img class="img-thumbnail" src="<?php echo $item['pet_img'];?>" alt="<?php echo $item['pet_name'];?>" width="200"></td>
                        <td class="center"><?php echo $item['pet_price'];?></td>
                        <td class="center"><?php echo $item['pet_status']?'в наличии':'резерв';?></td>
                        <td class="center operations">
                          <a href="/admin/pets/edit_pet/<?php echo $item['pet_id'];?>" title="Редактировать щенка">
                            <i class="fa fa-edit fa-2x"></i>
                          </a>
                          <a href="/admin/pets/delete_pet/<?php echo $item['pet_id'];?>"  onclick="return confirm('Вы точно хотите удалить щенка?');"title="Удалить щенка">
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
                        <th>Пол</th>
                        <th>Возраст</th>
                        <th>Порода</th>
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

