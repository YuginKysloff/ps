      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="float:left;">
            Статистика
            <!-- <small>advanced tables</small> -->
          </h1>
<!--           <div class="btn-group"  style="float:right; margin-bottom: 10px;">
            <button type="button" class="btn btn-default" onclick="location.href='/admin/statistics'">Все</button>
            <button type="button" class="btn btn-default" onclick="location.href='/admin/statistics/day'">За день</button>
            <button type="button" class="btn btn-default" onclick="location.href='/admin/statistics/week'">За неделю</button>           
            <button type="button" class="btn btn-default" onclick="location.href='/admin/statistics/month'">За месяц</button>                                         
          </div>    -->      
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
<section class="content">
          <div class="row">
            <div class="col-md-6">
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">График посещения сайта</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas height="235" width="596" id="areaChart" style="height: 235px; width: 596px;"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Посещенные страницы</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Наименование</th>
                        <th class="operations">Посещений</th>                                   
                      </tr>
                    </thead>
                    <tbody>
                       <?php foreach ($stat['pages'] as $item):?>
                          <tr>
                            <td class=""><?php echo $item['page_url'];?></td>
                            <td class="center status"><?php echo $item['page_count'];?></td>
                        </tr> 
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">


              <!-- DONUT CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Браузеры посетителей</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                	<div class="row">
                		<div class="col-md-9">
                    		<canvas height="308" width="616" id="pieChart" style="height: 308px; width: 616px;"></canvas>
                    	</div>
                    	<div class="col-md-3">
						<ul class="chart-legend clearfix">
	                        <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
	                        <!-- <li><i class="fa fa-circle-o text-green"></i> IE</li> -->
	                        <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
	                        <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
	                        <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
	                        <li><i class="fa fa-circle-o text-gray"></i> IE</li>
                      	</ul>
                    	</div>
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Источники переходов</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Наименование</th>
                        <th class="operations">Переходов</th>                                   
                      </tr>
                    </thead>
                    <tbody>
                       <?php foreach ($stat['refs'] as $item):?>
                          <tr>
                            <td class="">
                              <?php
                                $str = preg_replace('/xn--37-6kcaj1b8agssx1a2j.xn--p1ai/si', 'автофранция37.рф', urldecode($item['ref_url']));
                                  if(strlen($str) > 100)
                                  {
                                    echo substr($str, 0, 90).'...';
                                  }
                                  else
                                  {
                                    echo $str;
                                  }
                              ?>
                            </td>
                            <td class="center status"><?php echo $item['ref_count'];?></td>
                        </tr> 
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col (RIGHT) -->
          </div><!-- /.row -->

        </section>

            </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
