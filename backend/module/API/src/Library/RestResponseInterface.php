<?php


namespace API\Library;

use Zend\View\Model\JsonModel;

interface RestResponseInterface
{
  public function createResponse(int $httpStatusCode, string $detail = '', array $result = []): JsonModel;
}

