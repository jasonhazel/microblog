<?php
namespace Controllers;


class Post extends Controller {
  
    private $posts;
    private $view;
    public function __construct() {
        parent::__construct();
        $this->posts = new \Models\Post;
        $this->view = new \Views\Post;
    }

    public function all() {
        $this->view->json($this->posts->all());
    }

    public function get() {
        $this->view->json($this->posts->get($this->params['id']));
    }

    public function page() {
        $posts = $this->posts->page($this->params['start'], $this->params['count']);
        $this->view->json($posts);
    }

    public function tag() {
        $posts = $this->posts->tag($this->params['tag']);
        $this->view->json($posts);
    }
}