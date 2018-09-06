<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
  'doctrine' => [
      'connection' => [
            'orm_default' => [
                'doctrine_type_mappings' => ['enum' => 'string'],
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'user'     => 'root',
                    'password' => 'password',
                    'dbname' => 'zendapi',
                    'driverOptions' => [
                        1002 => 'SET NAMES utf8'
                    ]
                ]
            ],
           'driver' => [
               'my_annotation_driver' => [
                 'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                    'cache' => 'array',
                    'paths' => [
                        __DIR__ . '/../../module/Application/src/Entity',
                    ],
                ],
                'orm_default' => [
                    'drivers' => [
                         // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                         __NAMESPACE__ . '\Entity' => 'my_annotation_driver'
                    ]
                ]
            ],
        ],
    ],
];
