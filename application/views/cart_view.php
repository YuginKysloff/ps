<div id="content">
    <section id="team" class="updatable">

        <!-- begin Team -->
        <article class="cart-article">
            <div class="container">
                <!--                <header><h2>Наша команда</h2></header>-->

                <div class="row">
                    <div class="title cart-title">
                        <div class="centered">
                            <div><h2>Корзина</h2></div>
                        </div>
                        <!--                        <p>Бла бла бла ...</p>-->
                        <!--                        <hr>-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="shopping-cart-table">
                            <div class="table-resposive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Фото</th>
                                        <th>Наименование</th>
                                        <th>Цена</th>
                                    </tr>
                                    </thead>
                                    <? $sum = 0;
                                    foreach ($basket as $item): ?>
                                        <tbody>
                                        <tr>
                                            <td class="remove-btn">
                                                <a href="/pets/delete_from_basket/<?= $item['pet_id']; ?>"
                                                   onclick="return confirm('Вы точно хотите удалить строку?');"
                                                   title="Удалить строку">
                                                    <i class="icon-cancel-circled cart-del"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/pets/<?= $item['pet_slug']; ?>">
                                                    <img class="img-thumbnail" src="<?= $item['pet_img']; ?>"
                                                         alt="<?= $item['pet_name']; ?>">
                                                </a>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="/pets/<?= $item['pet_slug']; ?>">
                                                            <h3><?= $item['pet_name']; ?></h3></a>
                                                    </li>
                                                    <li>
                                                        <p><strong>Порода: </strong><?= $item['pet_breed']; ?></p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <strong>Возраст: </strong><?php echo round((time() - $item['pet_birthday']) / 604800, 1); ?>
                                                            нед</p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <strong>Пол: </strong><?php echo $item['pet_gender'] ? 'мужской' : 'женский'; ?>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="price-cell">
                                                <strong><?= $item['pet_price']; ?></strong> руб.
                                            </td>
                                        </tr>
                                        </tbody>
                                        <? $sum = $sum + $item['pet_price']; endforeach; ?>
                                    <tfoot>
                                    <tr>
                                        <td class="remove-btn">
                                            <a href="/pets" title="Продолжить выбор">
                                                <i class="icon-left-circled cart-del"></i>
                                            </a>
                                        </td>
                                        <td></td>
                                        <td class="total-cell">
                                            <strong>Общая сумма заказа:</strong>
                                        </td>
                                        <td class="total-cell">
                                            <strong><?= $sum; ?></strong> руб.
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <hr>
                                <a class="btn btn-success pull-right order-btn" href="#">Оформить заказ</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </article>


        <!-- end Team -->
    </section>
</div>
