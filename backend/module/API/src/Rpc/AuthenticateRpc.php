<?php

namespace API\Rpc;

use API\Library\RestfulAuthenticationController;

class AuthenticateRpc extends RestfulAuthenticationController
{
  public function authenticateAction()
  {
    $username = $this->params()->fromQuery('username');
    $password = $this->params()->fromQuery('password');
    $payload = [
      'isAdmin' => true,
      'exp' => time() + 43200 // 12 Hours before expire
    ];

    $token = $this->authentication->encode($payload);
    return $this->restResponse->createResponse(200, '', ['token' => $token]);
  }
}