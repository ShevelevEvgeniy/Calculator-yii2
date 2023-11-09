<?php

namespace app\commands;

use yii\console\Controller;

class ProcessController extends Controller
{

    public function actionQueueResults(){
        $counter = 0;
        $basePath = __DIR__ . '/../runtime/queue.job';
        while (true)
        {
            echo 'Текущая итерация: ' . $counter . PHP_EOL;

            if (file_exists($basePath) === true)
            {
                $data = file_get_contents($basePath);
                echo $data . PHP_EOL;
                unlink($basePath);
            }

            sleep(2);
            $counter++;
        }
    }

}