<?php

//return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'),
//    'username' => getenv('DB_USER'),
//    'password' => getenv('DB_PASSWORD'),
//    'charset' => 'utf8',
//
//    // Schema cache options (for production environment)
//    //'enableSchemaCache' => true,
//    //'schemaCacheDuration' => 60,
//    //'schemaCache' => 'cache',
//];


return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=calculator_yii2',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',


    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];