<?php


namespace Core;


abstract class Controller
{

    protected $route;
    protected $view;
    protected $props = [];
    protected $layout = LAYOUT;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getview()
    {
        $view = new View($this->route, $this->layout);
        $view->render($this->props);
    }

    protected function setProps($data)
    {
        $this->props = $data;
    }

}