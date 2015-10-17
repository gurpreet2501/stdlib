<?php 

import('Arr');

// Test init
$data = ['user' => ['name' => 'Hero']];
$arr = Arr::init($data);
assert($arr->all() === $data);


// Test ref Init
$data = ['user' => ['name' => 'Hero']];
$arr = Arr::ref($data);



// test get
assert($arr->get('user', '') === ['name' => 'Hero']);
assert($arr->get('user.name', '') === 'Hero');

$arr->set('user', '1');
$arr->set('user_zero', 0);

assert($arr->get('user', '') === '1');
assert($arr->get('user_zero', '') === 0);

assert($data['user'] === ['name' => 'Hero']);


assert($data['user']['name'] === 'Hero');
assert($arr->get('user.lol', '') === '');
assert($arr->get('user.lol', 1) === 1);
assert($arr->get('user.lol', 0) === 0);
assert($arr->get('user.lol', null) === null);

// Array pass By ref
$data_ref = ['one' => ['two' => 1]];
$arr_ref = Arr::ref($data_ref);

assert($arr_ref->get('one', '') === ['two' => 1]);
assert($data_ref['one'] === ['two' => 1]);
assert($data_ref['one']['two'] === 1);


$arr_ref->set('one', []);
assert($arr_ref->get('one', '') === []);
assert($data_ref['one'] === []);

$arr_ref->set('one.test', []);





// echo "<pre>";
// $data = [
//     'test' => 1
// ];
// $v = DotParser::get_array_data($data,['test']);
// var_dump($v);
// exit;
// exit;
// $has = Str::has('test.com', '.');
// var_dump($has);
// exit;


// echo Fs::ext('test.com');

// import('_Array');

// $arr = _Array::init([
//     'name' => '',
//     'age' => 10,
//     'banned' => 0,
// ]);


// echo "<pre>";
// print_r($arr->take('age','banned','name'));
// exit;
// $arr->push('test');


$request->set_callback('trade_license_image', [$this, 'upload_image']);