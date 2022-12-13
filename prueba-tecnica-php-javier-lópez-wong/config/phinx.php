<?php

require __DIR__.'/../tests/bootstraptest.php';

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/../db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/../db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'default',
        'default' => [
            'adapter' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASS'],
            'port' => '3306',
            'charset' => 'utf8mb4',
        ],
    ],
    'version_order' => 'creation'
];
