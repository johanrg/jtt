<?php

namespace API\Rest;

use API\Library\RestfulAuthenticationController;

class RouteNotFound extends RestfulAuthenticationController
{
  public function indexAction()
  {
    $this->response->setStatusCode(404);
    return $this->restResponse->createResponse(404);
  }
}