<?php

spl_autoload_register(function ($class_name) {
    $path = (basename(getcwd())) === 'includes' ? '../classes/' : 'classes/';
    include_once $path . $class_name . '.class.php';
});