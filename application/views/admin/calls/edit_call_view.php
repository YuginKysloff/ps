      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Обработка звонка
            <!-- <small>advanced tables</small> -->
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-user"></i>
                  <h3 class="box-title"><?php echo $call['call_name'];?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">
                    <dt>Дата</dt>
                    <dd><?php echo date('H:i d-m-Y',$call['call_date']);?></dd>
                    <dt>Номера телефона</dt>
                    <dd><?php echo $call['call_tel'];?></dd>
                    <dt>Сообщение</dt>
                    <dd><?php echo $call['call_message'];?></dd>
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

            <div class="col-xs-12">
              <div class="box">
                <!--<div class="box-header">
                  <h3 class="box-title">О компании</h3>
                </div> --><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" accept-charset="utf-8">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Заметки по звонку</label>
                      <textarea class="form-control ckeditor" name="call_notes" rows="6" autofocus><?php echo $call['call_notes']?></textarea>
                    </div>
                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <fieldset>
                          <legend><strong>Статус звонка</strong></legend>
                          <label>
                            <input name="call_status" id="optionsRadios1" value="1" type="radio" <?php if($call['call_status'] == 1):?>checked<?php endif?>>
                            Обработанный 
                          </label>
                          <br>
                          <label>
                            <input name="call_status" id="optionsRadios2" value="0" type="radio" <?php if($call['call_status'] == 0):?>checked<?php endif?>>
                            Необработанный
                          </label>  
                        </fieldset>                      
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Y">Сохранить изменения</button>                 
                    </div>                    
                  </form>
                </div><!-- /.box-body -->
              </div>

            </div><!-- /.col -->            
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
