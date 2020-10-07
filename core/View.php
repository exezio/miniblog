<?php


namespace Core;


class View
{

    private $route;
    private $view;
    private $layout;


    public function __construct($route, $layout = LAYOUT)
    {
        $this->route = $route;
        $this->layout = $layout;
        $this->view = $route['action'];
    }

    public function render($props)
    {
        if (is_array($props)) extract($props, EXTR_OVERWRITE);
        $view = APP . '/views/' . $this->route['controller'] . '/' . $this->view . '.php';
        ob_start();
        if (is_file($view)) require_once $view;
        else trigger_error("View $view not exists", E_USER_WARNING);
        $content = ob_get_clean();
        $layout = APP . '/views/layout/' . $this->layout . '.php';
        if (is_file($layout)) require_once $layout;
        else require_once APP . '/views/' . $this->route['controller'] . '/index.php';
    }
}
