<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Каталог щенков
        </h1>
        <a class="breadcrumb add" href="/admin/dogs/create_dog">Добавить собаку</a>

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
                                <th>Статус</th>
                                <th>Операции</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($dogs as $item): ?>
                                <tr>
                                    <td class="center operations"><?php echo $i++; ?></td>
                                    <td class="center"><?php echo $item['dog_name']; ?></td>
                                    <td class="center"><?php echo $item['dog_gender'] ? 'м' : 'ж'; ?></td>
                                    <td class="center"><?php echo round((time() - $item['dog_birthday']) / 604800, 1); ?>
                                        нед
                                    </td>
                                    <td class="center"><?php echo $item['dog_breed']; ?></td>
                                    <td class="center"><img class="img-thumbnail" src="<?php echo $item['dog_img']; ?>"
                                                            alt="<?php echo $item['dog_name']; ?>" width="200"></td>
                                    <td class="center"><?php echo $item['dog_status'] ? 'в наличии' : 'резерв'; ?></td>
                                    <td class="center operations">
                                        <a href="/admin/dogs/edit_dog/<?php echo $item['dog_id']; ?>"
                                           title="Редактировать щенка">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <a href="/admin/dogs/delete_dog/<?php echo $item['dog_id']; ?>"
                                           onclick="return confirm('Вы точно хотите удалить строку?');"
                                           title="Удалить строку">
                                            <i class="fa fa-close fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>№</th>
                                <th>Имя</th>
                                <th>Пол</th>
                                <th>Возраст</th>
                                <th>Порода</th>
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

