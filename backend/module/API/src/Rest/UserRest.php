<?php

namespace API\Rest;

use Zend\View\Model\JsonModel;

class UserRest extends RestfulAuthenticationController
{
  public function get($id): JsonModel
  {
    $data = [
      'exp' => time() + 50000
    ];

    return $this->restResponse->createResponse(200, '', $data);
  }
}
