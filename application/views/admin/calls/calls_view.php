      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="float:left;">
            Заказы звонков
            <!-- <small>advanced tables</small> -->
          </h1>
          <div class="btn-group"  style="float:right; margin-bottom: 10px;">
            <button type="button" class="btn btn-default" onclick="location.href='/admin/calls'">Все</button>
            <button type="button" class="btn btn-default" onclick="location.href='/admin/calls/unfinished'">Необработанные</button>
            <button type="button" class="btn btn-default" onclick="location.href='/admin/calls/finished'">Обработанные</button>           
            <button type="button" class="btn btn-default" onclick="location.href='/admin/calls/expired'">Просроченные</button>                                         
          </div>         
<!--           <ul class="calls_mode">
            <li><a class="add" href="#">Все</a></li>
            <li><a class="add" href="#">Не обработанные</a></li>   
            <li><a class="add" href="#">Обработанные</a></li>
            <li><a class="add" href="#">Просроченные</a></li>            
          </ul> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title"><?php echo $title;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Дата</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Сообщение</th>
                        <th>Заметки</th>                        
                        <th>Статус</th>
                        <th colspan="2">Операции</th>                                        
                      </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($calls as $item):?>
                          <tr <?php if($item['call_status'] == 1):?>
                                class="processed"
                              <?php elseif($item['call_date'] < time()-86400):?>                                  
                                  class="expired"
                                <?php else:?>                                  
                                  class="not_processed"
                              <?php endif;?>>
  	                        <td class="center status"><?php echo date('H:i d-m-Y',$item['call_date']);?></td>
  	                        <td class="center status"><?php echo $item['call_name'];?></td>
  	                        <td class="center status"><?php echo $item['call_tel'];?></td>
                            <td class="messages"><?php echo $item['call_message'];?></td>
                            <td class="messages"><?php echo word_limiter($item['call_notes'],4);?></td>                            
                            <td class="center status"><?php echo $item['call_status']?'обработано':'необработано';?></td>
                          <td class="center operations">
                            <a href="/admin/calls/edit_call/<?php echo $item['call_id'];?>" title="Обработать звонок">
                              <i class="fa fa-edit fa-2x"></i>
                            </a> 
                          </td>
                          <td class="center operations">                        
                            <a href="/admin/calls/delete_call/<?php echo $item['call_id'];?>" onclick="return confirm('Вы точно хотите удалить звонок?');" title="Удалить звонок">
                              <i class="fa fa-close fa-2x"></i>
                            </a> 
                          </td>
	                      </tr> 
                  		<?php endforeach;?>
                    </tbody>
                  </table>
                  <?php echo $this->pagination->create_links();?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
