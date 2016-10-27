<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/27/16
 * Time: 3:41 AM
 */

namespace Cart\Basket\Exceptions;

use Exception;

class QuantityExceededException extends Exception
{
    protected $message = 'Dodales maksymalna ilosc przedmiotow.';
}