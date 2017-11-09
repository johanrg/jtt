<?php

namespace DbJtt\Repository;


use DbJtt\Entity\User;
use PHPUnit\Framework\TestCase;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class UserRepositoryTest extends TestCase
{
  private $userRepository;
  private $resultSet;

  public function setUp()
  {
    $data = ['id' => 1];
    $this->resultSet = new ResultSet();
    $this->resultSet->setArrayObjectPrototype(new User());
    $this->resultSet->initialize($data);

    $mockTableGateWay = $this->getMockBuilder(TableGateway::class)
      ->disableOriginalConstructor()
      ->getMock();

    $mockTableGateWay
      ->expects($this->once())
      ->method('select')
      ->with()
      ->will($this->returnValue($this->resultSet));

    $this->userRepository = new UserRepository($mockTableGateWay);
  }

  public function test_verify_credentials()
  {
    $result = $this->userRepository->verifyCredentials('', '');
    $this->assertEquals($this->resultSet, $result);
  }
}