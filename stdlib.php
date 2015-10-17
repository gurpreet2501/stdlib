<?php

define('STDLIB_INC_PATH', __DIR__ . '/libs/');

function import($mod_name)
{
    require_once(STDLIB_INC_PATH . $mod_name .'.php');
}