<?php

namespace API;

use API\Rest\RouteNotFound;
use API\Rest\RouteNotFoundFactory;
use API\Rest\UserRest;
use API\Rest\UserRestFactory;
use Zend\Router\Http\Segment;

return [
  'router' => [
    'routes' => [
      '404' => [
        'type' => Segment::class,
        'options' => [
          'route' => '/:*',
          'defaults' => [
            'controller' => RouteNotFound::class,
            'action' => 'index',
          ],
        ],
        'priority' => -1000,
      ],
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
      RouteNotFound::class => RouteNotFoundFactory::class,
    ]
  ],
  'view_manager' => [
    'strategies' => [
      'ViewJsonStrategy',
    ]
  ]
];
