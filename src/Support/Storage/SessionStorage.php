<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/27/16
 * Time: 3:07 AM
 */

namespace Cart\Support\Storage;

use Countable;
use Cart\Support\Storage\Contracts\StorageInterface;

class SessionStorage implements StorageInterface, Countable
{
    protected $backet;

    public function __construct($basket = 'default')
    {
        if (!isset($_SESSION[$basket])) {
            $_SESSION[$basket] = [];
        }

        $this->backet = $basket;
    }

    public function get($index)
    {
        if (!$this->exists($index)) {
            return null;
        }
        return $_SESSION[$this->backet][$index];
    }

    public function set($index, $value)
    {
        $_SESSION[$this->backet][$index] = $value;
    }

    public function all()
    {
        return $_SESSION[$this->backet];
    }

    public function exists($index)
    {
        return isset($_SESSION[$this->backet][$index]);
    }

    public function unset($index)
    {
        if ($this->exists($index)) {
            unset($_SESSION[$this->backet][$index]);
        }
    }

    public function clear()
    {
        unset($_SESSION[$this->backet]);
    }

    public function count()
    {
        return count($this->all());
    }


}