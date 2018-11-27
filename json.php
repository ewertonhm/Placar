<?php
require_once 'DB.php';

$db = DB::get_instance();
$placar = $db->find('score',$params);
$output = array();

var_dump($placar);