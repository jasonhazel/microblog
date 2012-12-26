<?php
namespace Models;

class Post {
  use \lib\f3instance;

  private $connection;

  public function __construct() {
    $this->f3Instance();
    $this->connection = new \DB\SQL\Mapper($this->f3->get('DB'), 'post');
  }

  public function all() {
    $this->current = $this->connection->find(NULL, array('order' => 'timestamp DESC'));
    return $this->current;
  }

  public function get($postid) {
    $this->current = $this->connection->find(array('postid = ?', $postid));
    return $this->current;
  }

  public function page($starting_post, $count) {


    $starting_post = $starting_post == '_' ? $this->most_recent() : $starting_post;

    $this->current = $this->connection->find(
                        array('postid < ?', $starting_post), 
                        array('limit' => $count, 
                              'order' => 'timestamp DESC'
                        ));
    return $this->current;
  }

  private function most_recent() {
    list($most_recent_post) = $this->connection->select('max(postid) AS max');
    return $most_recent_post->max +1;
  }

  public function tag($tag) {
    return $this->connection->find(array('instr(lower(content), ?)', '#'.strtolower($tag)), array('order' => 'timestamp DESC'));
  }
}


