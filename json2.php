<?php
require_once 'DB.php';

$db = DB::get_instance();
$params = [
        'conditions' => 'id = ?',
        'bind' => '2',
        'order'=>'id'
];
$placar = $db->find('score',$params);

echo json_encode($placar);