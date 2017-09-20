<?php


class ShoeEuSizeTest extends PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $app = require __DIR__.'/../src/app.php';
        require __DIR__.'/../config/dev.php';

        $app['session.test'] = true;

        $this->app = $app;
    }

    public function testCorrectSort()
    {
        $sizes = [
            new \App\Model\Size('AAA', '45'),
            new \App\Model\Size('AAA', '21'),
            new \App\Model\Size('AAA', '35'),
            new \App\Model\Size('AAA', '20'),
            new \App\Model\Size('AAA', '50'),
        ];

        $this->app['SHOE_EU']->sort($sizes);

        $this->assertEquals([
            new \App\Model\Size('AAA', '20'),
            new \App\Model\Size('AAA', '21'),
            new \App\Model\Size('AAA', '35'),
            new \App\Model\Size('AAA', '45'),
            new \App\Model\Size('AAA', '50'),
        ], $sizes);
    }
}
