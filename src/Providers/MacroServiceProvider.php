<?php

namespace Bitfertig\MustBePublished\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    public function boot()
    {

        /**
         * MustBePublished:
         * - Migration-Blueprint: mustBePublished(), dropmustBePublished()
         * - Trait: MustBePublished => ignore all with published_at = null
         *   public static function bootMustBePublished() { static::addGlobalScope(new MustBePublishedScope); }
         *   class MustBePublishedScope implements Scope { public function apply(Builder $builder, Model $model) { $builder->withUnpublished(); } }
         * - Scopes: published(), unpublished(),
         */

        Blueprint::macro('mustBePublished', function ($column = 'published_at') {
            return $this->timestamp($column)->nullable()->comment('MustBePublished');
        });
        Blueprint::macro('dropMustBePublished', function ($column = 'published_at') {
            return $this->dropColumn($column);
        });

        // Builder::macro('published', function () {
        //     return $this->whereNotNull('published_at');
        // });
        // Builder::macro('withUnpublished', function () {
        //     // return $this->whereNull('published_at'); // ?
        // });

    }

    public function register()
    {
    }
}
