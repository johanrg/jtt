<?php

namespace DbJtt\Entity;

use Zend\Db\Sql\Ddl\Column\Date;

class User extends Entity
{
  /** @var null|int */
  private $userTypeId;
  /** @var null|int */
  private $enabled;
  /** @var null|string */
  private $name;
  /** @var null|string */
  private $password;
  /** @var null|string */
  private $email;
  /** @var null|string */
  private $permissions;
  /** @var null|int */
  private $stamped;
  /** @var null|Date */
  private $created;

  public function exchangeArray(array $data)
  {
    parent::exchangeArray($data);
    $this->userTypeId = !empty($data['userTypeId']) ? $data['userTypeId'] : null;
    $this->enabled = !empty($data['enabled']) ? $data['enabled'] : null;
    $this->name = !empty($data['name']) ? $data['name'] : null;
    $this->password = !empty($data['password']) ? $data['password'] : null;
    $this->email = !empty($data['email']) ? $data['email'] : null;
    $this->permissions = !empty($data['permissions']) ? $data['permissions'] : null;
    $this->stamped = !empty($data['stamped']) ? $data['stamped'] : null;
    $this->created = !empty($data['created']) ? $data['created'] : null;
  }

  /**
   * @return null|int
   */
  public function getUserTypeId(): ?int
  {
    return $this->userTypeId;
  }

  /**
   * @param int $userTypeId
   */
  public function setUserTypeId(int $userTypeId)
  {
    $this->userTypeId = $userTypeId;
  }

  /**
   * @return null|bool
   */
  public function getEnabled(): ?bool
  {
    return $this->enabled;
  }

  /**
   * @param bool $enabled
   */
  public function setEnabled(bool $enabled)
  {
    $this->enabled = $enabled;
  }

  /**
   * @return null|string
   */
  public function getName(): ?string
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name)
  {
    $this->name = $name;
  }

  /**
   * @return null|string
   */
  public function getPassword(): ?string
  {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword(string $password)
  {
    $this->password = $password;
  }

  /**
   * @return null|string
   */
  public function getEmail(): ?string
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail(string $email)
  {
    $this->email = $email;
  }

  /**
   * @return null|string
   */
  public function getPermissions()
  {
    return $this->permissions;
  }

  /**
   * @param string $permissions
   */
  public function setPermissions(string $permissions)
  {
    $this->permissions = $permissions;
  }

  /**
   * @return null|int
   */
  public function getStamped(): ?int
  {
    return $this->stamped;
  }

  /**
   * @param null|int $stamped
   */
  public function setStamped($stamped)
  {
    $this->stamped = $stamped;
  }

  /**
   * @return null|Date
   */
  public function getCreated(): ?Date
  {
    return $this->created;
  }

  /**
   * @param Date $created
   */
  public function setCreated(Date $created)
  {
    $this->created = $created;
  }


}