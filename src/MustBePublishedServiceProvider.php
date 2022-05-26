<?php

namespace Bitfertig\MustBePublished;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class MustBePublishedServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Configs
        $this->mergeConfigFrom(__DIR__.'/../config/mustbepublished.php', 'mustbepublished');

        // if ($this->app->runningInConsole()) {
        //     $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // }
    }

    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

}
