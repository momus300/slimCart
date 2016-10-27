<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/27/16
 * Time: 3:05 AM
 */

namespace Cart\Support\Storage\Contracts;


interface StorageInterface
{
    public function get($index);
    public function set($index, $value);
    public function all();
    public function exists($index);
    public function unset($index);
    public function clear();
}