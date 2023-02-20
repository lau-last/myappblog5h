<?php

use App\Exceptions\NotFoundException;
use Router\Router;

require '../vendor/autoload.php';


define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

const DB_NAME = 'myapp';
const DB_HOST = 'localhost:8889';
const DB_USER = 'root';
const DB_PWD = 'root';


$router = new Router($_GET['url']);


$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/tags/:id', 'App\Controllers\BlogController@tag');

$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');


try {
    $router->run();
} catch (NotFoundException $exception) {
    echo $exception->error404();
}