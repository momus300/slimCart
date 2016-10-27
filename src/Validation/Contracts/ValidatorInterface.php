<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/27/16
 * Time: 5:22 PM
 */

namespace Cart\Validation\Contracts;


use Psr\Http\Message\ServerRequestInterface as Request;

interface ValidatorInterface
{
    public function validate(Request $request, array $rules);

    public function fails();
}