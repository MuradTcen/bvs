Пакет реализующий BusinessValidationService, может обрабатывать businessRule'ы c условным выполнением, т.е. достаточно 
вызвать у businessRule'а функцию when с условием (bool) $condition, чтобы в зависимости от условия 
выполнилась/не выполнялась проверка businessRule'а. В случае непрохождения businessRule'а, порождает исключение

        use LogicSource\BVS\BusinessValidationService;
        
        class Example
        {
            protected $bVS;
            
            public function __construct(BusinessValidationService $bVS)
            {
                $this->bVS = $bVS;
            }
            ..
            ..
            $this->bVS->validate([
                (new businessRule($value)->when($condition),
            ]);
            ..
        }
        
При невызове функции when($condition), происходит гарантированная проверка businessRule'а. Т.е. в следующем примере, 
проверка выполнится.


        use LogicSource\BVS\BusinessValidationService;
        ..
        ..
        $this->bVS->validate([
            (new businessRule($value),
        ]);