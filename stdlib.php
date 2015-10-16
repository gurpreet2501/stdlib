<?php

define('STD_MOD_PATH', __DIR__ . '/libs/');

function import($mod_name)
{
    require_once(STD_MOD_PATH . $mod_name .'.php');
}