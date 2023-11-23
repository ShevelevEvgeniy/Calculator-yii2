<?php

/**
 * @var $model
 */
$this->title = 'Снимок';
?>
<div class="container my-5 rounded-2 shadow bg-white" id = 'table'>
    <div class="container p-3">
        <div class="container-fluid">
            <h6 class="row pt-3 pb-2">Таблица стоимости доставки для материала <?= $model->raw_type ?></h6>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="tableHeader">
                    <div class="container-fluid">

                        <div class="row justify-content-end">
                            Месяц
                        </div>

                        <div class="row">
                            Тоннаж
                        </div>

                    </div>
                </th>
                <?php
                $months = [];
                $tableRows = [];

                foreach (json_decode($model->table_data) as $month => $item) {
                    $months[] = "<th class='text-center align-middle'>  " . $month . "  </th>";
                    foreach ($item as $tonnage => $price) {
                        $tableRows['<th scope="row" class="align-middle tableTonnage">' . $tonnage . '</th>'][] =
                            '<td class="text-center"><div class="my-1 tableValue">' . $price . '</div></td>';
                    }
                }
                ?>
                <?= join('', $months) ?>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($tableRows as $tonnage => $prices): ?>
                <tr>
                    <?= $tonnage ?>
                    <?= join('', $prices) ?>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
            <div class="row">
                <h2 class="col pt-3 pb-1 text-start tableInfo">Имя: <?= $model->username ?> </h2>
                <h2 class="col pt-3 pb-1 text-end tableInfoValue">Стоимость доставки: <?= $model->price ?> </h2>
            </div>
            <h2 class="pb-1 text-start tableInfo">E-mail: <?= $model->email ?> </h2>
            <h2 class="pb-1 text-start tableInfo">дата создания: <?= $model->created_at ?></h2>
            <a href="/history/index" class="pb-1 text-start link-success tableLink">Вернуться к просмотру истории</a>
    </div>
</div>