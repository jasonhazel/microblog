<?php
namespace Controllers;

class Controller {
    use \lib\f3Instance;

    protected $params;

    public function __construct() {
        $this->f3Instance();

        $this->params = $this->f3->get('PARAMS');
    }

    public function render() {
        echo \View::instance()->render($this->view);
    }
}