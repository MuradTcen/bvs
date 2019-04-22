<?php

namespace LogicSource\BVS;

use Exception;

class BusinessRuleValidationException extends Exception
{
    protected $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function render($request)
    {
        return response(collect(['error' => $this->errors]), 422);
    }

    public function report() {}
}
