<?php

namespace App\Controllers;

use App\Product\ProductTransformer;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppController
{
    public function homeAction(Application $app)
    {
        try {
            $processor = $app['product_processor'];
            $processor->process(__DIR__ . '/../../products.csv');
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Could not load file']);
        }

        return new JsonResponse(
            (new ProductTransformer($processor->collection()))->transform()
        );
    }
}
