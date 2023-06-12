<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
      
        $this->response->redirect("index/home");
    }
    public function homeAction()
    {

        $collection = $this->mongo->blog;
        $data = $collection->find();
        $this->view->result = $data;
    }
    public function fullblogAction()
    {
        $collection = $this->mongo->blog;
        $data = $collection->findOne(['id' => $_GET['id']]);
        $this->view->result = $data;
    }
}
