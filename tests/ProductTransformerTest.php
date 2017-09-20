<?php


class ProductTransformerTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test the transformation of Products to the required format
     */
    public function testTransform()
    {
        $collection = new \App\Collection\ProductCollection();
        $collection->add(
            new \App\Model\Product('ABC', 'Test 1', ['001', '35'], 'SHOE_EU')
        );
        $collection->add(
            new \App\Model\Product('ABD', 'Test 2', ['001', '12'], 'SHOE_UK')
        );

        $transformer = new \App\Product\ProductTransformer($collection);

        $expected = [
            0 =>
                [
                    'plu'   => 'ABC',
                    'name'  => 'Test 1',
                    'sizes' =>
                        [
                            0 =>
                                [
                                    'sku'  => '001',
                                    'size' => '35',
                                ],
                        ],
                ],
            1 =>
                [
                    'plu'   => 'ABD',
                    'name'  => 'Test 2',
                    'sizes' =>
                        [
                            0 =>
                                [
                                    'sku'  => '001',
                                    'size' => '12',
                                ],
                        ],
                ],
        ];

        $this->assertEquals($expected, $transformer->transform());
    }
}
