<?php

require_once APPS_DIR.'/plib/vendor/autoload.php';
require_once ROOT_DIR.'/vendor/autoload.php';
require_once __DIR__."/var.php";

use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Config\FileLocator;
use Silex\Application;
use Predis\Client;
use LessQL\Database;

$app = new Application();

if ($ENVIRONMENT !== 'deveplopment') {
	unset($app['exception_handler']);
}

$app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
    $loader     = new YamlFileLoader(new FileLocator(ROOT_DIR . '/app/conf'));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);
    return $routes;
});


$app['cache.redis'] = new Client($CONFIG[$ENVIRONMENT]['redis']);
$app['http.request'] = Request::createFromGlobals();
$app['http.response'] = new Response();
$app['app.config'] = $CONFIG[$ENVIRONMENT];
$app['app.param'] = $PARAMETERS;
$app['user.session'] = $_SESSION;

$host = $app['app.config']['db']['host'];
$db   = $app['app.config']['db']['dbname'];
$user = $app['app.config']['db']['user'];
$pass = $app['app.config']['db']['password'];
$charset = $app['app.config']['db']['charset'];


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new \PDO($dsn, $user, $pass, $opt);

$app['db.pdo'] = $pdo;


$app->run();





