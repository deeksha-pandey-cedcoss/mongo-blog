<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        //    default action
    }
    public function blogAction()
    {
        
        if ($this->request->isPost()) {
            $image = $this->request->getPost('image');
            $topic = $this->request->getPost('topic');
            $data = $this->request->getPost("description");
            $id = $this->request->getPost("id");
            $uid= $_COOKIE['login'];

            $collection = $this->mongo->blog;
            $data = $collection->insertOne([
                "id" => $id, "image" => $image,
                "topic" => $topic, "data" => $data,
                "uid" => $uid,
            ]);
          $this->response->redirect("blog/myblog");
        }
    }
    public function myblogAction()
    {
        // redirected to myblog
    }
}
