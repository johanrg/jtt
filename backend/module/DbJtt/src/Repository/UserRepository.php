<?php

namespace DbJtt\Repository;

use Zend\Db\ResultSet\ResultSet;

class UserRepository extends AbstractRepository
{
  /**
   * Check that the supplied user name and password is available in the database
   *
   * @param string $username
   * @param string $password
   * @return null|ResultSet
   */
  public function verifyCredentials(string $username, string $password): ?ResultSet
  {
    /** @var ResultSet $resultSet */
    $resultSet = $this->table->select(['name' => $username, 'password' => $password]);
    if ($resultSet->count() === 1) {
      return $resultSet;
    }
    return null;
  }
}