<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\CliRouter;


class RouterFactory
{
   use Nette\StaticClass;


   /**
    * @return Nette\Application\IRouter
    */
   public static function createRouter(Nette\DI\Container $container)
   {

      $router = new RouteList;

      if ($container->parameters['consoleMode']) {
         // cli module
         $router[] = $cliRouter = new RouteList('Cli');
         $cliRouter[] = new CliRouter(['action' => 'Cli:cron']);

      } else {
         // admin module
         // $router[] = $adminRouter = new RouteList('Admin');
         // $adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Admin:default');

         // front module
         $router[] = $frontRouter = new RouteList('Front');
         $frontRouter[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
      }

      return $router;
   }

}
