<?php

namespace spanisch\Logic;


use DI\Bridge\Slim\App;

class Bootstrap
{
    public function __construct()
    {
        $app = new App;

        $app->getContainer()->set('settings.debug', true);
        $app->getContainer()->set('settings.determineRouteBeforeAppMiddleware', true);
        $app->getContainer()->set('settings.displayErrorDetails', true);

        $this->registerRoutes($app);

        $app->run();
    }

    /**
     * @param $app
     */
    public function registerRoutes($app)
    {
        $app->any("/", HomeAction::class);
        $app->any("/spager", SpaGerAction::class);
        $app->any("/gerspa", GerSpaAction::class);
        $app->any("/eintragen", WriteAction::class);
        $app->any("/list", ListAction::class);
        $app->any("/sql", SqlAction::class);
    }
}