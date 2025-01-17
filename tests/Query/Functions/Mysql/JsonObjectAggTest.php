<?php

namespace Scienta\DoctrineJsonFunctions\Tests\Query\Functions\Mysql;

use Scienta\DoctrineJsonFunctions\Tests\Query\MysqlTestCase;

class JsonObjectAggTest extends MysqlTestCase
{
    public function testJsonObjectAgg()
    {
        $this->assertDqlProducesSql(
            "SELECT JSON_OBJECTAGG('a', 1) FROM Scienta\DoctrineJsonFunctions\Tests\Entities\Blank b",
            "SELECT JSON_OBJECTAGG('a', 1) AS sclr_0 FROM Blank b0_"
        );
    }

    public function testJsonObjectAggMissingParameter()
    {
        $this->expectException(\Doctrine\ORM\Query\QueryException::class);

        $this->assertDqlProducesSql(
            "SELECT JSON_OBJECTAGG('a') FROM Scienta\DoctrineJsonFunctions\Tests\Entities\Blank b",
            "SELECT JSON_OBJECTAGG('a') AS sclr_0 FROM Blank b0_"
        );
    }
}
