<?php

require_once '../vendor/autoload.php';

use Core\Router;
use Whoops\Run;
use Vendor\Libs\Registry;
use Vendor\Libs\Registr;
use Vendor\Libs\Cache;

define('ROOT', dirname(__DIR__));
define('APP', ROOT . '/app');
define('PUBLIC', ROOT . '/public');
define('CORE', ROOT . '/core');
define('LAYOUT', 'default');

session_start();

$whoops = new Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
$whoops->register();

$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

new \Core\Libs\Cache();

$url = $_SERVER['REQUEST_URI'];

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::dispatch($url);

