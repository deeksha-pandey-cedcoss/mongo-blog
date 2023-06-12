<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        // default action
    }
    public function editblogAction()
    {
        $collection = $this->mongo->blog;
        $datanew = $collection->findOne(['id' => $_GET['id']]);
        $this->view->data = $datanew;
    }
    public function updateblogAction()
    {
        
        $collection = $this->mongo->blog;
        $payload = [
            "image" => $_POST['image'],
            "topic" => $_POST['topic'],
            "data" => $_POST['data'],
            "uid" => $_COOKIE['login'],
        ];
        $data = $collection->updateOne(
            ['id' => $_POST['id']],
            [
                '$set' => $payload,
            ],
            [
                'upsert' => true
            ]
        );
        $this->response->redirect("blog/myblog");
    }
    public function deleteblogAction()
    {
        $collection = $this->mongo->blog;
        $data = $collection->deleteOne(['id' => $_GET['id']]);
        $this->response->redirect("blog/myblog");
    }
    public function adminblogAction()
    {
        // action
    }
}
