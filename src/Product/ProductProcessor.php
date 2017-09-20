<?php

namespace App\Product;

use App\Csv\CsvReader;
use App\Collection\ProductCollection;
use App\Model\Product;
use Silex\Application;

class ProductProcessor
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @var ProductCollection
     */
    private $productCollection;

    /**
     * ProductProcessor constructor.
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->productCollection = new ProductCollection();
    }

    /**
     * Process a Product CSV Upload
     *
     * @param string $filename
     */
    public function process(string $filename)
    {
        $reader = CsvReader::build($filename);

        foreach ($reader as $row) {
            $this->productCollection->add(
                new Product($row[1], $row[2], [$row[0], $row[3]], $row[4])
            );
        }

        $this->sortProductCollectionSizes();
    }

    /**
     * Sorts the product collection sizes
     */
    private function sortProductCollectionSizes()
    {
        foreach ($this->productCollection->products() as $product) {
            $sortedProducts = $this->app[$product->sizeSort()]->sort($product->sizes());
            $product->setSize($sortedProducts);
        }
    }

    /**
     * @return ProductCollection
     */
    public function collection(): ProductCollection
    {
        return $this->productCollection;
    }
}
