<?php

namespace Entity;

use DbJtt\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
  public function test_user_entity_is_correctly_initialized()
  {
    $user = new User();
    $this->assertInstanceOf(User::class, $user);

    $this->assertNull($user->getId(), '"id" should initially be null');
    $this->assertNull($user->getUserTypeId(), '"userTypeid" should initially be null');
    $this->assertNull($user->getEnabled(), '"enabled" should initially be null');
    $this->assertNull($user->getname(), '"name" should initially be null');
    $this->assertNull($user->getPassword(), '"password" should initially be null');
    $this->assertNull($user->getEmail(), '"email" should initially be null');
    $this->assertNull($user->getPermissions(), '"permissions" should initially be null');
    $this->assertNull($user->getStamped(), '"stamped" should initially be null');
    $this->assertNull($user->getCreated(), '"created" should initially be null');
  }

  public function test_exchange_array_sets_properties_correctly()
  {
    $user = new User();
    $data = [
      'id' => 11,
      'userTypeId' => 1,
      'enabled' => 1,
      'name' => 'test',
      'password' => 'password',
      'email' => 'a@b.c',
      'permissions' => '{}',
      'stamped' => 1234,
      'created' => '2017-01-01'
    ];

    $user->exchangeArray($data);

    $this->assertSame($data['id'], $user->getId(), '"id" was not set correctly');
    $this->assertSame($data['userTypeId'], $user->getUserTypeId(), '"UserTypeId" was not set correctly');
    $this->assertSame($data['enabled'], $user->getEnabled(), '"enabled" was not set correctly');
    $this->assertSame($data['name'], $user->getName(), '"name" was not set correctly');
    $this->assertSame($data['password'], $user->getPassword(), '"password" was not set correctly');
    $this->assertSame($data['email'], $user->getEmail(), '"email" was not set correctly');
    $this->assertSame($data['permissions'], $user->getPermissions(), '"permissions" was not set correctly');
    $this->assertSame($data['stamped'], $user->getStamped(), '"stamped" was not set correctly');
    $this->assertSame($data['created'], $user->getCreated(), '"created" was not set correctly');
  }
}