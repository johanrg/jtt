<?php

namespace API\Rpc;

use API\Library\JsonResponse;
use API\Library\JsonWebToken;
use DbJtt\Repository\UserRepository;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthenticateRpcFactory implements FactoryInterface
{
  public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
  {
    $authentication = new JsonWebToken($container->get('config'));
    $userRepository = $container->get(UserRepository::class);
    $jsonResponse = new JsonResponse();
    return new AuthenticateRpc($authentication, $jsonResponse, $userRepository);
  }
}