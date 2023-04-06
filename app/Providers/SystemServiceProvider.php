<?php

namespace App\Providers;

use App\Http\Services\UserService;
use App\Http\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserServiceInterface::class => UserService::class,
    ];
}
