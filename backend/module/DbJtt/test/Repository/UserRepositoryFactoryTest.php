<?php

namespace DbJtt\Repository;

use PHPUnit\Framework\TestCase;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\ServiceManager;

class UserRepositoryFactoryTest extends TestCase
{
  public function test_can_create_user_repository()
  {
    $mockServiceManager = $this->createMock(ServiceManager::class);
    $mockServiceManager
      ->method('get')
      ->will($this->returnValue($this->createMock(Adapter::class)));

    $factory = new UserRepositoryFactory();
    $userRepository = $factory($mockServiceManager, UserRepository::class);
    $this->assertInstanceOf(UserRepository::class, $userRepository);
  }
}