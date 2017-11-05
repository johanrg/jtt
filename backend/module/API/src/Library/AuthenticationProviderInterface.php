<?php

namespace API\Library;

use Zend\Http\PhpEnvironment\Request;

/**
 * Provides an interface to extract, encode and decode an authentication token.
 * @package API\Library
 */
interface AuthenticationProviderInterface
{
  /**
   * Extracts the token from the request.
   *
   * @param Request $request
   * @return string
   */
  public function extract(Request $request): string;

  /**
   * Encodes an authentication token from the supplied payload.
   *
   * @param array $payload  The actual data you want to include in the token
   * @return string         The generated token
   */
  public function encode(array $payload): string;

  /**
   * Decode an authentication token and return the payload as an object.
   *
   * @param string $token   Authentication Token
   * @return object|null    PHP object, content depends on what is included in the payload.
   */
  public function decode(string $token): ?object;
}
