<?php

namespace DbJtt;

use Zend\Db\Adapter\Adapter;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface
{
  public function getServiceConfig()
  {
    return [
      'aliases' => [
        'db_adapter' => Adapter::class
      ]
    ];
  }
}