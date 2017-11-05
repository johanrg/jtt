<?php

namespace API\Library;

use Zend\View\Model\JsonModel;

class JsonResponse implements RestResponseInterface
{
  /**
   * Create a Json response message to send back to the frontend.
   *
   * @param int $httpStatusCode   Regular http status codes
   * @param string $detail        Error message or w/e to send back
   * @param array $result         The data to send back to the frontend.
   * @return JsonModel
   */
  public function createResponse(int $httpStatusCode, string $detail = '', array $result = []): JsonModel
  {
    $response = [
      'status' => $httpStatusCode,
      'title' => $this->httpStatusCodeDescription($httpStatusCode),
      'detail' => $detail,
      'result' => $result
    ];
    return new JsonModel($response);
  }

  /**
   * Returns the description of the supplied http status code.
   *
   * @param int $httpStatusCode
   * @return string
   */
  public function httpStatusCodeDescription(int $httpStatusCode): string
  {
    switch ($httpStatusCode) {
      case 200:
        return 'OK';
      case 201:
        return 'Created';
      case 202:
        return 'Accepted';
      case 203:
        return 'Non-Authoritative Information';
      case 204:
        return 'No Content';
      case 205:
        return 'Reset Content';
      case 206:
        return 'Partial Content';

      case 300:
        return 'Multiple Choices';
      case 301:
        return 'Moved Permanently';
      case 302:
        return 'Moved Temporarily (HTTP/1.0)';
      case 303:
        return 'See Other (HTTP/1.1)';
      case 304:
        return 'Not Modified';
      case 305:
        return 'Use Proxy';
      case 307:
        return 'Temporarily Redirect';
      case 308:
        return 'Permanent Redirect';

      case 400:
        return 'Bad Request';
      case 401:
        return 'Unauthorized';
      case 402:
        return 'Payment Required';
      case 403:
        return 'Forbidden';
      case 404:
        return 'Not Found';
      case 405:
        return 'Method Not Allowed';
      case 406:
        return 'Not Acceptable';
      case 407:
        return 'Proxy Authentication Required';
      case 408:
        return 'Request Timeout';
      case 409:
        return 'Conflict';
      case 410:
        return 'Gone';
      case 411:
        return 'Length Required';
      case 412:
        return 'Precondition Failed';
      case 413:
        return 'Payload Too Large';
      case 414:
        return 'Request-URI Too Large';
      case 415:
        return 'Unsupported Media Type';
      case 416:
        return 'Requested Range Not Satisfied';
      case 417:
        return 'Expectation Failed';

      case 500:
        return 'Internal Server Error';
      case 501:
        return 'Not Implemented';
      case 502:
        return 'Bad Gateway';
      case 503:
        return 'Service Unavailable';
      case 504:
        return 'Gateway Timeout';
      case 505:
        return 'HTTP Version Not Supported';
      case 509:
        return 'Bandwidth Limit Exceeded';

      default:
        return '';
    }
  }
}
