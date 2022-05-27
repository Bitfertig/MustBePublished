<?php

namespace Bitfertig\MustBePublished\Traits;

use Bitfertig\MustBePublished\Support\MustBePublishedScope;

trait MustBePublished
{
    /**
     * Boot the trait for a model.
     *
     * @return void
     */
    public static function bootMustBePublished()
    {
        static::addGlobalScope(new MustBePublishedScope);
        // static::saving(function ($model) {
        //     $model->name = $model->firstname.' '.$model->lastname;
        // });
    }

    /**
     * Initialize the trait for an instance.
     *
     * @return void
     */
    public function initializeMustBePublished()
    {
        if (! isset($this->casts[$this->getPublishedAtColumn()])) {
            $this->casts[$this->getPublishedAtColumn()] = 'datetime';
        }
    }

    /**
     * Get the name of the "deleted at" column.
     *
     * @return string
     */
    public function getPublishedAtColumn()
    {
        return defined(static::class.'::PUBLISHED_AT') ? static::PUBLISHED_AT : 'published_at';
    }

    /**
     * Get the fully qualified "deleted at" column.
     *
     * @return string
     */
    public function getQualifiedPublishedAtColumn()
    {
        return $this->qualifyColumn($this->getPublishedAtColumn());
    }

    // Usage: Mbptest::withUnpublished()->find(1)->publish();
    public function publish() {
        $this->published_at = now();
        $this->save();
    }

    public function unpublish() {
        $this->published_at = null;
        $this->save();
    }
    
    // Usage: Mbptest::findAndPublish(1)
    public static function findAndPublish($id)
    {
        return (new static)->withUnpublished()->find($id)->publish();
    }
    
}
