<?php


namespace App\Controllers\Admin;
use App\Controllers\Admin\MainController;

class TestController extends MainController
{
    public function index()
    {
        echo __METHOD__;
    }

    public function testMethod()
    {
        echo __METHOD__;
    }
}