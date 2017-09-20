<?php

namespace AdrianMejias\FactomApi\Test;

use Mockery;
use PHPUnit\Framework\TestCase;
use AdrianMejias\FactomApi\FactomApi;

class FactomApiTest extends TestCase
{
    /** @var Mockery\Mock */
    protected $factomApi;

    public function setUp()
    {
        $this->factomApi = Mockery::mock(FactomApi::class);
        $this->factomApi->shouldReceive('success')->andReturn(true);
    }

    public function tearDown()
    {
        parent::tearDown();

        if ($container = Mockery::getContainer()) {
            $this->addToAssertionCount($container->mockery_getExpectationCount());
        }

        Mockery::close();
    }

    /* @test */
    // public function it_can_get_heights()
    // {
    //     $this->factomApi->shouldReceive('post');

    //     $this->factomApi->heights();
    // }
}
