<?php

namespace API\Rpc;

use DbJtt\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;

class AuthenticateRpcFactoryTest extends TestCase
{
  public function test_can_create_authentication_rpc()
  {
    $config = [];
    $mockUserRepository = $this->createMock(UserRepository::class);

    $mockServiceManager = $this->createMock(ServiceManager::class);
    $mockServiceManager
      ->method('get')
      ->withConsecutive(['config'], [UserRepository::class])
      ->willReturnOnConsecutiveCalls($config, $mockUserRepository);

    $factory = new AuthenticateRpcFactory();
    $authenticateRpc = $factory($mockServiceManager, AuthenticateRpc::class);
    $this->assertInstanceOf(AuthenticateRpc::class, $authenticateRpc);
  }
}