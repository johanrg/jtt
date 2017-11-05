<?php


namespace API\Library;

use Zend\View\Model\JsonModel;

interface RestResponseInterface
{
  /**
   * Create a Json response to send back to the frontend.
   *
   * @param int     $httpStatusCode   Http Status Code.
   * @param string  $detail           Used mostly for error messages when something goes wrong.
   * @param array   $result           Contains the data, if any that should be sent to the frontend.
   * @return \Zend\View\Model\JsonModel
   */
  public function createResponse(int $httpStatusCode, string $detail = '', array $result = []): JsonModel;
}

