<?php

namespace API\Rpc;

use API\Library\RestfulAuthenticationController;

class AuthenticateRpc extends RestfulAuthenticationController
{
  public function authenticateAction()
  {
    return $this->restResponse->createResponse(200, '', ['result' => true]);
  }
}