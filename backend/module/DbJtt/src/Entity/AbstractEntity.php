<?php

namespace DbJtt\Entity;

use Zend\Stdlib\ArrayObject;

abstract class AbstractEntity extends ArrayObject
{
  /** @var  int|null */
  protected $id;

  public function exchangeArray($data)
  {
    parent::exchangeArray($data);
    $this->id = !empty($this->storage['id']) ? $this->storage['id'] : null;
  }

  /**
   * @return int|null
   */
  public function getId(): ?int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id)
  {
    $this->id = $id;
  }
}