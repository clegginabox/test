<?php

namespace App\Providers;

use ICanBoogie\Inflector;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Finder\Finder;

class SizeSortingServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Container $app)
    {
        $inflector = Inflector::get('en');
        $finder    = new Finder();
        $files     = $finder->files()->notName('*Interface.php');

        foreach ($finder->in(__DIR__ . '/../Sizes') as $file) {

            $filename    = pathinfo($file->getRelativePathname(), PATHINFO_FILENAME);
            $serviceName = $inflector->underscore(substr($filename, 0,-4));
            $className   = sprintf('App\Sizes\%s', $filename);

            $app[strtoupper($serviceName)] = function() use ($className) {
                return new $className;
            };
        }
    }
}
