<?php

require_once 'stdlib.php';

import('_Array');

$arr = _Array::init([
    'name' => '',
    'age' => 10,
    'banned' => 0,
]);


echo "<pre>";
print_r($arr->take('age','banned','name'));
exit;
$arr->push('test');