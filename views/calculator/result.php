<?php

/**
 * @var app\models\CalculatorFormForApi $model
 * @var $result_price
 * @var $ListPricesByType
 */

$this->title = 'Снимок';
?>
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

                foreach ($ListPricesByType as $month => $item) {
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
        <div class="container-fluid">
            <h6 class="row pt-3 pb-2 justify-content-end">Стоимость доставки составит: <?= $result_price ?> </h6>
        </div>
    </div>