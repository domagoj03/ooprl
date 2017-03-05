<?php 
require_once 'core/init.php';

$user = DB::getInstance()->update('users', 2, [
    'password' => 'newpastest',
    'name' => 'domic',
    ]);