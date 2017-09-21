<?php

namespace App\Providers;

use App\Product\ProductProcessor;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ProductServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Container $app)
    {
        $app['product_processor'] = function() use ($app) {
            return new ProductProcessor($app);
        };
    }
}
