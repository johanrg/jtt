<?php

namespace Library;

use API\Library\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
  public function test_with_404()
  {
    $jsonRespone = new JsonResponse();
    $result = $jsonRespone->createResponse(404)->serialize();
    $this->assertEquals('{"status":404,"title":"Not Found","detail":"","result":[]}', $result);
  }

  public function test_with_200_and_data()
  {
    $jsonResponse = new JsonResponse();
    $result = $jsonResponse->createResponse(200, '', ['exp' => 123456])->serialize();
    $this->assertEquals('{"status":200,"title":"OK","detail":"","result":{"exp":123456}}', $result);
  }

  public function test_with_500_and_error_message()
  {
    $jsonResponse = new JsonResponse();
    $result = $jsonResponse->createResponse(500, 'This is an error')->serialize();
    $this->assertEquals('{"status":500,"title":"Internal Server Error","detail":"This is an error","result":[]}', $result);
  }
}