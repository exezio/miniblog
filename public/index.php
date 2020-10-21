<?php

require_once '../vendor/autoload.php';

use Core\Router;
use Whoops\Run;
use Core\Libs\Registry;
use Core\Libs\Registr;
use Core\Libs\Cache;

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

// memcache есть уже есть значение, set возвращает 1
// memcache get не существ. возвращает false
// memcache set возвращает true

//redis set если уже есть значение, возвр. true, но и перезаписывает
//redis get несущ. возвр false

Cache::setDriver(new Redis());
Cache::set('lel', 'dsa');


$url = $_SERVER['REQUEST_URI'];

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::dispatch($url);

