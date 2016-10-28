<?php

namespace CodePress\CodeDatabase\Tests;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeDatabase\Contracts\RepositoryInterface;
use Mockery as m;

class AbstractRepositoryTest extends AbstractTestCase
{

    public function test_if_implements_repositoryinterface(){
        $mock = m::mock(AbstractRepository::class);
        $this->assertInstanceOf(RepositoryInterface::class, $mock);
    }

}