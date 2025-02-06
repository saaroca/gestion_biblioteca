<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [

    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
