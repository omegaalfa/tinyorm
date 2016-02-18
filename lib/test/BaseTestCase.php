<?php

namespace tinyorm\test;

use tinyorm\Db;

class BaseTestCase extends \PHPUnit_Framework_TestCase {
    /**
     * @var Db
     */
    protected $connection;

    protected function setUp()
    {
        parent::setUp();
        $this->connection = get_test_connection();
        $this->connection->exec("DELETE FROM test");
        $this->connection->exec("DELETE FROM test2");
        $this->connection->resetQueryCount();
    }

    protected function assertRowCount($table, $rowCount) {
        $count = $this->connection->query("SELECT COUNT(*) FROM $table")->fetchColumn();
        $this->assertEquals($rowCount, $count);
    }
}