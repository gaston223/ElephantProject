<?php
namespace app\core;

/**
 * class Router
 * @author gaston223 <g.coulibalyy@gmail.com>
 * @package app\core
 */
class Router
{
    public Request $request;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
         $path = $this->request->getPath();
         $method = $this->request->getMethod();
         $callback = $this->routes[$method][$path] ?? false;
         if ($callback===false){
             echo "Not found";
             exit;
         }
         echo call_user_func($callback);
    }

    /*echo '<pre>';
        var_dump($callback);
        echo '</pre>';
        exit;*/
}
