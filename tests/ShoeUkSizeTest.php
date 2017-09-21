<?php

class ShoeUkSizeTest extends PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $app = require __DIR__.'/../src/app.php';
        require __DIR__.'/../config/dev.php';

        $app['session.test'] = true;

        $this->app = $app;
    }

    /**
     * Test correct sorting of SHOE_UK type
     */
    public function testCorrectSort()
    {
        $sizes = [
            new \App\Model\Size('AAA', '12'),
            new \App\Model\Size('AAA', '8'),
            new \App\Model\Size('AAA', '3.5 (Child)'),
            new \App\Model\Size('AAA', '6.5 (Child)'),
            new \App\Model\Size('AAA', '2'),
        ];

        $sortedSizes = $this->app['SHOE_UK']->sort($sizes);

        $this->assertEquals([
            new \App\Model\Size('AAA', '3.5 (Child)'),
            new \App\Model\Size('AAA', '6.5 (Child)'),
            new \App\Model\Size('AAA', '2'),
            new \App\Model\Size('AAA', '8'),
            new \App\Model\Size('AAA', '12'),
        ], $sortedSizes);
    }
}
