<?php

namespace LogicSource\BVS;

abstract class BusinessRule
{

    protected $when = true;

    /**
     * Determine if the validation rule passes.
     *
     * @return bool
     */
    abstract protected function passes();

    /**
     * Get the validation error message.
     *
     * @return string
     */
    abstract protected function message();

    /**
     * @param $condition
     * @return mixed
     */
    protected function when($condition)
    {
        $this->when = $condition;
        return $this;
    }
}
