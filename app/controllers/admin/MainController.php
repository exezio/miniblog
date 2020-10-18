<?php


namespace App\Controllers\Admin;


use Core\Controller;

class MainController extends Controller
{

public $layout = 'admin';

public function __construct($route)
{
    parent::__construct($route);
}
}