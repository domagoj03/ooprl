<?php 

/**
* Session class
*/
class Session
{
    public function exists($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }
    public static function put($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return $_SESSION[$name];
    }

    public function delete($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }
}