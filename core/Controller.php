<?php


namespace Core;


abstract class Controller
{

    protected $route;
    protected $view;
    protected $layout;
    protected $props = [];


    public function __construct($route, $layout = LAYOUT)
    {
        $this->route = $route;
        $this->view = $route['action'];
        $this->layout = $layout;
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