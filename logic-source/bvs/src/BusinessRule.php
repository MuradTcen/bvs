<?php

namespace LogicSource\BVS;

abstract class BusinessRule
{
    private $condition = true;

    /**
     * @return bool
     */
    public function isCondition()
    {
        return $this->condition;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @return bool
     */
    abstract public function passes();

    /**
     * Get the validation error message.
     *
     * @return string
     */
    abstract public function message();

    /**
     * @param $condition
     * @return mixed
     */
    public function when($condition)
    {
        $this->condition = $condition;

        return $this;
    }
}
