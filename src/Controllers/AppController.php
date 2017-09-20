<?php

namespace App\Controllers;

use App\Product\ProductTransformer;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppController
{
    public function homeAction(Application $app)
    {
        $processor = $app['product_processor'];
        $processor->process(__DIR__ . '/../../products.csv');

        $transformer = new ProductTransformer($processor->collection());

        return new JsonResponse($transformer->transform());
    }
}
