<?php
//Configuración de log y parámetros de conexión a base de datos
return [
  'settings' => [
    'debug' => true,
    'displayErrorDetails' => true,

    'logger' => [
      'enabled' => true,
      'name' => 'mastermindslim',
      'path' => __DIR__ . '/../logs/app.log',
      'level' => \Monolog\Logger::INFO,
    ],

    'doctrine' => [
      'meta' => [
        'entity_path' => [
          'app/src/Entity'
        ],
        'auto_generate_proxies' => true,
        'proxy_dir' =>  __DIR__.'/../cache/proxies',
        'cache' => null,
      ],
      'connection' => [
        'driver'   => 'pdo_mysql',
        'host'	 => 'localhost',
        'dbname'   => 'mastermindslim',
        'user'	 => 'mastermindslim',
        'password' => 'mastermindslim',
      ]
    ]
  ]
];