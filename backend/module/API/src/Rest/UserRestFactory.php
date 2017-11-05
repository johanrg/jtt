<?php

namespace API\Rest;

use API\Library\JsonResponse;
use API\Library\JsonWebToken;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class UserRestFactory implements FactoryInterface
{
  public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
  {
    $authentication = new JsonWebToken($container->get('config'));
    $jsonResponse = new JsonResponse();
    return new UserRest($authentication, $jsonResponse);
  }
}
