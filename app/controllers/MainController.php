<?php

namespace App\Controllers;

use App\Models\Main;
use Core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $name = 'din';
        $age = 25;
        $this->setProps(compact('name', 'age'));
        $model = new Main();
        $model->createComand()->select()->from(['phones'])->execute();

    }

}