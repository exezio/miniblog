<?php


namespace App\Controllers\Admin;
use App\Controllers\Admin\MainController;

class UserController extends MainController
{

    public function indexAction()
    {
        $prop = 'Prop ADMIN';
        $this->setProps(compact('prop'));
    }

    public function test()
    {
        echo __METHOD__;
    }

}