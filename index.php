<?php 

require_once 'core/init.php';

$user = DB::getInstance()->get('users', ['username', '=', 'domagoj']);


if (!$user->count()) {
    echo "No user";
} else {
    echo "OK";
}