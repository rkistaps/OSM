<?php

declare(strict_types=1);

namespace OSM\Core\Routes;

use OSM\Frontend\Modules\Site\Handlers\IndexRequestHandler;
use TheApp\Components\Router;
use TheApp\Interfaces\RouterConfiguratorInterface;

class SiteRouteConfigurator implements RouterConfiguratorInterface
{
    public function configureRouter(Router $router)
    {
        $router->get('/', IndexRequestHandler::class);
    }
}
