<?php

namespace DbJtt;

use DbJtt\Repository\UserRepository;
use DbJtt\Repository\UserRepositoryFactory;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterServiceFactory;

return [
  'factories' => [
    UserRepository::class => UserRepositoryFactory::class,
    Adapter::class => AdapterServiceFactory::class,
  ],
];