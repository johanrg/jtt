<?php

namespace API\Rpc;

use API\Library\AuthenticationProviderInterface;
use API\Library\RestfulAuthenticationController;
use API\Library\RestResponseInterface;
use DbJtt\Repository\UserRepository;

class AuthenticateRpc extends RestfulAuthenticationController
{
  /** @var UserRepository */
  private $userRepository;

  public function __construct(
    AuthenticationProviderInterface $authentication,
    RestResponseInterface $restResponse,
    UserRepository $userRepository)
  {
    parent::__construct($authentication, $restResponse);
    $this->userRepository = $userRepository;
  }

  public function authenticateAction()
  {
    $username = $this->params()->fromQuery('username');
    $password = $this->params()->fromQuery('password');

    if ($this->userRepository->verifyCredentials($username, $password) !== null) {
      $payload = [
        'isAdmin' => true,
        'exp' => time() + 43200 // 12 Hours before expire
      ];

      $token = $this->authentication->encode($payload);
      return $this->restResponse->createResponse(200, '', ['token' => $token]);
    } else {
      return $this->restResponse->createResponse(401);
    }
  }
}