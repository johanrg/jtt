<?php

namespace DbJtt;

use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface
{
  public function getServiceConfig()
  {
    return include __DIR__ . '/../config/module.config.php';
  }
}