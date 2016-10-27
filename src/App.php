<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/26/16
 * Time: 3:09 PM
 */

namespace Cart;

use DI\ContainerBuilder;
use DI\Bridge\Slim\App as DiBridge;

class App extends DiBridge
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions([
            'settings.displayErrorDetails' => true,
        ]);

        $builder->addDefinitions(__DIR__ . '/container.php');
    }

}