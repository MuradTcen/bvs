<?php

namespace LogicSource\BVS;

use Illuminate\Support\ServiceProvider;
use LogicSource\BVS\BusinessValidationService;

class BVSServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        new BusinessValidationService();

    }
}