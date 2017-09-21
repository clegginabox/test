<?php

namespace App\Collection;

use App\Model\Product;

class ProductCollection
{
    /**
     * @var array
     */
    private $products = [];

    /**
     * Adds a product to the collection
     *
     * Only adds sizes if a product is already in the collection
     *
     * @param Product $product
     */
    public function add(Product $product)
    {
        if (isset($this->products[$product->plu()])) {
            $this->products[$product->plu()]->addSize($product->sizes());
            return;
        }

        $this->products[$product->plu()] = $product;
    }

    /**
     * @param string $plu
     *
     * @return mixed
     */
    public function get(string $plu)
    {
        return $this->products[$plu];
    }

    /**
     * Returns the product collection
     *
     * @return Product[]
     */
    public function products(): array
    {
        return $this->products;
    }
}
