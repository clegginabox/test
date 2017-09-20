<?php

class ClothingSizeShortTest extends PHPUnit\Framework\TestCase
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
            new \App\Model\Size('AAA', 'S'),
            new \App\Model\Size('AAA', 'XXL'),
            new \App\Model\Size('AAA', 'L'),
            new \App\Model\Size('AAA', 'M'),
            new \App\Model\Size('AAA', 'XL'),
        ];

        $this->app['CLOTHING_SHORT']->sort($sizes);

        $this->assertEquals([
            new \App\Model\Size('AAA', 'S'),
            new \App\Model\Size('AAA', 'M'),
            new \App\Model\Size('AAA', 'L'),
            new \App\Model\Size('AAA', 'XL'),
            new \App\Model\Size('AAA', 'XXL'),
        ], $sizes);
    }
}