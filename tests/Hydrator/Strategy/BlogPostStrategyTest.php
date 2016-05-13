<?php

namespace Marek\Toggable\Tests\Hydrator\Strategy;

use Marek\Toggable\API\Toggl\Values\User\BlogPost;
use Marek\Toggable\Hydrator\Strategy\BlogPostStrategy;

class BlogPostStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BlogPostStrategy
     */
    private $strategy;

    public function setUp()
    {
        $this->strategy = new BlogPostStrategy();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\StrategyInterface', $this->strategy);
    }

    public function testHydrate()
    {
        $blogPost = new BlogPost(
            array(
                'title' => 'Test title',
                'url' => 'www.test.com',
            )
        );

        $hydrated = $this->strategy->hydrate(
            array(
                'title' => 'Test title',
                'url' => 'www.test.com',
                )
        );

        $this->assertEquals($blogPost, $hydrated);
    }

    public function testHydrateWhenNonArrayIsPassed()
    {
        $class = new \stdClass();

        $hydrated = $this->strategy->hydrate($class);

        $this->assertEquals($class, $hydrated);
    }

    public function testExtract()
    {
        $blogPost = new BlogPost(
            array(
                'title' => 'Test title',
                'url' => 'www.test.com',
            )
        );

        $extracted = $this->strategy->extract($blogPost);

        $this->assertEquals(
            array(
                'title' => 'Test title',
                'url' => 'www.test.com',
            ),
            $extracted
        );
    }

    public function testExtractWhenNonBlogPostObjectIsPassed()
    {
        $class = new \stdClass();

        $extracted = $this->strategy->extract($class);

        $this->assertEquals($class, $extracted);
    }
}
