<?php

namespace API\Library;

use PHPUnit\Runner\Exception;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;
use Zend\Http\PhpEnvironment\Request;
use Zend\Http\PhpEnvironment\Response;

class RestfulAuthenticationController extends AbstractRestfulController implements EventManagerAwareInterface
{
  /** @var  AuthenticationProviderInterface */
  protected $authentication;
  /** @var RestResponseInterface */
  protected $restResponse;
  /** @var string */
  protected $token;
  /** @var object */
  protected $payload;

  public function __construct(AuthenticationProviderInterface $authentication, RestResponseInterface $restResponse)
  {
    $this->authentication = $authentication;
    $this->restResponse = $restResponse;
  }

  public function setEventManager(EventManagerInterface $eventManager)
  {
    parent::setEventManager($eventManager);
    $eventManager->attach('dispatch', [$this, 'checkAuthorization'], 10);
  }

  /**
   * Check if the Rest class requires authentication. If it does, fetch and decode the JWT, if that fails break out
   * of the controller with a status code.
   * Note: If authorization fails the method will halt the Rest controller from continuing.
   *
   * @param \Zend\Mvc\MvcEvent $event
   * @return \Zend\Http\PhpEnvironment\Response
   */
  public function checkAuthorization(MvcEvent $event): ?Response
  {
    if (!$event->getRouteMatch()->getParam('authorization_required')) {
      return null;
    }

    /** @var Request $request */
    $request = $event->getRequest();
    /** @var Response $response */
    $response = $event->getResponse();

    $token = $this->authentication->extract($request);
    if ($token) {
      $this->token = $token;
      try {
        $this->payload = $this->authentication->decode($token);
        return null;
      } catch (Exception $e) {
        $statusCode = 400;
      }
    } else {
      $statusCode = 401;
    }

    // Authentication failed, we need to set status code here or Zend will not break out from the Rest Controller.
    $response->setStatusCode($statusCode);
    $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
    $view = $this->restResponse->createResponse($statusCode);
    $response->setContent($view->serialize());
    return $response;
  }

  /**
   * Create a new resource
   *
   * @param  mixed $data
   * @return |Zend\View\Model\JsonModel
   */
  public function create($data): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Delete an existing resource
   *
   * @param  mixed $id
   * @return |Zend\View\Model\JsonModel
   */
  public function delete($id): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Delete the entire resource collection
   *
   * Not marked as abstract, as that would introduce a BC break
   * (introduced in 2.1.0); instead, raises an exception if not implemented.
   *
   * @param mixed $data
   * @return |Zend\View\Model\JsonModel
   */
  public function deleteList($data): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Return single resource
   *
   * @param  mixed $id
   * @return |Zend\View\Model\JsonModel
   */
  public function get($id): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Return list of resources
   *
   * @return |Zend\View\Model\JsonModel
   */
  public function getList(): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Retrieve HEAD metadata for the resource
   *
   * Not marked as abstract, as that would introduce a BC break
   * (introduced in 2.1.0); instead, raises an exception if not implemented.
   *
   * @param  mixed $id
   * @return |Zend\View\Model\JsonModel
   */
  public function head($id = null): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Respond to the OPTIONS method
   *
   * Typically, set the Allow header with allowed HTTP methods, and
   * return the response.
   *
   * Not marked as abstract, as that would introduce a BC break
   * (introduced in 2.1.0); instead, raises an exception if not implemented.
   *
   * @return |Zend\View\Model\JsonModel
   */
  public function options(): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Respond to the PATCH method
   *
   * Not marked as abstract, as that would introduce a BC break
   * (introduced in 2.1.0); instead, raises an exception if not implemented.
   *
   * @param  $id
   * @param  $data
   * @return |Zend\View\Model\JsonModel
   */
  public function patch($id, $data): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Replace an entire resource collection
   *
   * Not marked as abstract, as that would introduce a BC break
   * (introduced in 2.1.0); instead, raises an exception if not implemented.
   *
   * @param  mixed $data
   * @return |Zend\View\Model\JsonModel
   */
  public function replaceList($data): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Modify a resource collection without completely replacing it
   *
   * Not marked as abstract, as that would introduce a BC break
   * (introduced in 2.2.0); instead, raises an exception if not implemented.
   *
   * @param  mixed $data
   * @return |Zend\View\Model\JsonModel
   */
  public function patchList($data): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Update an existing resource
   *
   * @param  mixed $id
   * @param  mixed $data
   * @return |Zend\View\Model\JsonModel
   */
  public function update($id, $data): JsonModel
  {
    return $this->restResponse->createResponse(405);
  }

  /**
   * Basic functionality for when a page is not available
   *
   * @return |Zend\View\Model\JsonModel
   */
  public function notFoundAction(): JsonModel
  {
    return $this->restResponse->createResponse(404);
  }
}
