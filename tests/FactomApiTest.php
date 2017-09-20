<?php

namespace AdrianMejias\FactomApi\Test;

use Mockery;
use PHPUnit\Framework\TestCase;
use AdrianMejias\FactomApi\FactomApi;

class FactomApiTest extends TestCase
{
    /** @var Mockery\Mock */
    protected $factomApi;

    /** @var \Spatie\Newsletter\Newsletter */
    protected $newsletter;

    public function setUp()
    {
        $this->factomApi = Mockery::mock(FactomApi::class);

        $this->factomApi->shouldReceive('success')->andReturn(true);

        $newsletterLists = NewsletterListCollection::createFromConfig(
            [
                'lists' => [
                    'list1' => ['id' => 123],
                    'list2' => ['id' => 456],
                ],
                'defaultListName' => 'list1',
            ]

        );

        $this->newsletter = new Newsletter($this->mailChimpApi, $newsletterLists);
    }

    public function tearDown()
    {
        parent::tearDown();

        if ($container = Mockery::getContainer()) {
            $this->addToAssertionCount($container->mockery_getExpectationCount());
        }

        Mockery::close();
    }

    /** @test */
    public function it_can_subscribe_someone()
    {
        $email = 'freek@spatie.be';

        $url = 'lists/123/members';

        $this->mailChimpApi->shouldReceive('post')->withArgs([
            $url,
            [
                'email_address' => $email,
                'status' => 'subscribed',
                'email_type' => 'html',
            ],
        ]);

        $this->newsletter->subscribe($email);
    }
}
