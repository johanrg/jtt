<?php

namespace DbJtt\Repository;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Repository
{
  /** @var array */
  private $identityMap;
  /** @var TableGateway */
  private $table;

  public function __construct(TableGateway $table)
  {
    $this->table = $table;
  }

  /**
   * Fetch all results
   *
   * @return ResultSet
   */
  public function fetchAll(): ResultSet
  {
    /** @var ResultSet $resultSet */
    $resultSet = $this->table->select();
    return $resultSet;
  }

  /**
   * Fetch one by primary id
   *
   * @param int $id Primary id
   * @return array|\ArrayObject|mixed|null
   */
  public function fetch(int $id)
  {
    if (array_key_exists($id, $this->identityMap)) {
      return $this->identityMap[$id];
    }

    /** @var ResultSet $resultSet */
    $resultSet = $this->table->select(['id' => $id]);
    $row = $resultSet->current();
    $this->identityMap[$id] = $row;

    return $row;
  }

  /**
   * Delete by primary id
   *
   * @param int $id Primary id
   * @return int Zero if fail
   */
  public function delete(int $id): int
  {
    $result = $this->table->delete(['id' => $id]);
    return $result;
  }
}