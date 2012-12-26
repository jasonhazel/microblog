<?php
namespace lib;

trait f3Instance {
  protected $f3;

  private function f3Instance() {
    $this->f3 = \Base::instance();
  }
}