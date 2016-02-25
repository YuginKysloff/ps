      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Слайды
            <!-- <small>advanced tables</small> -->
          </h1>
          <a class="breadcrumb add" href="/admin/slides/create_slide">Добавить слайд</a>
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
<!--                 <div class="box-header">
                  <h3 class="box-title">Таблица услуг</h3>
                </div> --><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Режим</th>
                        <th>Статус</th>
                        <th colspan="2">Операции</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($slides as $item):?>
                          <tr>
	                        <td class="center"><?php echo $item['slide_id'];?></td>
	                        <td><?php echo $item['slide_name'];?></td>
	                        <td><?php echo substr($item['slide_desc'],0,200).'...';?></td>
	                        <td class="center"><img class="img-thumbnail" src="<?php echo $item['slide_url'];?>" alt="<?php echo $item['slide_name'];?>" width="200"></td>
                            <td class="center"><?php echo $item['slide_mode'];?></td>
                            <td class="center"><?php echo $item['slide_status']?'активен':'неактивен';?></td>
                          <td class="center operations">
                            <a href="/admin/slides/edit_slide/<?php echo $item['slide_id'];?>" title="Редактировать слайд">
                              <i class="fa fa-edit fa-2x"></i>
                            </a> 
                          </td>
                          <td class="center operations">                        
                            <a href="/admin/slides/delete_slide/<?php echo $item['slide_id'];?>"  onclick="return confirm('Вы точно хотите удалить слайд?');"title="Удалить слайд">
                              <i class="fa fa-close fa-2x"></i>
                            </a> 
                          </td>
	                      </tr> 
                  		<?php endforeach;?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
