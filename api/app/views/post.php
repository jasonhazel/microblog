<?php
namespace Views;

class Post {
    use \lib\f3instance;

    public function json($data) {
          $json_ready = [];
          foreach ($data as $record) {
              $a_record = $record->cast();
              $a_record['timestamp'] = date(
                                          'Y-m-d H:i:s',
                                          strtotime($a_record['timestamp'] . " UTC"));
                $json_ready[] = $a_record;
          }   
          echo json_encode($json_ready);
      }    
}