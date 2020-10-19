<?php

namespace App\Controllers;

use App\Models\Main;
use Core\Controller;
use Libs\Paginator;

class MainController extends Controller
{



    public function indexAction()
    {
        $name = 'din';
        $age = 25;
        $model = new Main();
//        $countPosts = $model->createComand()->count('posts');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $postsPerPage = 2;
//        $paginator = new Paginator($page, $postsPerPage, $countPosts);
//        $paginate = $paginator->getStart();
//        $posts = $model->createComand()->select()->from('posts')->limit($paginate, $postsPerPage)->execute();
        $this->setProps(compact('name', 'age', 'posts', 'countPosts'));
    }

}