<?php

namespace API\Library;

use Firebase\JWT\JWT;
use Zend\Db\Exception\UnexpectedValueException;
use Zend\Http\PhpEnvironment\Request;

class JsonWebToken implements AuthenticationProviderInterface
{
  /** @var array */
  private $config;

  public function __construct(array $config)
  {
    $this->config = $config;
  }

  /**
   * Extracts the JWT from the header->Authorization field.
   *
   * @param Request $request
   * @return string
   */
  public function extract(Request $request): string
  {
    $token = $request->getHeader('Authorization') ? $request->getHeaders('Authorization')->getFieldValue() : '';
    if ($token) {
      $token = trim(trim($token, 'Bearer'), ' ');
    }

    return $token;
  }

  /**
   * Encodes a Json Web Token from the supplied payload
   *
   * @param array $payload  The actual data you want to include in the JWT
   * @return string         The generated token
   */
  public function encode(array $payload): string
  {
    $cypherKey = $this->config['authentication']['cypher_key'];
    $algorithm = $this->config['authentication']['algorithm'];

    return JWT::encode($payload, $cypherKey, $algorithm);
  }

  /**
   * Decode a Json Web Token and return the payload as an object
   *
   * @param string $token   JWT Token
   * @return object         PHP object, content depends on what is included in the JWT.
   * @throws UnexpectedValueException     Provided JWT was invalid
   */
  public function decode(string $token): object
  {
    if ($token === '') {
      throw new UnexpectedValueException('Token can not be empty');
    }

    $cypherKey = $this->config['authentication']['cypher_key'];
    $algorithm = $this->config['authentication']['algorithm'];

    return JWT::decode($token, $cypherKey, [$algorithm]);
  }
}
