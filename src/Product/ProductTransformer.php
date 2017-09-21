<?php

namespace App\Product;

use App\Collection\ProductCollection;

class ProductTransformer
{
    /**
     * ProductTransformer constructor.
     *
     * @param ProductCollection $productCollection
     */
    public function __construct(ProductCollection $productCollection)
    {
        $this->productCollection = $productCollection;
    }

    /**
     * @return array
     */
    public function transform()
    {
        $data = [];

        foreach ($this->productCollection->products() as $product) {
           $data[] = $product->toArray();
        }

        return $data;
    }
}
