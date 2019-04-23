<?php

namespace LogicSource\BVS;

class BusinessValidationService
{
    /**
     * Валидация
     *
     * @param array $rules
     * @return $this
     * @throws BusinessRuleValidationException
     */
    public function validate(array $rules)
    {
        $messages = [];

        foreach ($rules as $rule) {
            if ($rule->when) {
                if (!$rule->passes()) {
                    $messages [] = $rule->message();
                }
            }
        }

        if ($messages) {
            throw new BusinessRuleValidationException($messages);
        }

        return $this;
    }
}