<?php

namespace DbJtt\Repository;

use DbJtt\Entity\User;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class UserRepositoryFactory implements FactoryInterface
{
  public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
  {
    $resultSetPrototype = new ResultSet();
    $resultSetPrototype->setArrayObjectPrototype(new User());

    return new UserRepository(
      new TableGateway(
        'user',
        $container->get(Adapter::class),
        null,
        $resultSetPrototype
      )
    );
  }
}