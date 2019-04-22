<?php

namespace LogicSource\BVS;


use App\Exceptions\BusinessRuleValidationException;
use App\Rules\Business\BusinessRule;
use Illuminate\Support\Collection;

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
        $messages = tap(collect(), function (Collection $messages) use ($rules) {
            collect($rules)->each(function (BusinessRule $rule) use ($messages) {
                if ($rule->when) {
                    if (!$rule->passes()) {
                        $messages->push($rule->message());
                    }
                }
            });
        });

        if (!$messages->isEmpty()) {
            throw new BusinessRuleValidationException($messages->toArray());
        }

        return $this;
    }
}