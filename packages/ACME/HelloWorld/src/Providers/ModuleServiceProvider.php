<?php

namespace ACME\HelloWorld\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        ACME\HelloWorld\Models\HelloWorld::class,
    ];
}