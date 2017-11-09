<?php

namespace DbJtt\Entity;

class User extends AbstractEntity
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
  /** @var null|string */
  private $created;

  /**
   * @param array|\Zend\Stdlib\ArrayObject $data
   * @return array
   */
  public function exchangeArray($data)
  {
    $storage = $this->storage;
    parent::exchangeArray($data);

    $this->userTypeId = !empty($this->storage['userTypeId']) ? $this->storage['userTypeId'] : null;
    $this->enabled = !empty($this->storage['enabled']) ? $this->storage['enabled'] : null;
    $this->name = !empty($this->storage['name']) ? $this->storage['name'] : null;
    $this->password = !empty($this->storage['password']) ? $this->storage['password'] : null;
    $this->email = !empty($this->storage['email']) ? $this->storage['email'] : null;
    $this->permissions = !empty($this->storage['permissions']) ? $this->storage['permissions'] : null;
    $this->stamped = !empty($this->storage['stamped']) ? $this->storage['stamped'] : null;
    $this->created = !empty($this->storage['created']) ? $this->storage['created'] : null;

    return $storage;
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
   * @return null|int
   */
  public function getEnabled(): ?int
  {
    return $this->enabled;
  }

  /**
   * @param int $enabled
   */
  public function setEnabled(int $enabled)
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
   * @return null|string
   */
  public function getCreated(): ?string
  {
    return $this->created;
  }

  /**
   * @param string $created
   */
  public function setCreated(string $created)
  {
    $this->created = $created;
  }


}