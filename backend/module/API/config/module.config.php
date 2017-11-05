<?php

namespace API;

use API\Rest\UserRest;
use API\Rest\UserRestFactory;
use Zend\Router\Http\Segment;

return [
  'router' => [
    'routes' => [
      'user_rest' => [
        'type' => Segment::class,
        'options' => [
          'route' => '/rest/user[/:id]',
          'constraints' => [
            'id' => '[0-9]+',
          ],
          'defaults' => [
            'controller' => UserRest::class,
            'authorization_required' => false
          ],
        ],
      ]
    ]
  ],
  'controllers' => [
    'factories' => [
      UserRest::class => UserRestFactory::class,
    ]
  ],
  'view_manager' => [
    'strategies' => [
      'ViewJsonStrategy',
    ]
  ]
];
