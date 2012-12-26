<?php
namespace lib;

class Controller {
    use f3Instance;

    protected $params;

    public function __construct() {
        $this->f3Instance();

        $this->params = $this->f3->get('PARAMS');
        echo get_class($this);
    }

    public function render() {
        echo \View::instance()->render($this->view);
    }
}